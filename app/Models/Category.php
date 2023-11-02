<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasTranslations, HasSlug;

    protected $guarded = ['id'];
    protected $with = ['media'];
    protected $appends = ['image'];

    public $translatable = ['name', 'description'];

    public static function booted(): void
    {
        static::created(function ($category) {
            if (request()->hasFile('image'))
                $category->addMediaFromRequest('image')->toMediaCollection('categories');
        });
    }

    ############################# Start Attributes #############################

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('categories');
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('active', 1);
    }
    ############################# End Attributes #############################

    ############################# Start Relations #############################
    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault([
            'name' => __('Primary Category')
        ]);
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    ############################# End Relations #############################


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->usingLanguage('en')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
