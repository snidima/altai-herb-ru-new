<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function welcome( Request $request )
    {
        return view('profile',[
            'userName' => Auth::user()->name
        ]);
    }

    public function userInfo()
    {
        echo 'user info';
    }

}
