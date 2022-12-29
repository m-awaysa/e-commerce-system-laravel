<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Services\Public\ProductService;

class PublicProductController extends Controller
{
    public function index(Request $request, Category $category = null)
    {
        $companies = Product::where('visibility', true)->groupBy('company')->get();
        $colors = Product::where('visibility', 1)->groupBy('color')->get('color');
        $categories = Category::get();
        //filter
        $products =  (new ProductService())->get_the_product(
            $category,
            $request->category,
            $request->company,
            $request->color
        );
        return view('public.product', [
            'products' => $products,
            'categories' => $categories,
            'companies' => $companies,
            'colors'   => $colors,

        ]);
    }
    public function productsCategory(Category $category)
    {
      
        $companies = Product::where('visibility', true)->groupBy('company')->get();
        $colors = Product::where('visibility', 1)->groupBy('color')->get('color');
        $categories = Category::get();
        $products = $category->product->paginate(12);

        return view('public.product', [
            'products' => $products,
            'categories' => $categories,
            'companies' => $companies,
            'colors'   => $colors,

        ]);
    }

    public function showProduct($productId)
    {
       
        $product = Product::find($productId);
        if ($product->visibility == false && $product->category->visibility == false)
            abort(404);

        $thereIsAnActive = false; //for photo scroller 
        $product->click += 1;
        $product->save();

        (new ProductService())->this_customer_clicked_this_product($product);

        return view('public.singleProduct', [
            'product'  =>  $product,
            'thereIsAnActive' => $thereIsAnActive
        ]);
    }

    public function search(Request $request)
    {
        $products = $request->search != null ?
            Product::where('visibility', true)->Where('name', 'LIKE', '%' . $request->search . '%')->paginate(12) :
            $products = Product::where('visibility', true)
            ->whereHas('category', function ($order) {
                $order->where('visibility', true);
            })->paginate(12);

        $companies = Product::where('visibility', true)->groupBy('company')->get();
        $colors = Product::where('visibility', 1)->groupBy('color')->get('color');
        $categories = Category::get();

        return view('public.product', [
            'products' => $products,
            'categories' => $categories,
            'companies' => $companies,
            'colors'   => $colors,

        ]);
    }
}
