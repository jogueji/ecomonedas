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
        'description'=>'Administrador',
        'permissions' => json_encode([
                            'management' => true
                          ])
      ]);
      $rol->save();
      $rol= new \App\Rol([
        'description'=>'Administrador de Centro de Acopio',
        'permissions' => json_encode([
                            'redeem' => true
                          ])
      ]);
      $rol->save();
      $rol= new \App\Rol([
        'description'=>'Cliente',
        'permissions' => json_encode([
                            'buy' => true
                          ])
      ]);
      $rol->save();
    }
}
