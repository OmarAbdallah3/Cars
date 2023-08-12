<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Action extends Model
{
    use HasFactory;

    protected $fillable = ['publish_date','created_by','end_date'];
    
    protected static function newFactory()
    {
        return \Modules\User\Database\factories\ActionFactory::new();
    }

    public function users() 
    {
        return $this->belongsTo(User::class);
    }
}
