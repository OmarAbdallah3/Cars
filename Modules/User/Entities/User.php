<?php

namespace Modules\User\Entities;

use Modules\Post\Entities\Post;
use Modules\Media\Entities\Media;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\CarNew\Entities\CarNew;
use Modules\Review\Entities\Review;
use Vyuldashev\NovaPermission\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Vyuldashev\NovaPermission\Permission;
use Spatie\Permission\Models\Role as ModelsRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Spatie\Permission\Models\Permission as ModelsPermission;

class User extends Authenticatable
{
    
    use HasFactory,Notifiable,HasRoles,Authorizable;

    protected $guard_name = 'web';

    protected $fillable = ['name','email','password','phone','address','gender','is_admin'];
    
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    public function cars() 
    {
        return $this->hasMany(Car::class);
    }

    public function posts() 
    {
        return $this->hasMany(Post::class);
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    public function actions() 
    {
        return $this->hasMany(Action::class);
    }

    public function carNews() 
    {
        return $this->hasMany(CarNew::class);
    }

    



    
}
