<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'user_id',
        'is_published'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'meta' => 'array'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    } 

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
                ->width(200)
                ->height(200)
                ->crop('crop-center', 200, 200)
                ->sharpen(5)
                ->format('webp');
        $this->addMediaConversion('index_cover')
                ->width(450)
                ->height(280)
                ->crop('crop-center', 450, 280)
                ->sharpen(8)
                ->format('webp');
        $this->addMediaConversion('carousel')
                ->width(920)
                ->height(570)
                ->crop('crop-center', 920, 570)
                ->sharpen(8)
                ->format('webp');
    }
}
