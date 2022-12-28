<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePart extends Model
{
    use HasFactory;
    
    protected $table ='home_parts';
    protected $fillable = [
        'name',

    ];

    public function product (){
        return $this->belongsToMany(Product::class, 'home_part_product')->withTimestamps()->as('homePartProduct');
    }
}
