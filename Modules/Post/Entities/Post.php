<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Car\Entities\Car;
use Modules\CarNew\Entities\CarNew;
use Modules\Media\Entities\Media;
use Modules\User\Entities\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable = ['title','content','publish_date'];

    protected $casts = [
        'publish_date' => 'datetime',
    ]; 
    
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostFactory::new();
    }

    public function car() 
    {
        return $this->belongsTo(Car::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function carNew() 
    {
        return $this->hasOne(CarNew::class);
    }

    public function registerMediaCollections(): void
{
    $this->addMediaCollection('my_multi_collection');
}
}
