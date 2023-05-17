<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
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

    function loginPost(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        /**
         * Redirezione su diverse Home Page in base alla classe d'utenza.
         */
//        return redirect()->intended(RouteServiceProvider::HOME);

        $role = auth()->user()->role;
        switch ($role) {
            case 'admin': return redirect()->route('admin');
                break;
            case 'user': return redirect()->route('home');
                break;
            default: return redirect('catalogo');
        }

    }

    public function destroy(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
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
        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        if (!$user) {
            return redirect(route('signup'))->with("Errore", "Register details are not valid");
        }
        return redirect(route('home'));

    }

    function logout(Request $request):RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }

}
