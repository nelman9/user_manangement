<?php

use Illuminate\Database\Seeder;
use illuminate\support\Facades\Harsh;
use App\User;
use App\Role;


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
        DB::table('roles_user')->truncate

        $adminRole=Role::where('name','admin')=>first();
        $authorRole=Role::where('name','author')=>first();
        $userRole=Role::where('name','user')=>first();

        $admin=User::create(['name' => 'administrator',
                             'email' => 'admin@com',
                             'password'=>Harsh::make('admin')]);

         $author=User::create(['name' => 'author',
                             'email' => 'author@com',
                             'password'=>Harsh::make('admin')]);

         $normal=User::create(['name' => 'user',
                             'email' => 'user@com',
                             'password'=>Harsh::make('admin')]);

         $admin->roles()->attach($adminRole);   
         $author->roles()->attach( $authorRole); 
         $normal->roles()->attach($userRole);         
    }
}
