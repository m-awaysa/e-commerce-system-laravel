<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'company_name',
        'company_number',
        'phone_number',
        'email',
        'amount',
        'status',
        'note',
        'city',
        'street',
        'sold_price'
       
        
      

    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
