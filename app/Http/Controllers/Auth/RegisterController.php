<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
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
            'name' => 'required|max:40',
            'email' => 'required|email|max:255|unique:users',
            'phone_number' => ['required', 'unique:users', 'regex:/^(\+7|8)[0-9]{10}$/'],
            'password' => 'required|min:8|confirmed',
        ]);

        $regUser = $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'password' => bcrypt($request['password']),
        ]);



        auth()->loginUsingId($regUser->id);

        return redirect('/')->with('success_message', 'Вы успешно зарегистрировались!');
    }
}
