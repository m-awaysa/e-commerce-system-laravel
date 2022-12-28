<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders =[
            [
                'id'=>11,
                'user_id'=>2,
                'created_at'=>'2022-12-01 15:25:42',
                'name' =>fake()->Name(),
                'sold_price' => 9840,
                'phone_number' =>57354654,
                'note' =>'this is note',
                'city'=>'this is city ',
                'street' =>'this is street',
                'status' =>'sold',
            ],    
            [
                'id'=>12,
                'user_id'=>2,
                'created_at'=>'2022-12-02 15:25:42',
                'name' =>fake()->Name(),
                'sold_price' => 21195,
                'phone_number' =>57354654,
                'note' =>'this is note',
                'city'=>'this is city ',
                'street' =>'this is street',
                'status' =>'sold',
            ],  
            [
                'id'=>13,
                'user_id'=>2,
                'created_at'=>'2022-12-03 15:25:42',
                'name' =>fake()->Name(),
                'sold_price' => 5897,
                'phone_number' =>57354654,
                'note' =>'this is note',
                'city'=>'this is city ',
                'street' =>'this is street',
                'status' =>'sold',
            ],  
            [
                'id'=>14,
                'user_id'=>2,
                'created_at'=>'2022-12-04 15:25:42',
                'name' =>fake()->Name(),
                'sold_price' => 2780,
                'phone_number' =>57354654,
                'note' =>'this is note',
                'city'=>'this is city ',
                'street' =>'this is street',
                'status' =>'sold',
            ],  
            [
                'id'=>15,
                'user_id'=>2,
                'created_at'=>'2022-12-05 15:25:42',
                'name' =>fake()->Name(),
                'sold_price' => 3046,
                'phone_number' =>57354654,
                'note' =>'this is note',
                'city'=>'this is city ',
                'street' =>'this is street',
                'status' =>'sold',
            ],  
            [
                'id'=>16,
                'user_id'=>2,
                'created_at'=>'2022-12-06 15:25:42',
                'name' =>fake()->Name(),
                'sold_price' => 2290,
                'phone_number' =>57354654,
                'note' =>'this is note',
                'city'=>'this is city ',
                'street' =>'this is street',
                'status' =>'sold',
            ],  
            [
                'id'=>17,
                'user_id'=>2,
                'created_at'=>'2022-12-07 15:25:42',
                'name' =>fake()->Name(),
                'sold_price' => 15395,
                'phone_number' =>57354654,
                'note' =>'this is note',
                'city'=>'this is city ',
                'street' =>'this is street',
                'status' =>'sold',
            ],  
            [
                'id'=>18,
                'user_id'=>2,
                'created_at'=>'2022-12-08 15:25:42',
                'name' =>fake()->Name(),
                'sold_price' => 8295,
                'phone_number' =>57354654,
                'note' =>'this is note',
                'city'=>'this is city ',
                'street' =>'this is street',
                'status' =>'sold',
            ],  
            [
                'id'=>19,
                'user_id'=>2,
                'created_at'=>'2022-12-09 15:25:42',
                'name' =>fake()->Name(),
                'sold_price' => 4660,
                'phone_number' =>57354654,
                'note' =>'this is note',
                'city'=>'this is city ',
                'street' =>'this is street',
                'status' =>'sold',
            ],  
            [
                'id'=>20,
                'user_id'=>2,
                'created_at'=>'2022-12-10 15:25:42',
                'name' =>fake()->Name(),
                'sold_price' => 8400,
                'phone_number' =>57354654,
                'note' =>'this is note',
                'city'=>'this is city ',
                'street' =>'this is street',
                'status' =>'sold',
            ],  
            
           
           ];
        
        
           foreach($orders as $order)
             
                   Order::create(
                    $order
                    
                );
        
                
            }
    
        
    }

