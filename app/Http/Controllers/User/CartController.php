<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class CartController extends Controller
{
    public function index(Request $request)
    {

      
            $cart = auth()->user()->product;

        $sum =  0;
        foreach (auth()->user()->product as $product) {
            $sum += (int)(($product->price - ($product->price * ($product->discount / 100))) * $product->pivot->amount);
        }

        return view('public.cart', [
            'cart' => $cart,
            'sum' => $sum
        ]);
    }
}
