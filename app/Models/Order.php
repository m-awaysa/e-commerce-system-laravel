<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'sold_price',
        'phone_number',
        'note',
        'city',
        'street',
        'status',
       
      

    ];
    public function user (){
        return $this->belongsTo(User::class);
    }

    public function sale (){
        return $this->hasMany(Sale::class);
    }



}
