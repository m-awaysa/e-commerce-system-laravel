<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'company_name',
        'company_number',
        'address',
        'phone_number',
        'active',
        'role',
        'discount'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function product()
    {
        return $this->belongsToMany(Product::class)->withTimestamps()->withPivot(['amount']);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function productActivity()
    {
        return $this->belongsToMany(Product::class, 'userActivities')->withTimestamps()
        ->withPivot(['click','added_to_cart','request','bought'])->as('userActivity');
    }
  
}
