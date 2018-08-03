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
    return view('admin.coupon.detail', ['coupon' => $coupon]);
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
}
