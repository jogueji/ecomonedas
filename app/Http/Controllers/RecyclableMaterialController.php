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
  public function getIndex(){
    $list=Recyclablematerial::orderBy('name','asc');
    $list=$list->paginate(10);
    return view('admin.material.index',['materials'=>$list]);
  }

  public function getEdit( Recyclablematerial $material){
      $material= Recyclablematerial::find($material->id);
      return view('admin.material.edit',['material'=>$material]);
  }

  public function getCreate(){
      return view('admin.material.create');
  }

  public function setCreate(Request $request)
  {
      $this->validate($request, [
          'name' => 'required|min:3',
          'price' => 'required|numeric',
          'image'=> 'required|image',
          'color'=>'unique:recyclablematerials'
      ]);
      $imagePath = $request->file('image')->store('images','public');//guarda la imagen y devuelve la ruta
      /*$image = \Image::make(\Storage::get($imagePath))->resize(320,240)->encode();//recodifica la imagen
      \Storage::put($imagePath,$image);//guarda la imagen recodificada*/
      $material=new RecyclableMaterial([
                      'name' => $request->input('name'),
                      'price' => $request->input('price'),
                      'image' => $imagePath,
                      'color'=>$request->input('color')
                    ]);
      $material->save();
      return redirect()->route('adminMaterial.index')->with('message', 'Material reciclable '.$request->input('nombre').' creado');
  }

  public function update(Request $request)
  {
      $material=Recyclablematerial::find($request->input('id'));
      $this->validate($request, [
          'name' => 'required|min:3',
          'price' => 'required|numeric',
          'color'=>'unique:recyclablematerials,color,'.$material->id
      ]);
      if(!$request->file('image')===null||!$request->file('image')==""){
        Storage::disk('public')->delete($material->image);
        $material->image=$request->file('image')->store('images','public');
      }
      $material->name= $request->input('name');
      $material->color= $request->input('color');
      $material->price= $request->input('price');
      $material->save();
      return redirect()->route('adminMaterial.index')->with('message', 'Material reciclable '.$request->input('nombre').' editado');
  }

  public function delete($id){
    $material = Recyclablematerial::find($id);
    Storage::disk('public')->delete($material->imagen);
    $material->delete();
    return redirect()->route('adminMaterial.index')->with('message', 'Material reciclable eliminado');
  }

  public function getList(){
    $list=Recyclablematerial::orderBy('name','asc');
    $list=$list->paginate(4);
    return view('public.recyclablematerial.index',['materials'=>$list]);
  }

  public function detail($id){
    $material=Recyclablematerial::find($id);
    return view('public.recyclablematerial.detail',['material'=>$material]);
  }
}
