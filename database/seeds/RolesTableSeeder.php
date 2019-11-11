<?php

use Illuminate\Database\Seeder;
use UserM\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::truncate();

    	Role::create(['name'=>'admin','admin' =>'administrator']);
    	Role::create(['name'=>' author','admin' =>'administrator']);
    	Role::create(['name' =>'user', 'admin' =>'administrator']);
    }
}
