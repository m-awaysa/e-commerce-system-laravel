<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\HomeImage;
use App\Models\HomePart;

class LayoutController extends Controller
{

    public function index()
    {
        $homeImages = HomeImage::paginate(10);
        $homeParts = HomePart::paginate(10);

        return view('admin.layouts.home', [
            'homeImages' => $homeImages,
            'homeParts' => $homeParts,
        ]);
    }


    public static function  addImage(Request $request)
    {
        $request->validate([
            'image'  => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:10240'],
        ]);

        //do the image name
        $filename = $request->file('image')->hashName();

        //store the image
        HomeImage::create([
            'active' => 1,
            'image' => $filename,
        ]);
        //store the category image
        $upload_path = base_path('./') . '/' . 'public/images/productImages';
        $request->file('image')->move($upload_path, $filename);

        return redirect()->route('layout.home');
    }


    public static function  deleteHomeImage(HomeImage $homeImage)
    {
        $filepath = public_path('images/productImages/' . $homeImage->image);
        //if you change the image name when you delete the product it will keep the image 
        //so make sure we are not stacking unused image
        if (file_exists(public_path('images/productImages/' . $homeImage->image))) {
            unlink($filepath);
            $homeImage->delete();
        } else {
            return redirect()->route('category')->with('imageStatus', 'image not found');
        }

        return redirect()->route('layout.home');
    }


    public static function  toggle(HomeImage $homeImage)
    {
        $homeImage->active = !$homeImage->active;
        $homeImage->save();

        return redirect()->route('layout.home');
    }


    public static function  addHomePart(Request $request)
    {
        $request->validate(['name' => ['required', 'min:3', 'max:255']]);

        HomePart::create([
            'name' => $request->name
        ]);

        return redirect()->route('layout.home');
    }


    public static function  deleteHomePart(HomePart $homePart)
    {
        $homePart->delete();

        return redirect()->route('layout.home');
    }


    public static function  editHomePartView(HomePart $homePart)
    {
        $homePartProducts = $homePart->product->paginate(10);

        $products = Product::withCount('HomePart')->where('visibility', 1)->paginate(20);

        return view('admin.layouts.edit-home-part', [
            'homePart' => $homePart,
            'products' => $products,
            'homePartProducts' => $homePartProducts,
        ]);
    }


    public static function  removeProductFromHomePart(HomePart $homePart, Product $product)
    {
        $homePart->product()->detach($product->id);
        return redirect()->route('layout.home.part.edit', $homePart);
    }


    public static function  addProductToHomePart(HomePart $homePart, Product $product)
    {
        $homePart->product()->attach($product->id);
        return redirect()->route('layout.home.part.edit', $homePart);
    }
}
