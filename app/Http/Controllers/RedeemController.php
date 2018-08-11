<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Recyclablematerial;
use App\User;
use Auth;
use App\Redeem;
use App\Wallet;
use App\Detailredemption;
use Illuminate\Session\Store;

class RedeemController extends Controller
{
  public function getIndex(Store $session){
    $details = collect([1]);
    $session->put('id',1);
    $session->put('details',$details);//guarda en el arreglo en session
    $materials=Recyclablematerial::all();
    $users=User::where('rol_id', 3)->orderBy('email','asc')->get();
    if(count($users)==0){
      return redirect()->route('index')->with('message', 'No existen usuarios');
    }
    if(count($materials)==0){
      return redirect()->route('index')->with('message', 'No existen materiales');
    }
    return view('redeem.redeem',['users'=>$users,'materials'=>$materials,]);
  }

  public function addDetail(Store $session){
    $details= $session->get('details');
    $id=$session->get('id')+1;
    $details->push($id);
    $materials=Recyclablematerial::all();
    $session->put('details', $details);
    $session->put('id', $id);
    return response()->json(['materials'=>$materials,'id'=>$id]);
  }

  public function deleteDetail($id, Store $session){
    $details= $session->get('details');
    $details->pull($id);
    $session->put('details', $details);
    return response()->json($id);
  }

  public function redeem(Request $request,Store $session){
    $details= $session->get('details');//validaciones
    $this->validate($request, [
      'user' => 'required'
    ]);
    if(count($details)==0){
      $validator = Validator::make([], []);
      $validator->errors()->add('user','Asigne al menos un material a canjear');
      return redirect()->route('redeem.index')->withErrors($validator)->withInput();
    }
    foreach($details as $detail){
      $value='kg'.intval($detail);
      if($request[$value]==0){
        $validator = Validator::make([], []);
        $validator->errors()->add('user','Asigne un peso mayor a 0');
        return redirect()->route('redeem.index')->withErrors($validator)->withInput();
      }
    }

    $redeem=new Redeem(['total'=>0]);
    $userAdmin=Auth::user();
    $redeem->userAdmin()->associate($userAdmin);
    $redeem->collectioncenter_id=$userAdmin->collectioncenter_id;
    $redeem->userClient()->associate(User::find($request['user']));
    $redeem->save();

    $list=collect();
    foreach($details as $detail){
      $value='material'.intval($detail);
      $material=Recyclablematerial::find($request[$value]);
      $value='kg'.intval($detail);
      $kg=$request[$value];
      if($list->where('recyclablematerial_id',$material->id)->first()==null){
        $list->push(new Detailredemption([
          'subtotal'=>$kg*($material->price),
          'kilograms'=>$kg
        ]));
        $list->last()->recyclablematerial()->associate($material);
        $list->last()->redeem()->associate($redeem);
        $list->last()->save();
      }
      else{
        $list->where('recyclablematerial_id',$material->id)->first()->kilograms+=$kg;
        $list->where('recyclablematerial_id',$material->id)->first()->subtotal+=$kg*$material->price;
        $list->where('recyclablematerial_id',$material->id)->first()->save();
      }
      $redeem->total+=$list->last()->subtotal;
    }
    $redeem->save();//guarda el nuevo total
    $wallet=Wallet::where('user_id',$redeem->userclient_id)->first();
    $wallet->totaleco+=$redeem->total;
    $wallet->save();
    return redirect()->route('index')->with('message', 'Materiales canjeados');
  }

}
