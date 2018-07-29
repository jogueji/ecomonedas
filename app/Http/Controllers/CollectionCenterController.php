<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Collectioncenter;

class CollectionCenterController extends Controller
{
  public function getIndex(){
  $centers = Collectioncenter::orderBy('created_at', 'desc')->paginate(2);
  return view('collectioncenter.index',['centers'=>$centers]);
}

public function getCenter($id)
{
    $center = Collectioncenter::where('id', $id)->first();
    return view('collectioncenter.detalle', ['cc' => $center]);
}


}
