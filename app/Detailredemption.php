<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detailredemption extends Model
{
  use SoftDeletes;
  protected $fillable = ['kilograms','subtotal'];
  protected $dates=['deleted_at'];

  public function recyclablematerial() {
    return $this->belongsTo('App\Recyclablematerial','recyclablematerial_id');
  }

  public function redeem() {
    return $this->belongsTo('App\Redeem','redeem_id');
  }
}
