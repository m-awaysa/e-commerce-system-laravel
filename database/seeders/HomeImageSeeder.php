<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeImage;

class HomeImageSeeder extends Seeder
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

                'image' =>'QDBrSsooep17ZBFDsdrU6gS8Pdv5P4koHct2woZs.png',
                'active' =>1,
            ],
            [
                'id'=>2,
             
                'image' =>'elYz4XsHFmUzSU7vHcMoAKf88B8OscN4VBo6ECPs.png',
                'active' =>1,
            ],
            [
                'id'=>3,
         
                'image' =>'6xdZf6l63RMqLbXRF46iFLX7bCy5wwz6gik81w9x.png',
                'active' =>1,
            ],
            
        
            
        
           ];
        
        
           foreach($images as $image)
             
                   HomeImage::create(
                    $image
                    
                );
        
                
            }
    }

