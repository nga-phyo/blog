<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
       $user =User::where('email',$request->email)->first();
       if(! $user){
           redirect('login');
       }

       $pp = [
           'email'=>$user->email,
           'password'=>$request->password,
       ];

       if(! Auth::attempt($pp)){
           
        return redirect('login');
       }
       
       return redirect('/works');

    }

       public function destroy()
       {
            Auth::logout();

            return redirect('login');
       }

       
   
}
