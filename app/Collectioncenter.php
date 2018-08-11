<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Collectioncenter extends Model
{
  use SoftDeletes;
  protected $fillable=['name','direction','imagen','enabled'];
  protected $dates=['deleted_at'];

  public function province() {
    return $this->belongsTo('App\Province','province_id');
  }

  public function users() {
    return $this->hasMany('App\User');
  }

  public function redeems() {
    return $this->hasMany('App\Redeem');
  }

}
