<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class promozioniController extends Controller
{
    public function promozioni()
    {
        return view('promozioni');
    }

    public function visualizzaPromozione()
    {
        return view('visualizzaPromozione');
    }


}
