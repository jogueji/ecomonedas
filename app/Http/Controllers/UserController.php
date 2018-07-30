<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Gate;
use Validator;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function getIndex(){
    $list=User::orderBy('name','asc');
    $list=$list->paginate(10);
    return view('admin.user.index',['users'=>$list]);
  }

  public function setCreate(Request $request)
  {
      $this->validate($request, [
        'name' => 'required|string|min:3',
        'lastname' => 'required|string|min:3',
        'lastname1' => 'required|string|min:3',
        'phone' => 'required|string|min:9',
        'address' => 'required|string',
        'email' => 'required|string|email|max:50|unique:users',
        'password' => 'required|string|min:6|confirmed'
      ]);
      $imagePath = $request->file('image')->store('images','public');//guarda la imagen y devuelve la ruta
      /*$image = \Image::make(\Storage::get($imagePath))->resize(320,240)->encode();//recodifica la imagen
      \Storage::put($imagePath,$image);//guarda la imagen recodificada*/
      $material=new RecyclableMaterial([
                      'name' => $request->input('name'),
                      'price' => $request->input('price'),
                      'image' => $imagePath,
                      'color'=>$request->input('color')
                    ]);
      $user=Auth::user();
      $material->user()->associate($user);
      $material->save();
      return redirect()->route('adminMaterial.index')->with('message', 'Material reciclable '.$request->input('nombre').' creado');
  }

  public function update(Request $request)
  {
    $user=Auth::user();
    $this->validate($request, [
      'name' => 'required|string|min:3',
      'lastname' => 'required|string|min:3',
      'lastname1' => 'required|string|min:3',
      'phone' => 'required|string|min:9',
      'address' => 'required|string',
      'email' => 'required|string|email|max:50|unique:users,email,'.$user->id
    ]);
    $user->name= $request->input('name');
    $user->lastname= $request->input('lastname');
    $user->lastname1= $request->input('lastname1');
    $user->phone= $request->input('phone');
    $user->address= $request->input('address');
    $user->email= $request->input('email');
    $user->save();
    return redirect()->route('index')->with('message', 'Datos modificados');
  }

  public function delete($id){
    $material = Recyclablematerial::find($id);
    Storage::disk('public')->delete($material->imagen);
    $material->delete();
    return redirect()->route('adminMaterial.index')->with('message', 'Material reciclable eliminado');
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
