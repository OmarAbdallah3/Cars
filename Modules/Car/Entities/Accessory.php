<?php

namespace Modules\Car\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accessory extends Model
{
    use HasFactory;

    protected $fillable = ['accessory_name','description'];
    
    protected static function newFactory()
    {
        return \Modules\Car\Database\factories\AccessoryFactory::new();
    }

    public function cars() 
    {
        return $this->belongsToMany(Car::class,'car_accessory');
    }
}
