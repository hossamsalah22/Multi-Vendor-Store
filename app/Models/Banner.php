<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Banner extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug, HasTranslations, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected $with = ['media'];

    protected $appends = ['image'];

    public $translatable = ['title', 'description'];

    public static function booted()
    {
        static::created(function ($banner) {
            if (request()->hasFile('image'))
                $banner->addMediaFromRequest('image')->toMediaCollection('banners');
        });
    }

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('banners');
    }

    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->usingLanguage('en')
            ->saveSlugsTo('slug');
    }
}
