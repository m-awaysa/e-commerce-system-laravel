<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Services\Admin\ProductService;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {  
        $categories = Category::get();

        $arrayProducts = [];
        if ($request->categories != null) {
            foreach ($request->categories as $categoryID) {
                $category = Category::find($categoryID);

                $product = $category->product()->with('category')->paginate();
                array_push($arrayProducts,  $product);
            }
            
        } else {
            $product = Product::with('category')->paginate(20);
            array_push($arrayProducts,  $product);
        }

        return view('admin.product.list', [
            'categories' => $categories,
            'arrayProducts' => $arrayProducts
        ]);
    }


    public function viewAdd(Category $category)
    {
        $features = $category->feature;

        return view('admin.product.add', [

            'features' => $features,
            'category' => $category

        ]);
    }


    public function add(StoreProductRequest  $request, Category $category)
    {
        if(!$this->service->this_features_belong_to_this_category($request->features, $category)) 
           return redirect()->back()->with('error', "this feature doesn't belong to this category");

        //store the main image
        $backgroundImageName =  $this->service->store_the_image_file($request->file('image'));

        //store the product
        $lastProduct = Product::create([
            'price' => $request->product_price,
            'name' => $request->product_name,
            'company' => $request->product_company,
            'discount' => $request->product_discount,
            'description' => $request->description,
            'visibility' => $request->has('visibility'),
            'category_id' => $category->id,
            'amount' => $request->amount,
            'click' => 0,
            'image' => $backgroundImageName,
            'color' => $request->product_color,
            'product_code' => $request->product_code,
            'purchased_price' => $request->purchased_price,
        ]);

        // store the product secondary images
        if ($request->has('photos')) {
            $fileNames =  $this->service->collect_the_images_names($request->photos);
            $this->service->store_the_image_in_database($lastProduct->id, $request->photos, $fileNames);
        }

        // add features
        $this->service->store_product_feature($lastProduct, $request->features);

        return redirect()->route('product')->with('success', 'product added');
    }


    public function delete(Product $product)
    {
        //remove main image
       if(! $this->service->remove_product_image($product) )
        return redirect()->route('product')->with('imageStatus', 'image not found');

        //remove secondary images 
        foreach ($product->photo as $photo) {
          if(! $this->service->remove_product_image($photo) )
             return redirect()->route('product')->with('imageStatus', 'sub image not found');
        }

        $product->delete();

        return redirect()->route('product')->with('success', 'deleted successfully');
    }


    public function viewEdit(Product $product)
    {
        $features = $product->category->feature;
        $productFeatures = $product->feature;
        $notProductFeatures = [];

        foreach ($features  as   $feature) {
            if ($feature->product->find($product->id) == null) {
                array_push($notProductFeatures, $feature);
            }
        }

        return view('admin.product.edit', [
            'product' => $product,
            'productFeatures' => $productFeatures,
            'notProductFeatures' => $notProductFeatures

        ]);
    }


    public function edit(UpdateProductRequest  $request, Product $product)
    {
        if(!$this->service->this_features_belong_to_this_category($request->features, $product->category))
            return redirect()->back()->with('error', "this feature doesn't belong to this category");

        //validate the new photo when the user enter new one otherwise dont validate
        if ($request->hasFile('image')) {
            $request->validate(['image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:10240']]);

            if(!$this->service->remove_product_image($product))
              return  redirect()->route('product.edit', $product)
                ->with('imageStatus', 'image not found. you cant change the image');

            //save the new image
            $filename =  $this->service->store_the_image_file($request->file('image'));
        } else {
            //if there is no new photo keep the old one
            $filename = $product->image;
        }

        //edit the product
        $product->name = $request->product_name;
        $product->company = $request->product_company;
        $product->image = $filename;
        $product->price = $request->product_price;
        $product->visibility = $request->has('visibility');
        $product->discount = $request->product_discount;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->color = $request->product_color;
        $product->product_code = $request->product_code;
        $product->purchased_price = $request->purchased_price;
        $product->save();

        //edit features 
        $this->service->sync_the_new_feature($request->features, $product);

        return redirect()->route('product')->with('success', 'edited successfully');
    }
}
