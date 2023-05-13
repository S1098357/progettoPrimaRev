<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class filterController extends Controller
{

    public function filtri()
    {
        return view('catalogo');
    }

    public function filtriPost(Request $request)
    {
        $request->validate([
            'ricercaParola',
            'ricercaAzienda'
        ]);

        /*$ricercaP['ricercaParola']=$request->ricercaParola;*/
        $ricercaA['ricercaAzienda']=$request->ricercaAzienda;

        $azienda=$request->only('idAzienda');
        $info=Coupon::where('idAzienda', $ricercaA)->get();

        if (sizeof($info)!=0){
            return redirect()-> intended(route('catalogo'));
        }
        return redirect(route('home'))->with("Errore", "L'azienda cercata non esiste");

    }


}
