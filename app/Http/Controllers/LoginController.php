<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataModelControllers;
class LoginController extends Controller
{
    public function login(Request $request){
        if($request->session()->get('username') === null)
        {   
            return view('login'); 
        }
        else {
            return redirect('/home');
        }
    }
    public function checkLoginCredentials(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');
        if($username==null || $password==null)
            return view('login');
        $user = new DataModelControllers\User($username);
        if($user->isPasswordValid($password))
        {   
            $request->session()->flush(); 
            $request->session()->push('username',$username);
            return redirect('/home');
        }
        else{
            return redirect('/login');
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}
