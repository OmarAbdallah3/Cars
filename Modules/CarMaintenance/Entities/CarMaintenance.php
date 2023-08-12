<?php

namespace Modules\CarMaintenance\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Car\Entities\Car;
use Modules\User\Entities\User;

class CarMaintenance extends Model
{
    use HasFactory;

    protected $fillable = ['location','description'];
    
    protected static function newFactory()
    {
        return \Modules\CarMaintenance\Database\factories\CarMaintenanceFactory::new();
    }

    public function car() 
    {
        return $this->belongsTo(Car::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
