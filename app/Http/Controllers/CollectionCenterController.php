<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Collectioncenter;
use App\Province;
use App\Redeem;
use Auth;
use Gate;
use DB;
use Carbon\Carbon;
use App\Charts\Graficos;
use Illuminate\Session\Store;

class CollectionCenterController extends Controller
{
  public function getAdminIndex(Request $request){
    $fechaInicial= Carbon::now()->subMonths(1)->toDateString();
    $fechaIni = new Carbon( $request->input('fechaInicial'));
    $fechaFin = new Carbon( $request->input('fechaFinal'));
      $chart = new Graficos();
      $centers = Collectioncenter::orderBy('name', 'asc')->whereBetween('created_at',array($fechaIni,$fechaFin))->get();
      $chart->labels($centers->pluck('name'));
      $title="Ecomonedas generadas";
      $redeems =Redeem::all();
      $totals=[];
      foreach($centers as $item){
        if($redeems->Where('collectioncenter_id',$item->collectioncenter_id)!=null)
            $totals[]=$item->redeems->sum('total');
        else
          $totals[]=0;
      }
      $chart->labels($centers->pluck('name'));
      $dataset=$chart->dataset($title,'bar',$totals);
      $dataset->backgroundColor(['#a9cce3', ' #a9dfbf', '#fad7a0','#c39bd3','#f9e79f','#a3e4d7', '#fadbd8', '#e59866']);
      $dataset->color(['#2980b9', '#52be80', '#f0b27a','#7d3c98', '#f4d03f','#48c9b0','#f1948a','#d35400']);
      $centers = Collectioncenter::orderBy('created_at', 'desc')->paginate(4);
      return view('admin.collectioncenter.index',['centers'=>$centers,'chart' => $chart,  'fechaInicial'=>$fechaInicial]);
    }

  public function getCenter($id)
  {
    $center = Collectioncenter::where('id', $id)->first();
    return view('public.collectioncenter.detalle', ['center' => $center]);
  }

  public function getIndex(/*Store $session*/){
    $centers=Collectioncenter::orderBy('name','asc');
    /*if(Gate::denies('see-all-vj')){
        $listado = $listado->where('user_id',auth()->user()->id);
      }*/
    $centers=$centers->paginate(4);
    return view('public.collectioncenter.index',['centers'=>$centers]);
  }
  public function getCreate(){
    $provinces=Province::All();
    return view('admin.collectioncenter.create',['provinces'=>$provinces]);
  }

  public function setCreate(Request $request)
  {
    $this->validate($request, [
        'name' => 'required|min:3',
        'direction' => 'required|min:10',
        'imagen'=> 'required|image',
        'province'=>'required'
    ]);
    $imagePath = $request->file('imagen')->store('images','public');//guarda la imagen y devuelve la ruta
    /*$image = \Image::make(\Storage::get($imagePath))->resize(320,240)->encode();//recodifica la imagen
    \Storage::put($imagePath,$image);//guarda la imagen recodificada*/
    $center=new Collectioncenter([
                    'name' => $request->input('name'),
                    'direction' => $request->input('direction'),
                    'imagen' => $imagePath,
                    'enabled'=>$request->input('enabled')=='on'
                  ]);
    $province= Province::find($request->input('province'));
    $center->province()->associate($province);
    $center->save();
    return redirect()->route('adminCenter.index')->with('message', 'Centro de acopio: '.$request->input('name').' creado');
  }
  public function getEdit($id){
    $center= Collectioncenter::find($id);
    $provinces=Province::All();
    return view('admin.collectioncenter.edit',['center'=>$center],['provinces'=>$provinces]);
  }

  public function update(Request $request)
  {
    $center=Collectioncenter::find($request->input('id'));
    $this->validate($request, [
        'name' => 'required',
        'direction' => 'required',
        'province'=>'required'
    ]);
    if(!$request->file('imagen')===null||!$request->file('imagen')==""){
      Storage::disk('public')->delete($center->image);
      $center->image=$request->file('imagen')->store('images','public');
    }
    $center->name= $request->input('name');
    $center->province_id=$request->get('province');
    $center->direction= $request->input('direction');
    $center->enabled=$request->input('enabled')=='on';
    $center->save();
    return redirect()->route('adminCenter.index')->with('message', 'Centro de acopio: '.$request->input('name').' editado');
  }

  public function delete($id){
    $center = Collectioncenter::find($id);
    Storage::disk('public')->delete($center->imagen);
    $center->delete();
    return redirect()->route('adminCenter.index')->with('message', 'Centro de acopio eliminado');
  }
}
