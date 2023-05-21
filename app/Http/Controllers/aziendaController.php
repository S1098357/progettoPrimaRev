<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aziendaController extends Controller
{
    public function listaAziende()
    {
        return view('listaAziende');
    }
}
