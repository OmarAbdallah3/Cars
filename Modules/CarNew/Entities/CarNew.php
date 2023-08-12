<?php

namespace Modules\CarNew\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Post\Entities\Post;
use Modules\User\Entities\User;

class CarNew extends Model
{
    use HasFactory;

    protected $fillable = ['description'];
    
    protected static function newFactory()
    {
        return \Modules\CarNew\Database\factories\CarNewFactory::new();
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function post() 
    {
        return $this->belongsTo(Post::class);
    }

    public function media() 
    {
        return $this->morphMany(Media::class,'mediable');
    }


}
