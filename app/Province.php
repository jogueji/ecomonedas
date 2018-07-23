<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
  use SoftDeletes;
  protected $fillable = ['description'];

  public function colletioncenters() {
    return $this->hasMany('App\Collectioncenter');
  }
}
