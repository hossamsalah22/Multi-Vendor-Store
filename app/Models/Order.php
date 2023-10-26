<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'payment_status',
        'payment_method',
        'user_id',
        'store_id',
        'total'
    ];

    protected static function booted()
    {
        static::creating(function ($order) {
            $order->number = self::getNextOrderNumber();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest',
        ]);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->using(OrderProduct::class)
            ->withPivot('name', 'quantity', 'price');
    }

    public function addresses()
    {
        return $this->hasMany(AddressOrder::class);
    }

    public function billingAddress()
    {
        return $this->hasOne(AddressOrder::class)->where('type', 'billing');
    }

    public function shippingAddress()
    {
        return $this->hasOne(AddressOrder::class)->where('type', 'shipping');
    }

    public static function getNextOrderNumber()
    {
        $currentYear = Carbon::now()->year;
        $number = self::whereYear('created_at', $currentYear)->max('number');
        if (!$number) {
            return $currentYear . '0001';
        }
        return $number + 1;
    }

    public function getRouteKeyName()
    {
        return 'number';
    }
}
