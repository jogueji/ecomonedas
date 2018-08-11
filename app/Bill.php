<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
  use SoftDeletes;
  protected $fillable = ['total'];
  protected $dates=['deleted_at'];

  public function user() {
    return $this->belongsTo('App\User','user_id');
  }
  public function billingdetails() {
    return $this->hasMany('App\Billingdetail');
  }

}
