<?php

namespace Modules\CarInsurance\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Car\Entities\Car;

class CarInsurance extends Model
{
    use HasFactory;

    protected $fillable = ['owner_name','insurance_type','insurance_price'];
    
    protected static function newFactory()
    {
        return \Modules\CarInsurance\Database\factories\CarInsuranceFactory::new();
    }

    public function car() 
    {
        return $this->belongsTo(Car::class);
    }
}
