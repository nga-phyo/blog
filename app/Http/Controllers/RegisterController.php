<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;

        $user->email = $request->email;

        $user->password = bcrypt($request->password);

        $user->save();

        

        return redirect('login');
    }
}


