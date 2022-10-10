<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use mysql_xdevapi\Exception;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
    public function loginProcess(Request $req){

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

        return redirect('/')->with('success','You have logged successful.');

    }
    public function store(Request $request){

            $attributes = $request->validate([
                'name'          => 'required|max:255',
                'username'      => 'required|max:255|min:2|unique:users,username',
                'email'         => 'required|email|max:255|min:3|unique:users,email',
                'password'      => 'required|max:255|min:2',
            ]);
            $attributes['password'] = Hash::make($attributes['password']);
            User::create($attributes);

           // session()->flash('success', 'Your account has been created.');
            return redirect('/')->with('success','Your account has been created.');

    }

}
