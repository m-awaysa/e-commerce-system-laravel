<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Product;
use App\Models\GuestOrder;
use App\Http\Requests\GuestOrder\StoreGuestOrderRequest;
use App\Http\Requests\GuestOrder\UpdateGuestOrderRequest;
class GuestOrderController extends Controller
{



    public function index()
    {
        $orders =  GuestOrder::with('product')->where('status', 'requested')->paginate(20);

        return view('admin.order.guest-pending-order', [
            'orders' => $orders
        ]);
    }


    public function order(StoreGuestOrderRequest $request)
    {
        $product = Product::find($request->product);

        if ($request->amount > $product->amount) {
            return redirect()->back()->with('messageFail', 'this amount is not available in stock pls try again');
        }

        $order =  GuestOrder::create([
            'product_id' => $request->product,
            'company_name' => $request->company_name,
            'company_number' => $request->company_number,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'amount' => $request->amount,
            'status' => 'requested',
            'city' => $request->city,
            'street' => $request->street,
            'note' => $request->note,
            'sold_price' => (int)($product->price - ($product->price * ($product->discount / 100))),

        ]);

       // guest user order this product (add to product activity) 
        $product = $order->product;
        if (User::find(1)) {
            $user =   User::find(1); //to call model methods
            if (!$user->productActivity->find($product->id)) {
                $user->productActivity()->attach([$product->id => ['click' => 1, 'added_to_cart' => 1, 'request' => 1, 'bought' => 0]]);
            } else {
                $user->productActivity->find($product->id)->userActivity->request += $request->amount;
                $user->productActivity->find($product->id)->userActivity->save();
            }
        }

        return redirect()->back()->with('messageSuccess', 'we receive your order');
    }



    public function editOrder(UpdateGuestOrderRequest $request)
    {

        foreach ($request->amounts as  $id => $value) {
            if($value <1){
                return redirect()->route('guest.order.pending')
                ->with('error', 'amount cant be smaller than 1');
            }
            GuestOrder::find($id)->update([
                'amount' => $request->amounts[$id],
            ]);
        }
        foreach ($request->sold_prices as  $id => $value) {
            GuestOrder::find($id)->update([
                'sold_price' => $request->sold_prices[$id],
            ]);
        }
        return redirect()->route('guest.order.pending');
    }

    public function delete(GuestOrder $order)
    {

        $order->delete();
        return redirect()->route('guest.order.pending');
    }

    public function accept(GuestOrder $order)
    {
        if( $order->product->amount >= $order->amount){
            $order->product->amount -= $order->amount;
            $order->product->save();
        }else{
            return redirect()->route('guest.order.pending')
            ->with('error', 'there is '.$order->product->amount.' '.$order->product->name.' left in the stock');
        }
        if($order->amount){
     
        $order->status = 'sold';
        $order->save();

        if ($order->product) {
            $product = $order->product;
            $soldOrder =   Order::create([
                'sold_price' => $order->sold_price,
                'name' => $order->company_name,
                'user_id' => 1,
                'phone_number' => $order->phone_number,
                'city' => $order->city,
                'street' => $order->street,
                'note' => $order->note,
                'status' => 'shipping',
            ]);
            Sale::create([
                'product_code' => $product->product_code,
                'color' => $product->color,
                'amount' => $order->amount,
                'discount' => $product->discount,
                'sold_price' => $order->sold_price,
                'purchased_price' => $product->purchased_price,
                'product_id' => $order->product_id,
                'category_id' => $product->category->id,
                'order_id' => $soldOrder->id,
                'company' => $product->company,
                'type' => 'guest_order',


            ]);
          

            // guest user bought this product (add to product activity) 
            //to call model methods
            if (User::find(1))
                $user = User::find(1);
       
            $product = $order->product;
            if ($user->productActivity->find($product->id) == null)
                $user->productActivity()->attach([$product->id => ['click' => 1, 'added_to_cart' => 1, 'request' => 1, 'bought' => 1]]);
            else {
                $user->productActivity->find($product->id)->userActivity->bought =   $user->productActivity->find($product->id)->userActivity->bought + $product->amount;
                $user->productActivity->find($product->id)->userActivity->save();
                return redirect()->route('guest.order.pending');
            }
        } else {
            return redirect()->route('guest.order.pending')->with('error', 'product not found');
        }
    }
}
}
