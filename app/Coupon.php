<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Coupon extends Model
{
  use SoftDeletes;
  protected $fillable=['name','description','cost','image','stock',];
  protected $dates=['deleted_at'];


}
