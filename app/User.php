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
        'name', 'email', 'password','lastname','lastname1','direction','phone'
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

    public function wallet() {
      return $this->hasOne('App\Wallet');
    }

    public function Recyclablematerials(){
      return $this->hasMany('App\Recyclablematerial');
    }

    public function collectioncenters(){
      return $this->hasMany('App\Collectioncenter');
    }

    public function coupons(){
      return $this->hasMany('App\Coupon');
    }

    /*public function hasAccess(array $permissions){
      foreach($this->rols as $rol){
        if($rol->hasAccess($permissions)){
          return true;
        }
      }
      return false;
    }*/
}
