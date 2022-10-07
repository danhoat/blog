<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    //
    function login(Request $req){
        $email  = $req->email;
        $user   = false;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user =  User::where(['email'=> $email])->first();
        } else {
            $user = User::where(['name'=> $email])->first();
        }


        if( !$user || !Hash::check($req->password, $user->password )){
            return 'Password incorrect.';
        }
        $req->session()->put('user',$user);

        return redirect('/');

    }
    static function list(){
        $numberItemPerpage = 6;
        $users = User::paginate($numberItemPerpage);
       
        return view('users',['users' => $users]);

    }
}
