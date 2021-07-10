<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_id == 2) return view('users.user-dashboard');
        elseif (auth()->user()->role_id == 3) return view('users.developer-dashboard');
        else return redirect('/admin');
    }

    public function edit()
    {
        return view('users.user-settings', [
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateUserRequest $request)
    {
        $userId = auth()->id();
        $user = User::find($userId);
        $data = $request->only([
            'full_name', 'phone', 'email'
        ]);
        $user->update($data);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.dashboard');
    }
}
