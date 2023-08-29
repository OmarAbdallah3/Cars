<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class UserSeederTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Permission::create(['name' => 'edit',
        'name'=>'delete']);
        
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'restore']);
        Permission::create(['name' => 'forceDelete']);

        // create roles and assign existing permissions
        

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('create');
        $role2->givePermissionTo('update');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        


        // $this->call("OthersTableSeeder");
    }
}
