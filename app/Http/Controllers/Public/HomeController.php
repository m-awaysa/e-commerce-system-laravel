<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\homePart;
use App\Models\Product;
use App\Models\HomeImage;
class HomeController extends Controller
{
     
    public function index(){ 
        $carouselPart = HomeImage::where('active',1)->get(); 
        $thereIsAnActive = false;
        $products = Product::paginate(18);
        $homeParts = homePart::with('product')->get();
        
        return view('public.home', [
            'products' => $products,
            'carouselPart'=>$carouselPart ,
            'homeParts'=> $homeParts,
           
            'thereIsAnActive'=>$thereIsAnActive
        ]);
    }
    
    public function readMe(){
        return view('public.read-me');
    }

}
