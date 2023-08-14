<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Admin::create([
        //     'first_name' => 'Omar ',
        //     'middle_name'=> 'Abdallah',
        //     'last_name' => 'Abdelmawgoud',
        //     'email' => 'admin1@admin.com',
        //     'password' => bcrypt(123456789),
        //     'is_admin'=>'true',
        //     'token'=>Str::uuid(Str::random(10)."admin1@admin1.com"),
        // ]);

        // $this->call("OthersTableSeeder");
    }
}
