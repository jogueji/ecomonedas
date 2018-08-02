<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Redeem extends Model
{
  use SoftDeletes;
  protected $fillable = ['total'];
  protected $dates=['deleted_at'];

  public function userClient() {
    return $this->belongsTo('App\User','userClient_id');
  }

  public function userAdmin() {
    return $this->belongsTo('App\User','userAdmin_id');
  }

  public function collectioncenter() {
    return $this->belongsTo('App\Collectioncenter','collectioncenter_id');
  }

  public function detailredemptions() {
    return $this->hasMany('App\Detailredemption');
  }
}
