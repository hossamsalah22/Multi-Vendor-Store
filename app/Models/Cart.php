<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

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

        // add global scope
        static::addGlobalScope('cookie_id', function ($builder) {
            $builder->where('cookie_id', Cart::getCookieId());
        });
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

    public static function getCookieId()
    {
        $cookie_id = Cookie::get('cart_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id, 60 * 24 * 30);
        }
        return $cookie_id;
    }
}
