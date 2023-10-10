<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Admin extends User implements HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'phone_number',
        'is_super_admin',
        'active',
    ];

    protected $hidden = [
        'password',
    ];

    protected $with = [
        'media',
    ];

    protected $appends = ['image'];

    public function getImageAttribute(): string
    {
        return $this->getFirstMediaUrl('admins');
    }


    ############################# Start Relations #############################
    public function store()
    {
        return $this->hasOne(Store::class);
    }

    ############################# End Relations #############################
}
