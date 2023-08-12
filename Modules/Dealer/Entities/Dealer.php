<?php

namespace Modules\Dealer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Car\Entities\Car;

class Dealer extends Model
{
    use HasFactory;

    protected $fillable = ['dealer_name','address','delear_phone','dealer_availability'];
    
    protected static function newFactory()
    {
        return \Modules\Dealer\Database\factories\CarDealerFactory::new();
    }

    public function car() 
    {
        return $this->belongsTo(Car::class);
    }

    public function media() 
    {
        return $this->morphMany(Media::class,'mediable');
    }
}
