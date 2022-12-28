<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Feature;
use Faker\Core\Uuid;

class CategoryService
{

    public function store(
        \Illuminate\Http\UploadedFile $image,
        string $categoryName,
        string $description,
        bool $visibility,
        array|null $features
    ): void {
        $filename = $image->hashName();
        $recentCategory = Category::create([
            'name' => $categoryName,
            'description' => $description,
            'visibility' => $visibility,
            'image' => $filename,
        ]);

        $this->storeCategoryFeatures($features, $recentCategory->id);
    }

    private function storeImage(\Illuminate\Http\UploadedFile $image, string $filename): void
    {
        $upload_path = base_path('./') . '/' . 'public/images/productImages';
        $image->move($upload_path, $filename);
    }

    private function storeCategoryFeatures(array|null $features, int|Uuid $categoryId): void
    {
        if ($features != null) {
            foreach ($features as $feature) {
                Feature::create([
                    'category_id' => $categoryId,
                    'feature_name' => $feature
                ]);
            }
        }
    }

    public function update(
        \Illuminate\Http\UploadedFile|null $image,
        Category $category,
        string  $categoryName,
        string $description,
        bool $visibility,
        array|null  $features
    ): void {
        if ($image) {
            //save the new image
            $filename = $image->hashName();
            $this->storeImage($image, $filename);
            //remove the old image
            unlink(public_path('images/productImages/' . $category->image));
            $category->image = $filename;
            $category->save();
        }

        //edit the category
        $category->name = $categoryName;
        $category->visibility = $visibility;
        $category->description = $description;
        $category->save();

        $this->updateCategoryFeatures($features, $category);
    }

    private function updateCategoryFeatures(array|null $features, Category $category): void
    {
        //delete the unwanted feature
        foreach ($category->feature as $feature) {
            if (array_key_exists($feature->id, $features)) {
                $feature->feature_name = $features[$feature->id];
                $feature->save();
                unset($featureArray[$feature->id]);
            } else {
                $feature->delete();
            }
        }
        //store the new features
        $this->storeCategoryFeatures($features, $category->id);
    }
}
