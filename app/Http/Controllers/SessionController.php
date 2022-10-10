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
        if( auth())
            redirect('/');
        return view('sessions.login_form');
    }

    public  function createOld( Request $req){
        $email  = $req->email;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user =  User::where(['email'=> $email])->first();
        } else {
        $user = User::where(['username'=> $email])->first();
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
    public function create(Request $request){
        $email      = $request->email;
        $password   = $request->password;

        if (  filter_var($email, FILTER_VALIDATE_EMAIL) &&
            Auth()->attempt(['email' => $email, 'password' => $password]) ||
            Auth()->attempt(['username' => $email, 'password' => $password] )
        ){
            return redirect('/')->with('success', 'You have logged success');
        }
        return back()->withErrors(["password" => "Password incorrect."])->withInput();
    }
}
