<?php

namespace Modules\Car\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CarInstallment\Entities\CarInstallment;
use Modules\CarInsurance\Entities\CarInsurance;
use Modules\CarMaintenance\Entities\CarMaintenance;
use Modules\Evaluation\Entities\Evaluation;
use Modules\Post\Entities\Post;
use Modules\Price\Entities\Price;
use Modules\Review\Entities\Review;
use Modules\User\Entities\User;
use Modules\Car\Entities\CarModel;
use Modules\Car\Entities\Specification;
use Modules\Dealer\Entities\Dealer;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Symfony\Component\CssSelector\Node\Specificity;

class Car extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable = ['car_name','car_brand','transmission','car_condition','mileage','registration','color'];

    protected $casts = [
        'registration' => 'datetime',
    ]; 
    
    protected static function newFactory()
    {
        return \Modules\Car\Database\factories\CarFactory::new();
    }

    public function accessories() 
    {
        return $this->belongsToMany(Accessory::class,'car_accessory');
    }

    public function engines() 
    {
        return $this->hasMany(Engine::class);
    }

    public function specifications() 
    {
        return $this->belongsToMany(Specification::class,'car_specification');
    }

    public function carModels() 
    {
        return $this->hasMany(CarModel::class);
    }

    public function installments() 
    {
        return $this->hasOne(CarInstallment::class);
    }

    public function carInsurance() 
    {
        return $this->hasOne(CarInsurance::class);
    }

    public function evaluation() 
    {
        return $this->hasOne(Evaluation::class);
    }

    public function price() 
    {
        return $this->hasOne(Price::class);
    }

    public function posts() 
    {
        return $this->hasMany(Post::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    public function carMaintenance() 
    {
        return $this->hasMany(CarMaintenance::class);
    }

    public function dealers() 
    {
        return $this->hasMany(Dealer::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }
}
