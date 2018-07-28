<?php

namespace App\Http\Controllers;
use Illuminate\Session\Store;
use App\Recyclablematerial;
use Auth;
use Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RecyclableMaterialController extends Controller
{
  public function getIndex(/*Store $session*/){
    $list=Recyclablematerial::orderBy('name','asc');
    /*if(Gate::denies('see-all-vj')){
        $listado = $listado->where('user_id',auth()->user()->id);
      }*/
      $list=$list->paginate(10);
      return view('admin.material.index',['materials'=>$list]);
  }

  public function getEdit( Recyclablematerial $vj){
      $material= Recyclablematerial::find($material->id);
      return view('admin.material.edit',['vj'=>$oVideojuego,'plataformas'=>$plataformas]);
  }

  public function getCreate(){
      return view('admin.material.create');
  }

  public function getAdminDelete($id){
      $oVideojuego = Videojuego::find($id);
      return view('admin.borrar',['vj'=>$oVideojuego]);
  }
}
