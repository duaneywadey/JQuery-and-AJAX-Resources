<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register() {
        return view('register');
    }
    public function registersave(Request $request) {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password' => 'required|confirmed',
        ]);
        $user = User::create($data);
        if ($user) {
            return redirect()->route('login');
        }
    }
    public function login() {
        return view('login');
    }
    public function loginsave(Request $request) {
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('addcustomer')->with('message', 'Logged in successfully!');
        }
        else {
            return redirect()->route('login')->with('message', 'Wrong password/email');
        }
    }
    public function logout() {
        Auth::logout();
        return view('login');
    }
    public function userprofile() {

        if (Auth::user()) {
            $users = User::all();
            $user_id = Auth::user()->id;
            return view('userprofile', ['users'=>$users, 'user_id'=>$user_id]);
        }
        else {
            return redirect()->route('login')->with('message', 'You must login first');
        }
    }
    public function edituserprofile(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $userEntity = new User();
        $data = $userEntity->find($request->id);

        if ($data) {
            $data->name = $request->name;
            $data->email = $request->email;
            $data->save();
            return redirect()->route('userprofile');
        }
    }
}
