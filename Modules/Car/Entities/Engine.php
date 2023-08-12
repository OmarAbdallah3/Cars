<?php

namespace Modules\Car\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Engine extends Model
{
    use HasFactory;
    

    protected $fillable = ['engine_type','engine_name','engine_capacity','cylinder_num','acceleration','feul_capacity','traction_system','engine_location','max_speed','Horsepower','torque','avg_oil_consumption','fuel_type','gears_num','internal_combustion_engine','creation_date','description'];
    
    protected $casts = [
        'creation_date' => 'datetime',
    ]; 

    protected static function newFactory()
    {
        return \Modules\Car\Database\factories\EngineFactory::new();
    }

    public function cars() 
    {
        return $this->belongsToMany(Car::class);
    }
}
