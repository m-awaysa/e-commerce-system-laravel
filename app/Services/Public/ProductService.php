<?php

namespace App\Services\Public;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
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
                    $products = Product::where('visibility', true)->whereIn('category_id',  $filteredCategory)->paginate(12);
                }
                   
                else
                    $products = null;

                if ($filteredCompany  != null) {
                  
                    if ($products !=null)
                        $products = $products->whereIn('company',  $filteredCompany)->paginate(12);
                    else
                        $products = Product::where('visibility', true)->whereIn('company',  $filteredCompany)->paginate(12);
                }
                if ($filteredColor != null) {

                    if ($products  != null)
                        $products = $products->whereIn('color',  $filteredColor)->paginate(12);
                    else
                        $products = Product::where('visibility', true)->whereIn('color',  $filteredColor)->paginate(12);
                }
            } else {

                $products = Product::where('visibility', true)->with(['category' => function ($query) {
                    $query->where('visibility', true);
                }])->paginate(12);
            }
        } else {
            $products = $category->product->where('visibility', true)->paginate(12);
        }

        return $products;
    }
}
