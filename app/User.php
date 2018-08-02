<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','lastname1','address','phone'
    ];
    protected $dates=['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol() {
      return $this->belongsTo('App\Rol');
    }

    public function collectioncenter() {
      return $this->belongsTo('App\Collectioncenter','collectioncenter_id');
    }

    public function wallet() {
      return $this->hasOne('App\Wallet');
    }

    public function redeems() {//usuario cliente
      return $this->hasMany('App\Redeem');
    }

    /*public function redeems() {//usuario admin
      return $this->hasMany('App\Redeem');
    }*/

    public function hasAccess(array $permissions){
      return $this->rol->hasAccess($permissions);
    }

    /*public function tieneRol($nombre){
        return $this ->roles()->where('name',$nombre)->count()==1;
    }*/
}
