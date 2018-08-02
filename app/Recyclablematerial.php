<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Recyclablematerial extends Model
{
  use SoftDeletes;
  protected $fillable = ['name','image','price','color'];
  protected $dates=['deleted_at'];

  public function detailredemptions() {
    return $this->hasMany('App\Detailredemption');
  }
}
