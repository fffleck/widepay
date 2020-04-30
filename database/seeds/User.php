<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => "User",'email' => "email@email.com",'password' =>  Hash::make('senha')]);
    }
}
