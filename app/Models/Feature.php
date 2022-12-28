<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'feature_name',
        'category_id'
    ];
    public function product()
    {
              return $this->belongsToMany(Product::class)->withTimestamps()->withPivot(['feature_value']);
    
    }
    public function category()
    {
              return $this->belongsTo(Category::class);
    
    }

}
