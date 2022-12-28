<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Faker\Core\Uuid;
use \Illuminate\Http\UploadedFile;

class ProductService
{

    public function this_features_belong_to_this_category(array|null $features, Category $category): bool
    {
        if ($features) {
            foreach ($features as  $featureId => $feature) {
                if (!$category->feature->find($featureId))
                    return false;
            }
        }
        return true;
    }

    public function collect_the_images_names(array $photos): array
    {
        $fileNames[] = [];
        foreach ($photos as $id => $photo) {
            $fileNames[$id] = $photo->hashName();
        }
        return  $fileNames;
    }

    /**
     * @return string $name
     */
    public function store_the_image_file(UploadedFile $image): string
    {
        $name = $image->hashName();
        $upload_path = base_path('./') . '/' . 'public/images/productImages';
        $image->move($upload_path, $name);
        return $name;
    }

    public function store_the_image_in_database(int| Uuid $id, array|null $images, array|null $fileNames): void
    {
        //store the secondary images
        if ($images) {
            //add the product images
            foreach ($fileNames as $name) {
                Image::create([
                    'product_id' => $id,
                    'image' => $name
                ]);
            }

            foreach ($images as $id => $photo) {
                $this->service->store_the_image_file($images[$id], $fileNames[$id]);
            }
        }
    }

    public function store_product_feature(Product $product, array|null $features): void
    {
        if($features)
        foreach ($features as $featureId => $featureValue) {
            if ($featureValue) {
                $product->feature()->attach([$featureId => ['feature_value' => $featureValue]]);
            }
        }
    }

    public function sync_the_new_feature(array|null $features, Product $product): void
    {
        $featureTdAndValues = [];
        if($features)
        foreach ($features as $featureId => $featureValue) {
            if ($featureValue) {
                $featureTdAndValues[$featureId] =  ['feature_value' => $featureValue];
            }
        }
        $product->feature()->sync($featureTdAndValues);
    }

    public function remove_product_image(Product|Image $containImage): bool
    {
        //if you change the image name when you delete the product it will keep the image 
        //so make sure we are not stacking unused image
        if (file_exists(public_path('images/productImages/' . $containImage->image))) {
            unlink(public_path('images/productImages/' . $containImage->image));
            return true;
        } else {
            return false;
        }
    }
}
