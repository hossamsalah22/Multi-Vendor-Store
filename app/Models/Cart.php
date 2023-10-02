<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $fillable = [
        'cookie_id',
        'product_id',
        'user_id',
        'quantity',
    ];

    ############################### Events ###############################
    protected static function booted()
    {
        static::observe(CartObserver::class);
    }
    ############################### End Events ###############################

    ############################### Relations ###############################

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest',
        ]);
    }

    ############################### End Relations ###############################
}
