<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataModelControllers;
class RegisterController extends Controller
{
    public function register (Request $request){
        return view('register');
    }
    public function getUsername (Request $request){
       $username = $request->get('q');
       if($username==null){
           return "Choose your username.";
       }
       else{
        $user = new DataModelControllers\User($username);
        if($user->isUsernameAvailable()){
            return "$username is available.";    
        }
        else {
            return "$username is already taken.";
        }       
       } 
    }

    public function registerUser(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');
        $fullname = $request->get('fullname');
        if($username==null || $password==null)
            return redirect('register');
        $user = new DataModelControllers\User($username);
        if($user->create($fullname,$password))
        {   
            $request->session()->flush(); 
            $request->session()->push('username',$username);
            $request->session()->push('fullname',$fullname);
            return redirect('/home');
        }
        else{
            return redirect('/register');
        }
    }
}
