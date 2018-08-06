<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Coupon;
use Auth;
use Gate;
use Illuminate\Session\Store;

class CouponController extends Controller
{
  public function getIndex(){
  $coupons = Coupon::orderBy('created_at', 'desc')->paginate(4);
  return view('public.coupon.index',['coupons'=>$coupons]);
}

public function getCoupon($id)
{
    $coupon = Coupon::where('id', $id)->first();
    return view('public.coupon.detail', ['coupon' => $coupon]);
}
public function getAdminIndex(/*Store $session*/){
  $coupons=Coupon::orderBy('name','asc');
  /*if(Gate::denies('see-all-vj')){
      $listado = $listado->where('user_id',auth()->user()->id);
    }*/
    $coupons=$coupons->paginate(10);
    return view('admin.coupon.index',['coupons'=>$coupons]);
}
public function getCreate(){
    return view('admin.coupon.create');
}

public function setCreate(Request $request)
{
    $this->validate($request, [
        'name' => 'required|min:3',
        'description' => 'required|min:10',
        'image'=> 'required|image',
        'cost'=>'required'
    ]);
    $imagePath = $request->file('image')->store('images','public');//guarda la imagen y devuelve la ruta
    /*$image = \Image::make(\Storage::get($imagePath))->resize(320,240)->encode();//recodifica la imagen
    \Storage::put($imagePath,$image);//guarda la imagen recodificada*/
    $center=new Coupon([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'image' => $imagePath,
                    'cost'=> $request->input('cost')
                  ]);

    $center->save();
    return redirect()->route('adminCoupon.index')->with('message', 'Cupon canjeable: '.$request->input('name').' creado');
}
public function getEdit($id){

    $coupon= Coupon::find($id);
    return view('admin.coupon.edit',['coupon'=>$coupon]);
}

public function update(Request $request)
{
    $coupon=Coupon::find($request->input('id'));
    $this->validate($request, [
        'name' => 'required',
        'description' => 'required',
        'cost'=>'required',

    ]);
    if(!$request->file('image')===null||!$request->file('image')==""){
      Storage::disk('public')->delete($coupon->image);
      $coupon->image=$request->file('image')->store('images','public');
    }
    $coupon->name= $request->input('name');
    $coupon->description=$request->input('description');
    $coupon->cost= $request->input('cost');
    $coupon->save();
    return redirect()->route('adminCoupon.index')->with('message', 'Cupon canjeable: '.$request->input('name').' editado');
}

public function delete($id){
  $center = Coupon::find($id);
  Storage::disk('public')->delete($coupon->image);
  $coupon->delete();
  return redirect()->route('adminCoupon.index')->with('message', 'Centro de acopio eliminado');
}






}
