<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes;
    protected $fillable=['residue'];
    protected $dates=['deleted_at'];

    public function user() {
      return $this->belongsTo('App\User');
    }
}
