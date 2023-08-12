<?php

namespace Modules\Price\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Car\Entities\Car;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['submitted_price','monthly_installment','yearly_installment','total_price'];
    
    protected static function newFactory()
    {
        return \Modules\Price\Database\factories\PriceFactory::new();
    }

    public function car() 
    {
        return $this->belongsTo(Car::class);
    }
}
