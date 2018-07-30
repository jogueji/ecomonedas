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

  public function hasAccess(array $permissions){
    foreach($permissions as $permission){
      if($this->hasPermission($permission)){
        return true;
      }
    }
    return false;
  }

  protected function hasPermission(string $permission){
    $permissions=json_decode($this->permissions,true);
    //return true;
    return $permissions[$permission]??false;
  }
}
