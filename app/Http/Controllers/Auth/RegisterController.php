<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'lastname1' => 'required|string|min:3',
            'phone' => 'required|string|min:9|max:9',
            'address' => 'required|string',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user=new \App\User([
            'email' => $data['email'],
            'name' => $data['name'],
            'lastname'=> $data['lastname'],
            'lastname1'=> $data['lastname1'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
        $user->rol()->associate(\App\Rol::find(3));
        $user->save();
        $wallet=new Wallet([
          'totaleco'=>0,
          'totalcoupon'=>0,
          'total'=>0
        ]);
        $wallet->user()->associate($user);
        $wallet->save();
        return $user;
    }
}
