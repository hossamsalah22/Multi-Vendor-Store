<?php

namespace App\Models;

use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Admin extends User implements HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia, SoftDeletes, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'username',
        'phone_number',
        'is_super_admin',
        'banned',
        'store_id',
        'password'
    ];

    protected $hidden = [
        'password',
        'is_super_admin',
    ];

    protected $with = [
        'media',
    ];

    protected $appends = ['image'];

    public static function booted()
    {
        static::observe(AdminObserver::class);
    }

    public function getImageAttribute(): string
    {
        return $this->getFirstMediaUrl('admins');
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function isSuperAdmin(): bool
    {
        return $this->is_super_admin;
    }


    ############################# Start Relations #############################
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    ############################# End Relations #############################
}
