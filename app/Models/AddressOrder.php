<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Intl\Countries;

class AddressOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'city',
        'country',
        'state',
        'postal_code',
        'order_id',
    ];

    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getCountryNameAttribute(): string
    {
        return Countries::getName($this->country);
    }
}
