<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Wallet;
use App\Bill;
use App\Billingdetail;
use Auth;
use Gate;
use View;
use Validator;
use Illuminate\Session\Store;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function getCart(){
    $user=Auth::user();
    $coupons=Coupon::all();
    $wallet = Wallet::where('user_id',$user->id)->first();
    $cart=collect(json_decode($wallet->cart,true));
    return view('client.cart',['cart'=>$cart,'coupons'=>$coupons,'residue'=>$wallet->totaleco]);
  }

  public function addCart(Request $request){//recibir la cantidad?//antes de agregar al carrito comprobar cantidades
    $id=$request->input('id');
    $user=Auth::user();
    $wallet = Wallet::where('user_id',$user->id)->first();
    $cart=collect(json_decode($wallet->cart,true));//lista de cupones
    if($cart->where('id',$id)->first()==null){
        $coupon=Coupon::find($id);
        $coupon->quantity=(int)($request->input('quantity'));
        $coupon->subtotal=$coupon->quantity*$coupon->cost;
        $cart->push($coupon);
    }
    else{
      $cart1=collect();
      foreach ($cart as $coupon) {
        if($coupon['id']!=$id)
          $cart1->push($coupon);
        else {
            $quantity=$cart->where('id',$id)->first()['quantity']+$request->input('quantity');
            $coupon=Coupon::find($id);
            $coupon->quantity=$quantity;
            $coupon->subtotal=$coupon->quantity*$coupon->cost;
            $cart1->push($coupon);
        }
      }
      $cart=$cart1;
    }
    $wallet->cart=$cart->toJson();
    $wallet->save();
    return redirect()->route('public.coupons')->with('message', 'Cupon añadido al carrito');
  }
  public function changeCart(Request $request){
    $coupons=Coupon::all();
    $wallet = Wallet::where('user_id',Auth::user()->id)->first();
    $cart=collect();
    $cart1=collect(json_decode($wallet->cart,true));
    foreach ($cart1 as $item) {
      if($item['id']==$request->input('id')){
        $coupon=Coupon::find($item['id']);
        $coupon->quantity=(int)$request->input('quantity');
        $coupon->subtotal=$coupon->quantity*$coupon->cost;
        $cart->push($coupon);
      }
      else
        $cart->push($item);
    }
    $wallet->cart=$cart->toJson();
    $wallet->save();
    $dinamic=View::make('client.dinamicPart',['cart'=>$cart,'coupons'=>$coupons,'residue'=>$wallet->totaleco])->render();
    return response()->json($dinamic);
  }

  public function deleteCoupon($id){
    $user=Auth::user();
    $coupons=Coupon::all();
    $wallet = Wallet::where('user_id',$user->id)->first();
    $cart=collect();
    $cart1=collect(json_decode($wallet->cart,true));
    foreach ($cart1 as $coupon) {
      if($coupon['id']!=$id)
        $cart->push($coupon);
    }
    $wallet->cart=$cart->toJson();
    $wallet->save();
    $dinamic=View::make('client.dinamicPart',['cart'=>$cart,'coupons'=>$coupons,'residue'=>$wallet->totaleco])->render();
    return response()->json($dinamic);
  }

  public function buy(){
    $wallet = Wallet::where('user_id',Auth::user()->id)->first();
    $cart=collect(json_decode($wallet->cart,true));
    $validator = Validator::make([], []);
    if($cart->sum('subtotal')>$wallet->totaleco){
      $validator->errors()->add('_token','No existe suficientes ecomonedas para el canje');
      return redirect()->route('client.cart')->withErrors($validator)->withInput();
    }
    foreach ($cart as $item) {//Antes de realizar cambios verificamos existencias
      $coupon=Coupon::find($item['id']);
      if($item['quantity']>$coupon->stock){
        $validator->errors()->add('_token','No hay suficientes cupones en stock');
        return redirect()->route('client.cart')->withErrors($validator)->withInput();
      }
    }
    $bill=new Bill(['total'=>$cart->sum('subtotal')]);
    $bill->user()->associate(Auth::user());
    $bill->save();
    $wallet->cart="";
    $wallet->totaleco-=$bill->total;
    $wallet->totalcoupon+=$bill->total;
    $wallet->save();
    foreach ($cart as $item) {
      $coupon=Coupon::find($item['id']);
      $billingDetail=new Billingdetail([
        'quantity'=>$item['quantity'],
        'subtotal'=>$item['subtotal']
      ]);
      $coupon->stock-=$item['quantity'];
      $coupon->save();
      $billingDetail->coupon()->associate($coupon);
      $billingDetail->bill()->associate($bill);
      $billingDetail->save();
    }
    return redirect()->route('cart.detail',['id' => $bill->id])->with('message', 'Cupones canjeados');//detalles
  }
}
