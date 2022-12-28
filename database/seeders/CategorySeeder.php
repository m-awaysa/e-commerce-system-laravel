<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //    Category::factory(5)
    //    ->create()
    //    ->each(function($category){
    //     Product::factory(10)
    //     ->create(['category_id'=>$category->id])
    //     ->each(function($product){
    //         Image::factory(2)
    //         ->create(['product_id'=>$product->id]);
    //     });
    //    });
    $categories =[
        [
            'id'=>1,
            'name' =>'Mice',
            'description' =>'this is supposed to be a description.',
            'image' =>'mice.jpg',
            'visibility' =>1,
        ],
        [
            'id'=>2,
            'name' =>'Keyboards',
            'description' =>'this is supposed to be a description.',
            'image' =>'Keyboards.jpg',
            'visibility' =>1,
        ],
        [
            'id'=>3,
            'name' =>'CPU',
            'description' =>'this is supposed to be a description.',
            'image' =>'CPU.png',
            'visibility' =>1,
        ],
        [
            'id'=>4,
            'name' =>'GPU',
            'description' =>'this is supposed to be a description.',
            'image' =>'GPU.png',
            'visibility' =>1,
        ],
        [
            'id'=>5,
            'name' =>'Headset',
            'description' =>'this is supposed to be a description.',
            'image' =>'Headphones.png',
            'visibility' =>1,
        ],
        [
            'id'=>6,
            'name' =>'Monitors',
            'description' =>'this is supposed to be a description.',
            'image' =>'Monitors.png',
            'visibility' =>1,
        ],
    
        
    
       ];
    
    
       foreach($categories as $category)
         
               Category::create(
                $category
                
            );
    
            
        }

    }

