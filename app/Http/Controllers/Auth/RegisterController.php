<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;


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
     * Create a new user instance after a valid registration.
     *
     * @param  Request $request
     * @return User
     */
    public function register(Request $request, User $user)
    {

        $this->validate($request, [
            'name' => 'required|max:40|min:6',
            'email' => 'required|email|max:255|unique:users',
            'phone_number' => ['required', 'unique:users', 'regex:/^(\+7|8)[0-9]{10}$/'],
            'password' => 'required|min:8|confirmed',
        ]);

        if ($request['phone_number'][0] == '8') {
           $request['phone_number'] = preg_replace('/8/', '+7', $request['phone_number'], 1);
        }
        
        $regUser = $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'password' => bcrypt($request['password']),
            'address' => $request['address'],
        ]);


        auth()->loginUsingId($regUser->id);

        Session::flash('success_message', 'Вы были успешно зарегистрированы!');

        return response()->json([
            'success' => 'Пользователь успешно зарегистрирован',
        ]);
    }
}
