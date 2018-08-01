<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Gate;
use Validator;
use App\User;
use App\Collectioncenter;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function getIndex(){
    $list=User::where('rol_id', '<>', 1)->orderBy('rol_id','asc');
    $list=$list->paginate(10);
    return view('admin.user.index',['users'=>$list]);
  }

  public function getCreate(){
    $list=Collectioncenter::all();
    return view('admin.user.create',['centers'=>$list]);
  }

  public function getEdit(User $user){
    $list=Collectioncenter::all();
    $user=User::find($user->id);
    return view('admin.user.edit',['user'=>$user,'centers'=>$list]);
  }

  public function setCreate(Request $request)
  {
      $this->validate($request, [
        'name' => 'required|string|min:3',
        'lastname' => 'required|string|min:3',
        'lastname1' => 'required|string|min:3',
        'phone' => 'required|string|min:9|max:9',
        'address' => 'required|string',
        'email' => 'required|string|email|max:50|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'center'=> 'required'
      ]);
      $user=new \App\User([
          'email' => $request['email'],
          'name' => $request['name'],
          'lastname'=> $request['lastname'],
          'lastname1'=> $request['lastname1'],
          'address' => $request['address'],
          'phone' => $request['phone'],
          'password' => Hash::make($request['password'])
      ]);
      $user->rol()->associate(\App\Rol::find(2));
      $center=Collectioncenter::find($request->input('center'));
      $user->collectioncenter()->associate($center);
      $user->save();
      return redirect()->route('adminUser.index')->with('message', 'Usuario '.$request->input('name').' creado');
  }

  public function update(Request $request,User $user)
  {
    $this->validate($request, [
      'name' => 'required|string|min:3',
      'lastname' => 'required|string|min:3',
      'lastname1' => 'required|string|min:3',
      'phone' => 'required|string|min:9|max:9',
      'address' => 'required|string'
    ]);
    $user->name= $request->input('name');
    $user->lastname= $request->input('lastname');
    $user->lastname1= $request->input('lastname1');
    $user->phone= $request->input('phone');
    $user->address= $request->input('address');
    $user->save();
    return redirect()->route($user->id==Auth::user()->id?'index':'adminUser.index')->with('message', 'Usuario modificado');
  }

  public function delete(User $user){
    $user->delete();
    return redirect()->route('adminUser.index')->with('message', 'Usuario eliminado');
  }

  public function detail($id){
    $user=User::find($id);
    return view('admin.user.detail',['user'=>$user]);
  }

  public function setPassword(Request $request){
    $user=Auth::user();
    if(!Hash::check($request->input('password'),$user->password)){
      $validator = Validator::make([], []);
      $validator->errors()->add('password', 'La contraseña es incorrecta');
      return redirect()->route('adminUser.password')->withErrors($validator)->withInput();
    }
    $this->validate($request, [
        'newPassword' => 'required|string|min:6|confirmed'
      ]);
    $user->password=Hash::make($request->input('newPassword'));
    $user->save();
    return redirect()->route('index')->with('message', 'Contraseña modificada');
  }

  public function setEmail(Request $request){
    $user=Auth::user();
    if(!Hash::check($request->input('password'),$user->password)){
      $validator = Validator::make([], []);
      $validator->errors()->add('password', 'La contraseña es incorrecta');
      return redirect()->route('adminUser.password')->withErrors($validator)->withInput();
    }
    $this->validate($request, [
        'email' => 'required|string|email|max:50|unique:users,email,'.$user->id
      ]);
    $user->email=$request->input('email');
    $user->save();
    return redirect()->route('index')->with('message', 'Correo modificado');
  }
}
