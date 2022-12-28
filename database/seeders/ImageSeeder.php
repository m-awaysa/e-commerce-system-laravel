<?php

namespace Database\Seeders;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images =[
            [
                'id'=>1,
                'product_id' =>1,
                'image' =>'MS-MM711-BLACK-3.png',
                
            ],
            [
                'id'=>2,
                'product_id' =>1,
                'image' =>'MS-MM711-BLACK-10.png',
                
            ],
            [
                'id'=>3,
                'product_id' =>1,
                'image' =>'MS-MM711-BLACK-1.png',
                
            ],
            [
                'id'=>4,
                'product_id' =>2,
                'image' =>'MM710-1.png',
                
            ],
            [
                'id'=>5,
                'product_id' =>2,
                'image' =>'MM710-2.png',
                
            ],
            [
                'id'=>6,
                'product_id' =>2,
                'image' =>'MM710-3.png',
                
            ],
            [
                'id'=>7,
                'product_id' =>3,
                'image' =>'LOGITECH-G402-1.png',
                
            ],
            [
                'id'=>8,
                'product_id' =>3,
                'image' =>'LOGITECH-G402-2.png',
                
            ],
            [
                'id'=>9,
                'product_id' =>3,
                'image' =>'LOGITECH-G402-3.png',
                
            ],
            [
                'id'=>10,
                'product_id' =>4,
                'image' =>'LOGITECH-G403-1.png',
                
            ],
            [
                'id'=>11,
                'product_id' =>4,
                'image' =>'LOGITECH-G403-2.png',
                
            ],
            [
                'id'=>12,
                'product_id' =>5,
                'image' =>'LOGITECH-G403-3.png',
                
            ],
            [
                'id'=>13,
                'product_id' =>5,
                'image' =>'DEATHADDER-1V2-1.png',
                
            ],
            [
                'id'=>14,
                'product_id' =>5,
                'image' =>'DEATHADDER-1V2-2.png',
                
            ],
            [
                'id'=>15,
                'product_id' =>5,
                'image' =>'DEATHADDER-1V2-3.png',
                
            ],
         
           ];
        
        
           foreach($images as $image)
             
                   Image::create(
                    $image
                    
                );
        
                
            }
}
