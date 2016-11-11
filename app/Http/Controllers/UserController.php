<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function show($id)
    {
        $user =  User::findOrFail($id);

        return view();
    }
}
