<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomePart;
class HomePartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  $homeParts =[
        [
            'id'=>1,
            'name' =>'New Arrival',
          
        ],
        [
            'id'=>2,
            'name' =>'Most Sale',
          
        ],
        [
            'id'=>3,
            'name' =>' We Chose For You',
          
        ],
     
    
        
    
       ];
    
    
       foreach($homeParts as $homePart)
         
               HomePart::create(
                $homePart
                
            );
            $homePart =HomePart::find(1);
            $homePart->product()->attach(1);
            $homePart->product()->attach(15);
            $homePart->product()->attach(35);

            $homePart =HomePart::find(2);
            $homePart->product()->attach(19);
            $homePart->product()->attach(28);
            $homePart->product()->attach(34);

            $homePart =HomePart::find(3);
            $homePart->product()->attach(8);
            $homePart->product()->attach(16);
            $homePart->product()->attach(22);
    
    }
}
