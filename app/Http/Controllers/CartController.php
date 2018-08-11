<?php

namespace App\Http\Controllers;

use App\Recyclablematerial;
use App\Wallet;
use Auth;
use Gate;
use DB;
use PDF;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function getCart(){
    $user=Auth::user();
    $wallet = Wallet::where('user_id',$user->id)->first();
    return view('client.wallet',['wallet'=>$wallet, 'user'=>$user]);
  }


}
