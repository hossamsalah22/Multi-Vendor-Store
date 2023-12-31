<?php

namespace App\Models;

use App\Observers\AdminObserver;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class Admin extends User implements HasMedia, MustVerifyEmail
{
    use HasFactory
        , Notifiable
        , InteractsWithMedia
        , SoftDeletes
        , HasApiTokens
        , HasRoles
        , Sluggable;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'banned',
        'store_id',
        'password',
        'language',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = [
        'media',
    ];

    protected $appends = ['image'];

    public static function booted()
    {
        static::creating(function ($admin) {
            $admin->password = Hash::make('password');
        });
        static::created(function ($admin) {
            if (request()->hasFile('image'))
                $admin->addMediaFromRequest('image')->toMediaCollection('admins');
        });
    }

    public function getImageAttribute(): string
    {
        return $this->getFirstMediaUrl('admins');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }


    ############################# Start Relations #############################
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    ############################# End Relations #############################
    public function sluggable(): array
    {
        // TODO: Implement sluggable() method.
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
