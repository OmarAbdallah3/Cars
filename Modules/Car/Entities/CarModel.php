<?php

namespace Modules\Car\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['title','year','category','description'];

    protected $casts = [
        'year' => 'datetime',
    ]; 
    
    protected static function newFactory()
    {
        return \Modules\Car\Database\factories\CarModelFactory::new();
    }

    public function cars() 
    {
        return $this->belongsToMany(Car::class);
    }

    public function carmake()
    {
        return $this->belongsTo(CarMake::class,'make_id');
    }
}
