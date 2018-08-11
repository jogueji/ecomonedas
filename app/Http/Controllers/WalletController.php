<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Wallet;
use Auth;
use Gate;
use DB;
use PDF;
use Illuminate\Session\Store;

class WalletController extends Controller
{
  public function getWallet(){
  $user=Auth::user();
  $wallet = Wallet::where('user_id',$user->id)->first();
  return view('client.wallet',['wallet'=>$wallet, 'user'=>$user]);
}


  public function PDFDownload($id){
      $wallet = Wallet::find($id);
      $user= Auth::user();
      $pdf=PDF::loadView('admin.wallet.pdf-wallet',compact('wallet'));
      return $pdf->download('estadoCuentaEcomonedas'.$id.'.pdf',['user'=>$user, 'wallet'=>$wallet]);


    }





}