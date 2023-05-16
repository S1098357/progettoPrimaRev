<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Session;

class loginController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    function loginPost(Request $request):RedirectResponse
    {
        $credential=$request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("Errore", "Login details are not valid");

    }

    function signupPost(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email'=>'required',
            'password' => 'required',
            'telefono' => 'required',
            'datadinascita' => 'required',
            'username' => 'required',
            'cognome' => 'required',
            'genere' => 'required'
        ]);

        $data['nome'] = $request->nome;
        $data['email']=$request->email;
        $data['password'] = Hash::make($request->password);
        $data['username'] = $request->username;
        $data['cognome'] = $request->cognome;
        $data['telefono'] = $request->telefono;
        $data['datadinascita'] = $request->datadinascita;
        $data['genere'] = $request->genere;
        $User = User::create($data);
        if (!$User) {
            return redirect(route('home'))->with("Errore", "Register details are not valid");
        }
        return redirect(route('login'));
    }

    function logout()
    {
        \Illuminate\Support\Facades\Session::flush();
        Auth::logout();
        return redirect(route('logout'));
    }

}
