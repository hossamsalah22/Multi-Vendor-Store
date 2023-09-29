<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
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
