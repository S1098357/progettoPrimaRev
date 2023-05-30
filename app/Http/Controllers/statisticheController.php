<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class statisticheController extends Controller
{
    public function statistiche(){
        $utenti=DB::Table('users')
            ->where('role', 'user')->get();
        $promozioni=DB::Table('coupons')->get();
        $listaCoupon=DB::Table('emissione_coupon')->get();
        $lista=['listaPromozioni'=>$promozioni,
            'listaUtenti'=>$utenti,
            'listaCoupon'=>$listaCoupon];
        return view('statistiche')->with(['lista'=>$lista]);
    }
}
