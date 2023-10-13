<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['media'];
    protected $appends = ['image'];

    ############################# Start Attributes #############################

    public function getImageAttribute(): string
    {
        return $this->getFirstMediaUrl('products');
    }

    public function getDiscountAttribute(): float
    {
        if (!$this->compare_price) {
            return 0;
        }
        return number_format(100 - ($this->price * 100 / $this->compare_price), 0);
    }

    public function getNewAttribute(): bool
    {
        return $this->created_at->diffInDays() <= 30;
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('active', 1);
    }

    public function scopeAvailable(Builder $builder): Builder
    {
        return $builder->where('quantity', '>', 0);
    }

    public function scopeFilter(Builder $builder, $options)
    {
        $options = array_merge([
            'category' => '',
            'store' => '',
        ], $options);

        if ($options['category']) {
            $builder->whereHas('category', function ($builder) use ($options) {
                $builder->where('slug', $options['category']);
            });
        }
        if ($options['store']) {
            $builder->whereHas('store', function ($builder) use ($options) {
                $builder->where('slug', $options['store']);
            });
        }

    }
    ############################# End Attributes #############################

    ############################# Start Relations #############################
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'No Category'
        ]);
    }

    public function store()
    {
        return $this->belongsTo(Store::class)->withDefault([
            'name' => 'No Store'
        ]);
    }


    ############################# End Relations #############################

    public function getRouteKeyName()
    {
        return 'slug';
    }

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
