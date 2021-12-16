<?php

namespace App\Http\Controllers\login;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;
class logincontroller extends Controller
{
    //
    function register()
    {
       return view('register');
    }
    function sendregistertodb(Request $req)
    {
        $user =new user;
        //$data=user::where('name',$user);
        $user->name=$req->name;
        $user->email=$req->email;
        
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect('login')->with('status','Registration was successfully.');
        
    }
    function login()
    {
        return view('login');
    }
    //sending login form
    function addlogin(Request $req)
    {
        $user = user::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return redirect('login')->with('status','user name or password incorrect');
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/')->with('status','You have login successfully');
        }
    }

    function logout()
    {
        
        Session::forget('user');
        return redirect('login');
    }
}
