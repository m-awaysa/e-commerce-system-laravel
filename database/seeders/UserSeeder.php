<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
         
            [
                'id' =>1,
                'first_name' => 'Reserved',
                'last_name' => 'Guests',
                'company_name' => 'reserved Guests',
                'company_number' => '000000000',
                'address' =>  'reserved Guests',
                'phone_number' => '000000000',
                'role' => 0,
                'discount' => 0,
                'active' => 1,
                'email' =>'reserved@reserved.reserved',
                'email_verified_at' => now(),
                'created_at' => now(),
                'password' => Hash::make('guest0000guest'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'id' =>2,
                'first_name' => 'Mohammed',
                'last_name' => 'AWAYSA',
                'company_name' => 'AWAYSA',
                'company_number' => '156465186',
                'address' =>  'admin',
                'phone_number' => '54665132165',
                'role' => 1,
                'discount' => 0,
                'active' => 1,
                'email' =>'theawaysa@gmail.com',
                'email_verified_at' => now(),
                'created_at' => now(),
                'password' => Hash::make('123456789'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'id' =>3,
                'first_name' => 'Admin',
                'last_name' => 'Guest',
                'company_name' => 'adminGuest',
                'company_number' => '99999999',
                'address' =>  'adminGuest',
                'phone_number' => '999999999',
                'role' => 1,
                'discount' => 0,
                'active' => 1,
                'email' =>'guest@admin.com',
                'email_verified_at' => now(),
                'created_at' => now(),
                'password' => Hash::make('guestguest'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'id' =>4,
                'first_name' => 'User',
                'last_name' => 'Guest',
                'company_name' => 'UserGuest',
                'company_number' => '99999999',
                'address' =>  'UserGuest',
                'phone_number' => '999999999',
                'role' => 0,
                'discount' => 0,
                'active' => 1,
                'email' =>'guest@user.com',
                'email_verified_at' => now(),
                'created_at' => now(),
                'password' => Hash::make('guestguest'), // password
                'remember_token' => Str::random(10),
            ],
             
           ];
        
        
           foreach($users as $user)
             
                   User::create(
                    $user
                    
                );
                
        
    }
}
