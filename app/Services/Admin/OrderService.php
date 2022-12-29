<?php

namespace app\Services\Admin;

use App\Models\User;
use App\Models\order;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Support\Collection;

class OrderService
{
    /**
     * @param Collection<userProduct> $cart_Product
     */
    public function is_all_product_available(Collection $products): bool
    {
        foreach ($products as $Product) {
            if ($Product->amount < 1) {
                return false;
            }
            if ($Product->amount - $Product->pivot->amount >= 0) {  //pivot amount is the requested amount from the cart
                $Product->amount -= $Product->pivot->amount;
                $Product->save();
            } else {
                return false;
            }
        }
        return true;
    }

    public function order_total_price(User $user): int
    {
        $sum =  0;
        foreach ($user->product as $product) {
            if (($product->discount > $user->discount))
                $sum += (int)(($product->price - ($product->price * ($product->discount / 100))) * $product->pivot->amount);
            else
                $sum += (int)(($product->price - ($product->price * ($user->discount / 100))) * $product->pivot->amount);
        }
        return $sum;
    }

    /**
     * @param User $users
     * @param Collection<UserProduct> $cart_Product
     */
    public function product_price(User $user,Product $product): int
    {
        $discount =  $this->discount($user, $product);

        return (int)(($product->price) - ($product->price * ($discount / 100)));
    }


    public function discount(User $user, Product $product): float
    {
        return  $product->discount > $user->discount ?
            $product->discount :  $user->discount;
    }

    public function this_user_request_this_product(User $user, Product $cartProduct): void
    {
        // this user request this product  
        if (!$user->productActivity->find($cartProduct->id)) {
            $user->productActivity()->attach(
                [$cartProduct->id => [
                    'click' => 1,
                    'added_to_cart' => 1,
                    'request' => 1,
                    'bought' => 0
                ]]
            );
        } else {
            $user->productActivity->find($cartProduct->id)->userActivity->request += $cartProduct->pivot->amount;
            $user->productActivity->find($cartProduct->id)->userActivity->save();
        }
    }

    public function this_user_bought_this_product(User $user, Sale $product): void
    {
        if ($user->productActivity->find($product->product_id) == null) {
            $user->productActivity()->attach(
                [$product->product_id => [
                    'click' => 1,
                    'added_to_cart' => 1,
                    'request' => 1,
                    'bought' => 1
                ]]
            );
        } else {
            $user->productActivity->find($product->product_id)->userActivity->bought =   $user->productActivity->find($product->product_id)->userActivity->bought + $product->amount;
            $user->productActivity->find($product->product_id)->userActivity->save();
        }
    }

    public function cancel_the_order(Order $order, Sale $sale): void
    {
        //return the product to the stock
        $sale->product->amount += $sale->amount;
        $sale->product->save();
        //remove the product from user activity(his user has not purchased this product)
        if ($order->status == 'sold') {
            if (User::find($order->user_id) &&  User::find($order->user_id)->productActivity->find($sale->product->id)) {
                $user = User::find($order->user_id);
                $user->productActivity->find($sale->product->id)->userActivity->bought -= $sale->amount;
                $user->productActivity->find($sale->product->id)->userActivity->save();
            }
        }
        //    do not remove requested count (for collecting data)
        //  else {
        //     if (User::find($order->user_id) &&  User::find($order->user_id)->productActivity->find($sale->product->id)) {
        //         $user = User::find($order->user_id);
        //         $user->productActivity->find($sale->product->id)->userActivity->request -= $sale->amount;
        //         $user->productActivity->find($sale->product->id)->userActivity->save();
        //     }
        // }
    }
}
