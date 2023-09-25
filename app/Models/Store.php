<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Store extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['media'];
    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('stores');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
