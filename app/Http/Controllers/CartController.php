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

  public function addCoupon($id){
    $user=Auth::user();
    $wallet = Wallet::where('user_id',$user->id)->first();
    $cart=collect(json_decode($wallet->cart,true));
    $cart->push(Coupon::find($id));
    return view('public.cart',['cart'=>$cart]);
  }
}
