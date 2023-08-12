<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Modules\CarNew\Entities\CarNew;
use Modules\Media\Entities\Media;
use Modules\Post\Entities\Post;
use Modules\Review\Entities\Review;

class User extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ['name','email','password','phone','address','gender','is_admin'];
    
    protected static function newFactory()
    {
        return \Modules\User\Database\factories\UserFactory::new();
    }

    public function cars() 
    {
        return $this->hasMany(Car::class);
    }

    public function posts() 
    {
        return $this->hasMany(Post::class);
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    public function actions() 
    {
        return $this->hasMany(Action::class);
    }

    public function carNews() 
    {
        return $this->hasMany(CarNew::class);
    }

    public function medias() 
    {
        return $this->morphMany(Media::class,'mediable');
    }
}
