<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Slider extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasTranslations, HasSlug;

    protected $fillable = [
        'title',
        'description',
        'price',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected $with = ['media'];

    protected $appends = ['image'];

    public $translatable = ['title', 'description'];

    public static function booted(): void
    {
        static::created(function ($slider) {
            if (request()->hasFile('image'))
                $slider->addMediaFromRequest('image')->toMediaCollection('sliders');
        });
    }

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('sliders');
    }

    public function scopeActive(Builder $builder): Builder
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
