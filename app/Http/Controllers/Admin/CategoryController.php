<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Exception;


class CategoryController extends Controller
{
    public function index()
    {
       $categories = Category::paginate(30);       
    
        return view('admin.category.list', [
            'categories' => $categories,
        ]);
    }

    public function viewStore()
    {
        return view('admin.category.add');
    }

    public function store(StoreCategoryRequest $request, CategoryService $service)
    {
       
        $service->store(
            $request->file('image'),
            $request->category_name,
            $request->description,
            $request->has('visibility'),
            $request->feature
        );
        return redirect()->route('category')->with('success', 'Category added.');
    }

    public function delete(Category $category)
    {
        //if you change the image name(html) when you delete the product it will keep the image 
        //so make sure we are not stacking unused image
        if (file_exists(public_path('images/productImages/' . $category->image))) {
            try {
                $category->delete();
            } catch (Exception $e) {
                return redirect()->route('category')->with('imageStatus', 'Category can’t be deleted if it has products.');
            }
            $filepath = public_path('images/productImages/' . $category->image);
            unlink($filepath);
        } else {
            return redirect()->route('category')->with('imageStatus', 'image not found');
        }
        return redirect()->route('category')->with('success', 'deleted successfully');
    }

    public function viewEdit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
            'i' => 1

        ]);
    }

    public function edit(UpdateCategoryRequest $request, Category $category, CategoryService $service)
    {
        $service->update(
            $request->file('image'),
            $category,
            $request->category_name,
            $request->description,
            $request->has('visibility'),
            $request->feature
        );

        return redirect()->route('category')->with('success', 'updated successfully');;
    }
}
