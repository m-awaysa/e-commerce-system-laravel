<?php

namespace App\Services\Public;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
class ProductService
{

    public function get_the_product(
        ?Category $category ,
        $filteredCategory,
        $filteredCompany,
        $filteredColor
    ) {
        if ($category == null) {
            if ($filteredCategory  != null ||  $filteredCompany  != null ||  $filteredColor  != null) {

                if ($filteredCategory  != null){
                    $products = Product::where('visibility', true)->where(function($query){
                        return $query->category->where('visibility', true);
                    })->whereIn('category_id',  $filteredCategory)->paginate(12);
                }
                   
                else
                    $products = null;

                if ($filteredCompany  != null) {
                  
                    if ($products !=null)
                        $products = $products->whereIn('company',  $filteredCompany)->paginate(12);
                    else
                        $products = Product::where('visibility', true)->where(function($query){
                        return $query->category->where('visibility', true);
                    })->whereIn('company',  $filteredCompany)->paginate(12);
                }
                if ($filteredColor != null) {

                    if ($products  != null)
                        $products = $products->whereIn('color',  $filteredColor)->paginate(12);
                    else
                        $products = Product::where('visibility', true)->where(function($query){
                        return $query->category->where('visibility', true);
                    })->whereIn('color',  $filteredColor)->paginate(12);
                }
            } else {

                $products = Product::where('visibility', true)->where(function($query){
                        return $query->category->where('visibility', true);
                    })->with(['category' => function ($query) {
                    $query->where('visibility', true);
                }])->paginate(12);
            }
        } else {
            $products = $category->product->where('visibility', true)->where(function($query){
                        return $query->category->where('visibility', true);
                    })->paginate(12);
        }

        return $products;
    }

    public function this_customer_clicked_this_product(Product $product){
        if (auth()->user()) {
            $user = User::find(auth()->user()->id);
            if (!$user->productActivity->find($product->id))
                $user->productActivity()->attach([$product->id => ['click' => 1, 'added_to_cart' => 0, 'request' => 0, 'bought' => 0]]);
            else {
                $user->productActivity->find($product->id)->userActivity->click += 1;
                $user->productActivity->find($product->id)->userActivity->save();
            }
        }else{
            //id=1 reserved for guests
            $user = User::find(1);
            if (!$user->productActivity->find($product->id))
                $user->productActivity()->attach([$product->id => ['click' => 1, 'added_to_cart' => 0, 'request' => 0, 'bought' => 0]]);
            else {
                $user->productActivity->find($product->id)->userActivity->click += 1;
                $user->productActivity->find($product->id)->userActivity->save();
            }
        }
    }
}
