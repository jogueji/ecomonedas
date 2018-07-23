<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $rol= new \App\Rol([
        'description'=>'Administrador'
      ]);
      $rol->save();
      $rol= new \App\Rol([
        'description'=>'Administrador de Centro de Acopio'
      ]);
      $rol->save();
      $rol= new \App\Rol([
        'description'=>'Cliente'
      ]);
      $rol->save();
    }
}
