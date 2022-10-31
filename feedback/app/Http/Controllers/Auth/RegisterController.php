<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        if($data['myreffer'] == 0) {
            return Validator::make($data, [
                'fname' => ['required', 'alpha', 'string', 'max:15'],
                'lname' => ['required', 'alpha', 'string', 'max:25'],
                'number' => ['required', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'refferal_code' => ['required', 'string' , 'max:6', 'unique:users'],
                'myreffer' => ['required' , 'max:5'],
                'password' => ['required', 'string', 'min:8'],
                'checkbox' => ['required'],
            ]);
        }else{
            return Validator::make($data, [
                'fname' => ['required', 'alpha', 'string', 'max:15'],
                'lname' => ['required', 'alpha', 'string', 'max:25'],
                'number' => ['required', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'refferal_code' => ['required', 'string' , 'max:6', 'unique:users'],
                'myreffer' => ['required' , 'max:6' , 'exists:users,refferal_code'],
                'password' => ['required', 'string', 'min:8'],
                'checkbox' => ['required'],
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
     return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'number' => $data['number'],
            'email' => $data['email'],
            'refferal_code' => $data['refferal_code'],
            'my_reffer' => $data['myreffer'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
