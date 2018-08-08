<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Coupon;
use Auth;
use Gate;
use Illuminate\Session\Store;

class WalletController extends Controller
{
  public function getWallet(){
  $wallet = Wallet::orderBy('created_at', 'desc')->paginate(4);
  return view('logged.wallet',['wallet'=>$wallet]);
}
}
