<?php

namespace Modules\Evaluation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Car\Entities\Car;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = ['car_paint','transmission','suspention','engine_status','accident'];
    
    protected static function newFactory()
    {
        return \Modules\Evaluation\Database\factories\EvaluationFactory::new();
    }

    public function car() 
    {
        return $this->belongsTo(Car::class);
    }
}
