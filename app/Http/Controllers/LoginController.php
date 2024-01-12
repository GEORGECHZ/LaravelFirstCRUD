<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showRegistro()
    {
        return view('registro');
    }

    public function login(Request $request)
{
    $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    if (Auth::attempt(array($fieldType => $request->username, 'password' => $request->password))) {
        // Authentication passed...
        return redirect()->route('personas.index');
    } else {
        // Authentication failed...
        return back()->withErrors([
            'login_error' => 'Usuario o contraseña incorrectos',
        ]);
    }
}

    public function store(Request $request){
        $user = new User();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;

        $user->save();

        return redirect()->route('.welcome');
    }

}
