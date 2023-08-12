<?php

namespace Modules\Car\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarMake extends Model
{
    use HasFactory;

    protected $fillable = ['title','country','description'];
    
    protected static function newFactory()
    {
        return \Modules\Car\Database\factories\CarMakeFactory::new();
    }

    public function models()
    {
        return $this->hasMany(CarModel::class);
    }
}
