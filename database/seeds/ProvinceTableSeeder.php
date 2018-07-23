<?php

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $province= new \App\Province([
        'description'=>'San José'
      ]);
      $province->save();
      $province= new \App\Province([
        'description'=>'Alajuela'
      ]);
      $province->save();
      $province= new \App\Province([
        'description'=>'Cartago'
      ]);
      $province->save();
      $province= new \App\Province([
        'description'=>'Heredia'
      ]);
      $province->save();
      $province= new \App\Province([
        'description'=>'Guanacaste'
      ]);
      $province->save();
      $province= new \App\Province([
        'description'=>'Puntarenas'
      ]);
      $province->save();
      $province= new \App\Province([
        'description'=>'Limón'
      ]);
      $province->save();
    }
}
