<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function getLogin(){
        return view('login');
    }
    public function postLogin(Request $request){
        $arr =['username'=>$request->username,'password'=>$request->password];
        if(Auth::attempt($arr)){
            dd('Successfully logged in');
        }
        else{
            dd('Login failed');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }
 
}
