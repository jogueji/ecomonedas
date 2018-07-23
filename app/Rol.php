<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  protected $fillable = [
      'description','permissions'
  ];
  public function users() {
    return $this->hasMany('App\User');
  }

  /*public function hasAccess(array $permissions){
    foreach($permissions as $permission){
      if($this->tienePermiso($permiso)){
        return true;
      }
    }
    return false;
  }

  protected function tienePermiso(string $permiso){
    $permisos=json_decode($this->permissions,true);
    return $permisos[$permiso]??false;
  }*/
}
