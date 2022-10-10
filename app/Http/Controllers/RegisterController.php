<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register');
    }
    public function store(Request $request){

            $attributes = $request->validate([
                'name'          => 'required|max:255',
                'username'      => 'required|max:255|min:3|unique:users,username',
                'email'         => 'required|email|max:255|min:3|unique:users,email',
                'password'      => 'required|max:255|min:6',
            ]);
            $attributes['password'] = Hash::make($attributes['password']);
            User::create($attributes);

//        $check = $this->validate($request, [
//            'name'          => 'required|max:255',
//                'username'      => 'required|max:255|min:3',
//                'email'         => 'required|email|max:255|min:3',
//                'password'      => 'required|max:255|min:2',
//        ]);
//        dd($check);
            return redirect('/');


    }
}
