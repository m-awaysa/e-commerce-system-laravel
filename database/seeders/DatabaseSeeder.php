<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(HomeImageSeeder::class);
        $this->call(HomePartSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(SaleSeeder::class);
   
 
    
      
    }
}
