<?php

namespace Modules\Car\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specification extends Model
{
    use HasFactory;

    protected $fillable = ['specification_name','description'];
    
    protected static function newFactory()
    {
        return \Modules\Car\Database\factories\SpecificationFactory::new();
    }

    public function cars() 
    {
        return $this->belongsToMany(Car::class,'car_specification');
    }
}
