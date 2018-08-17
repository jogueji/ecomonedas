<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Wallet;
use Auth;
use Gate;
use Illuminate\Session\Store;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function getCart(){
    $user=Auth::user();
    $coupons=Coupon::all();
    $wallet = Wallet::where('user_id',$user->id)->first();
    $cart=collect(json_decode($wallet->cart,true));
    return view('client.cart',['cart'=>$cart,'coupons'=>$coupons]);
  }

  public function addCart(Request $request){//recibir la cantidad?//antes de agregar al carrito comprobar cantidades
    $id=$request->input('id');
    $user=Auth::user();
    $wallet = Wallet::where('user_id',$user->id)->first();
    $cart=collect(json_decode($wallet->cart,true));//lista de cupones
    if($cart->where('id',$id)->first()==null){
        $coupon=Coupon::find($id);
        $coupon->quantity=(int)($request->input('quantity'));
        $cart->push($coupon);
    }
    else{
      $cart->where('id',$id)->first()['quantity']+=$request->input('quantity');
    }
    $wallet->cart=$cart->toJson();
    $wallet->save();
    return redirect()->route('public.coupons')->with('message', 'Cupon añadido al carrito');
  }

  public function deleteCoupon($id){
    $user=Auth::user();
    $wallet = Wallet::where('user_id',$user->id)->first();
    $cart=collect(json_decode($wallet->cart,true));
    $cart->pull($id);
    $wallet->cart=$cart->toJson();
    $wallet->save();
    return response()->json($id);
  }
}
