<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'name',
        'company',
        'discount',
        'description',
        'visibility',
        'amount',
        'category_id',
        'click',
        'image',
        'color',
        'product_code',
        'purchased_price'



    ];

    public function guestOrder()
    {
        return $this->hasMany(GuestOrder::class);
    }

    public function userActivity()
    {
        return $this->belongsToMany(User::class, 'userActivities')
        ->withTimestamps()->withPivot(['click','added_to_cart','request','bought'])->as('userActivity');
    }
    public function sale()
    {
        return $this->hasMany(Sale::class);
    }
    public function category (){
        return $this->belongsTo(Category::class);
    }
  
 
    public function photo()
    {
        return $this->hasMany(Image::class);
    }
    public function feature()
    {
        return $this->belongsToMany(Feature::class)->withTimestamps()->withPivot(['feature_value']);
    }
    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot(['amount']);
    }
    public function homePart()
    {
        return $this->belongsToMany(HomePart::class)->withTimestamps()->as('homePartProduct');
    }

}
