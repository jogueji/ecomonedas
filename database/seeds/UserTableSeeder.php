<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user= new \App\User([
        'email'=>'a@a.com',
        'name'=>'Admin',
        'lastname'=>'Guerrero',
        'lastname1'=>'Soto',
        'direction'=>'Donde el diablo perdio la chaqueta',
        'password'=>'123456',
        'phone'=>'2555-5555'
      ]);
      $user->rol()->associate(\App\Rol::find(1));
      $user->save();
    }
}
