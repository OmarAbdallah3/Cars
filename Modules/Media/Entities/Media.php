<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Entities\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Media extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
    
    protected $table = "medias";

    protected $fillable = ['mediable','file_name','file_path','caption'];
    
    protected static function newFactory()
    {
        return \Modules\Media\Database\factories\MediaFactory::new();
    }

    public function mediable() 
    {
        return $this->morphTo();
        
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

}
