<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, Sluggable, SoftDeletes, InteractsWithMedia;

    protected $guarded = ['id'];
    protected $with = ['media'];
    protected $appends = ['image'];

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
            'name' => 'Main Category'
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


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
