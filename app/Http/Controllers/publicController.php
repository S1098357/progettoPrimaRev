<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class publicController extends Controller{


    public function home(){
        return view('home');
    }


    public function test(){
        return view('test');
    }

    public function catalogo(){
        return view('catalogo');
    }

    public function info(){
        return view('info');
    }
    public function faq(){
        return view('faq');
    }

    public function profile(){
        return view('profile');
    }

    public function logout(){
        return view('home');
    }

    public function Promozioni(){
        return view('promozioni');
    }

    public function visualizzaPromozione()
    {
        return view('visualizzaPromozione');
    }

    public function couponSingolo()
    {
        return view('couponSingolo');
    }

    public function statistiche()
    {
        return view('statistiche');
    }

}
