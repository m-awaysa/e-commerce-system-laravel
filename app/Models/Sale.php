<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchased_price',
        'company',
        'discount',
        'amount',
        'category_id',
        'sold_price',
        'color',
        'product_code',
        'product_id',
        'order_id',
        'type'

    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function scopeMonthlyEarnings($query)
    {
        $monthlyEarning = 0;
        $query->whereHas('order', function ($order) {
            $order->where('status', 'sold');
        })->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->each(function ($sale) use (&$monthlyEarning) {
                $monthlyEarning += (int)(($sale->sold_price - $sale->purchased_price) * $sale->amount);
            });
        return $monthlyEarning;
    }
    public function scopeYearlyEarnings($query)
    {
        $yearlyEarning = 0;
        $query->whereHas('order', function ($order) {
            $order->where('status', 'sold');
        })->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
            ->each(function ($sale) use (&$yearlyEarning) {
                $yearlyEarning += (int)(($sale->sold_price - $sale->purchased_price) * $sale->amount);
            });
        return $yearlyEarning;
    }
}
