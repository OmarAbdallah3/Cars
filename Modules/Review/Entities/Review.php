<?php

namespace Modules\Review\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Nova\Actions\Actionable;
use Modules\Car\Entities\Car;
use Modules\User\Entities\User;

class Review extends Model
{
    use HasFactory , Actionable;

    protected $fillable = ['comment','rate'];
    
    protected static function newFactory()
    {
        return \Modules\Review\Database\factories\ReviewFactory::new();
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
