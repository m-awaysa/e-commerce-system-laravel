<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;


class PublicCategoryController extends Controller
{
    public function index(){
     
    $categories = Category::where('visibility',true)->get();

        return view('public.category',[
            'categories' => $categories
        ]);
       }
}
