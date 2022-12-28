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
                'id' =>2,
                'first_name' => 'Mohammed',
                'last_name' => 'AWAYSA',
                'company_name' => 'AWAYSA',
                'company_number' => '156465186',
                'address' =>  'guest',
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
                'id' =>1,
                'first_name' => 'guest',
                'last_name' => 'guest',
                'company_name' => 'guest',
                'company_number' => '000000000',
                'address' =>  'guest',
                'phone_number' => '000000000',
                'role' => 0,
                'discount' => 0,
                'active' => 1,
                'email' =>'guest@guest.guest',
                'email_verified_at' => now(),
                'created_at' => now(),
                'password' => Hash::make('guest0000guest'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'id' =>3,
                'first_name' => 'Guest',
                'last_name' => 'Guest',
                'company_name' => 'Guest',
                'company_number' => '99999999',
                'address' =>  'Guest123',
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
                'first_name' => 'Guest',
                'last_name' => 'Guest',
                'company_name' => 'Guest',
                'company_number' => '99999999',
                'address' =>  'Guest123',
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
