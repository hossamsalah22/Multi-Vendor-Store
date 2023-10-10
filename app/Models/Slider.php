<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slider extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, Sluggable, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'price',
        'active',
    ];

    protected $with = ['media'];

    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('sliders');
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('active', 1);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
