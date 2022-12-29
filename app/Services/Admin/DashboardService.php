<?php 


namespace App\Services\Admin;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Product;
use App\Models\User;

class DashboardService {


    public function userActivityCollection()
    {
        $collection = collect([]);
        $users = User::with('productActivity')->get();

        foreach ($users as $user) {
            $boughtCount = 0;
            $requestCount = 0;
            $addedToCartCount = 0;
            $viewsCount = 0;
            if ($user->productActivity  != null) {
                foreach ($user->productActivity as $userProductInfo) {

                    $boughtCount += $userProductInfo->userActivity->bought;
                    $requestCount += $userProductInfo->userActivity->request;
                    $addedToCartCount += $userProductInfo->userActivity->added_to_cart;
                    $viewsCount += $userProductInfo->userActivity->click;
                }
            } else {
                $boughtCount = 0;
                $requestCount = 0;
                $addedToCartCount = 0;
                $viewsCount = 0;
            }
            $collection->push(
                (object)
                [
                    'user_id' => $user->id,
                    'user_name' => $user->first_name . ' ' . $user->last_name,
                    'bought' => $boughtCount,
                    'added_to_cart' => $addedToCartCount,
                    'request' => $requestCount,
                    'views' => $viewsCount,

                ]
            );
        }
        return  $collection;
    }


    public function productActivityCollection()
    {
        $collection = collect([]);
        $products = Product::with('userActivity')->get();

        foreach ($products as $product) {
            $boughtCount = 0;
            $requestCount = 0;
            $addedToCartCount = 0;
            $views =  $product->click;
            foreach ($product->userActivity as $userProductInfo) {
                $boughtCount += $userProductInfo->userActivity->bought;
                $requestCount += $userProductInfo->userActivity->request;
                $addedToCartCount += $userProductInfo->userActivity->added_to_cart;
            }
            $collection->push((object)([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'bought' => $boughtCount,
                'added_to_cart' => $addedToCartCount,
                'request' => $requestCount,
                'number_views' => $views
            ]));
        }
        return  $collection;
    }


    public function mostBoughtProduct(): string
    {
        $products = Product::with('userActivity')->get();
        if ($products != null) {
            $maxBoughtProduct = null;
            $maxBought = 0;

            foreach ($products as $product) {
                $boughtCount = 0;
                foreach ($product->userActivity as $userProductInfo) {
                    $boughtCount += $userProductInfo->userActivity->bought;
                }
                if ($maxBought < $boughtCount) {
                    $maxBoughtProduct = $product;
                    $maxBought = $boughtCount;
                }
            }
        } else {
            return 'Nothing Found';
        }
        return  $maxBoughtProduct->name;
    }


    public function chartLabel(&$xLabel, &$yLabel)
    {
        $ThisMonthSales =   Sale::whereBetween(
            'created_at',
            [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]
        )
            ->orderBy('created_at')->get();

        $ThisMonthSales = ((object)$ThisMonthSales)->groupBy(function ($data) {
            return carbon::parse($data->created_at)->format('d-m');
        });

        foreach ($ThisMonthSales as  $day => $sales) {
            array_push($xLabel, $day);
            $profitSum = 0;
            foreach ($sales as $sale) {
                $profitSum += (int)(($sale->sold_price - $sale->purchased_price) * $sale->amount);
            }
            array_push($yLabel, $profitSum);
        }
    }

    
}
