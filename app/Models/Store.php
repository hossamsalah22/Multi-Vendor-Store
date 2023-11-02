<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Store extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes, HasSlug, HasTranslations;

    protected $guarded = ['id'];
    protected $with = ['media'];
    protected $appends = ['image'];

    public $translatable = ['name', 'description'];

    public static function booted(): void
    {
        static::created(function ($store) {
            if (request()->hasFile('image'))
                $store->addMediaFromRequest('image')->toMediaCollection('stores');
        });
    }

    ############################# Start Attributes #############################

    public function getImageAttribute(): string
    {
        return $this->getFirstMediaUrl('stores');
    }

    ############################# End Attributes #############################


    ############################# Start Relations #############################
    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    ############################# End Relations #############################

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->usingLanguage('en')
            ->saveSlugsTo('slug');
    }
}
