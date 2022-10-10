<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SessionController extends Controller
{
    //
    public  function logout(){
        if( auth() )
            auth()->logout();

        return redirect('/');
    }

    public  function loginForm(){
        return view('sessions.login_form');
    }
    public  function create( Request $req){
        $email  = $req->email;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user =  User::where(['email'=> $email])->first();
        } else {
    $user = User::where(['name'=> $email])->first();
    }
    if( ! $user){
        return back()->withErrors(["email" => "Email/Username no exists"])->withInput();
    }
    if( !$user || !Hash::check($req->password, $user->password )){
        return back()->withErrors(["password" => "Password incorrect."])->withInput();
    }

    $req->session()->put('user',$user);
    auth()->login($user);
    return redirect('/')->with('success','You have logged successful.');
    }
}
