<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('user.profile')->with('user', $user->find(auth()->user()->id));
    }

    public function updateProfile(Request $request)
    {

        $user = auth()->user();
        if ($request['name'] == $user->name && $request['email'] == $user->email &&
            $request['phone_number'] == $user->phone_number && $request['avatar'] == $user->avatar
        ){
            redirect('/user/profile');
        }

        $this->validate($request, [
            'name' => 'required|max:40|min:6',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone_number' => ['required', 'unique:users,phone_number,'.$user->id, 'regex:/^(\+7|8)[0-9]{10}$/'],
            'avatar' => 'image',
        ]);

        if ($request['phone_number'][0] == '8') {
            $request['phone_number'] = preg_replace('/8/', '+7', $request['phone_number'], 1);
        }

        $imageName = 'default.png';
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $imageName = str_random(12) . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(400, 400)->save(public_path('images/uploads/avatars/' . $imageName));
        }

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'avatar' => $imageName,
        ]);

        return redirect('/user/profile')->with('success_message', 'Ваши данные были успешно обновлены!');
    }
}
