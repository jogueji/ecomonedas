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
    $wallet = Wallet::where('user_id',$user->id)->first();
    $cart=collect(json_decode($wallet->cart,true));
    return view('client.cart',['cart'=>$cart]);
  }

  public function addCoupon($id){//recibir la cantidad?//antes de agregar al carrito comprobar cantidades
    $user=Auth::user();
    $wallet = Wallet::where('user_id',$user->id)->first();
    $cart=collect(json_decode($wallet->cart,true));
    $coupon=Coupon::find($id);
    if($cart->where(id,$id)->first()==null){
        /*if($coupon->stock>=$quantity){
          $coupon->quantity=$quantity;*/
        $cart->push($coupon);
    }
    else{
      //$cart->where(id,$id)->first()->quantity+=$quantity;
    }
    /*if($cart->where(id,$id)->first()->quantity){//validar que no supere el numero maximo de cantidades

    }*/
    $wallet->cart=$cart->toJson();
    return redirect()->route('public.coupon')->with('message', 'Cupon añadido al carrito');
  }

  public function deleteCoupon($id){
    $user=Auth::user();
    $wallet = Wallet::where('user_id',$user->id)->first();
    $cart=collect(json_decode($wallet->cart,true));
    $cart->pull($id);
    $wallet->cart=$cart->toJson();
    //return redirect()->route('public.coupon')->with('message', 'Cupon añadido al carrito');
  }
}
