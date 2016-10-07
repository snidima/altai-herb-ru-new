<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{





    public function getLogin()
    {
        if (Auth::check()) return redirect(route('main'));
        return view('auth.login');
    }

    public function postLogin( Request $request )
    {
        $res = $this->validate($request, [
            'email' => 'required|max:250|email',
            'password' => 'required|min:6',
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
            return Redirect::intended('/');
        else
            return view('auth.login')->withErrors('Error logging in!');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::intended('/');
    }







    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister( Request $request )
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:100|min:2',
            'email' => 'required|unique:users|max:250|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect(route('main'));
    }

}