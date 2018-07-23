<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collectioncenter extends Model
{
  use SoftDeletes;
  protected $fillable=['name','direction'];
  protected $dates=['deleted_at'];

  public function province() {
    return $this->belongsTo('App\Province');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }
}
