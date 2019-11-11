<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use UserM\User;
use UserM\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        user::truncate();
        DB::table('role_user')->truncate();

        $adminRole=Role::where('name','admin')->first();
        $authorRole=Role::where('name','author')->first();
        $userRole=Role::where('name','user')->first();

        $admin=User::create(['name' => 'admin',
                             'email' => 'admin@com',
                             'password' =>Hash::make('admin')]);

         $author=User::create(['name' => 'author',
                             'email' => 'author@com',
                             'password'=>Hash::make('admin')]);

         $normal=User::create(['name' => 'user',
                             'email' => 'user@com',
                             'password'=>Hash::make('admin')]);

         $admin->roles()->attach($adminRole);   
         $author->roles()->attach( $authorRole); 
         $normal->roles()->attach($userRole);         
    }
}
