<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billingdetail extends Model
{
  use SoftDeletes;
  protected $fillable = ['quantity','subtotal'];
  protected $dates=['deleted_at'];

  public function coupon() {
    return $this->belongsTo('App\Coupon','coupon_id');
  }

  public function bill() {
    return $this->belongsTo('App\Bill','bill_id');
  }
}
