<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function show()
    {
//      TODO: handle if fail
        $user =  User::findOrFail(Auth::user()->id);

        return view('user.profile')->with('user', $user);
    }
}
