<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;




class DiscountController extends Controller
{

    public function index()
    {

        $products =  Product::where('discount', '!=', 0)->orderBy('discount', 'desc')->get();

        return view('public.discount', [
            'products' => $products
        ]);
    }
}
