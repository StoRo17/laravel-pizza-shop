<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Image;
use Session;

class UserController extends Controller
{
    public function show(User $user)
    {   
        $orders = auth()->user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        $orders = $orders->sortByDesc(function($order) {
            return $order->created_at;
        });
        // dd($orders['0']->created_at);
        return view('user.profile')->with([
            'user' => $user->find(auth()->user()->id),
            'orders' => $orders
            ]);
    }
    
    /**
     * Update user profile
     * @param  Request $request 
     * @return Responce $response
     */ 
    public function updateProfile(Request $request)
    {   
        $user = auth()->user();

        // Check if something has changed
        if ($request['name'] == $user->name && $request['email'] == $user->email &&
            $request['phone_number'] == $user->phone_number && $request['address'] == $user->address)
        {
            return response()->json([
                'message' => 'Nothing`s changed',
            ]);
        }

        $this->validate($request, [
            'name' => 'required|max:40|min:6',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone_number' => ['required', 'unique:users,phone_number,'.$user->id, 'regex:/^(\+7|8)[0-9]{10}$/'],
        ]);

        // Change first 8 to +7 dor db
        if ($request['phone_number'][0] == '8') {
            $request['phone_number'] = preg_replace('/8/', '+7', $request['phone_number'], 1);
        }
        
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'address' => $request['address'],
        ]);

        Session::flash('success_message', 'Ваши данные были успешно обновлены!');

        return response()->json([
            'success' => 'Данные были успешно обновлены',
        ]);
    }
    /**
     * Update user avatar
     * @param  Request $request 
     * @return void           
     */
    public function updateAvatar(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, ['avatar' => 'image']);

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $imageName = str_random(12) . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(400, 400)->save(public_path('images/uploads/avatars/' . $imageName));

            $user->update(['avatar' => $imageName]);
        }

        return redirect('/user/profile')->with('success_message', 'Аватар успешно обновлён!');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        if (Hash::check($request['old_password'], $user->password)) {
            if ($request['new_password'] == $request['new_password_confirmation']) {
                $this->validate($request, [
                    'new_password' => 'required|min:8',
                    'new_password_confirmation' => 'required|min:8',
                ]);
                
                if ($request['new_password'] != $request['old_password']) {
                    $user->update(['password' => bcrypt($request['new_password'])]);
                    Session::flash('success_message', 'Ваш пароль был успешно изменён!');

                    return response()->json(['success' => 'Пароль был успешно изменён']);
                } else {
                    return response()->json(['newPasswordError' => Lang::get('passwords.same')], 401);
                }
            } else {
                return response()->json(['newPasswordError' => Lang::get('passwords.password')], 401);
            }
        } else {
            return response()->json(['oldPasswordError' => Lang::get('passwords.oldWrong'), 401]);
        }
    }
}
