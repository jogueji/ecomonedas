<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Collectioncenter;
use App\Province;

class CollectionCenterController extends Controller
{
  public function getIndex(){
  $centers = Collectioncenter::orderBy('created_at', 'desc')->paginate(4);
  return view('collectioncenter.index',['centers'=>$centers]);
}

public function getCenter($id)
{
    $center = Collectioncenter::where('id', $id)->first();
    return view('collectioncenter.detalle', ['center' => $center]);
}
public function getAdminIndex(/*Store $session*/){
  $centers=Collectioncenter::orderBy('name','asc');
  /*if(Gate::denies('see-all-vj')){
      $listado = $listado->where('user_id',auth()->user()->id);
    }*/
    $centers=$centers->paginate(10);
    return view('admin.collectioncenter.index',['centers'=>$centers]);
}
public function getCreate(){
  $provinces=Province::All();
    return view('admin.collectioncenter.create',['provinces'=>$provinces]);
}

}
