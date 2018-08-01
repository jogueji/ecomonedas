<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes;
    protected $fillable=['totaleco'];
    protected $fillable=['totalcoupon'];
    protected $fillable=['total'];
    protected $dates=['deleted_at'];

    public function user() {
      return $this->belongsTo('App\User');
    }
}
