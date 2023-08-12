<?php

namespace Modules\CarInstallment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Car\Entities\Car;
use Modules\Price\Entities\Price;

class CarInstallment extends Model
{
    use HasFactory;

    protected $fillable = ['installment_method','period','term'];

    protected $casts = [
        'period' => 'date',
    ]; 
    
    protected static function newFactory()
    {
        return \Modules\CarInstallment\Database\factories\CarInstallmentFactory::new();
    }

    public function car() 
    {
        return $this->belongsTo(Car::class);
    }

    public function price() 
    {
        return $this->belongsTo(Price::class);
    }



}
