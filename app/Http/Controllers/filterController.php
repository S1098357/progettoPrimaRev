<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;

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

        $ricercaP['ricercaParola']= $request->ricercaParola;
        $ricercaA['ricercaAzienda'] = $request->ricercaAzienda;

        // $azienda=$request->only('idAzienda');
        $info = Coupon::all();
        $infoAzienda = Coupon::where('idAzienda', $ricercaA)->get();

        $couponPassati = [];

        if ($ricercaP['ricercaParola'] != '' and sizeof($infoAzienda) != 0) {
            for ($i = 0; $i <= sizeof($infoAzienda)-1; $i++) {
                if (str_contains($infoAzienda[$i]['oggetto'], $ricercaP['ricercaParola'])) {
                    array_push($couponPassati, $infoAzienda[$i]);
                }
            }
        }elseif ($ricercaP['ricercaParola'] != '' and sizeof($infoAzienda) == 0){
            for ($i = 0; $i <= sizeof($info)-1; $i++) {
                if (str_contains($info[$i]['oggetto'], $ricercaP['ricercaParola'])) {
                    array_push($couponPassati, $info[$i]);
                }
            }
        }elseif ($ricercaP['ricercaParola'] == '' and sizeof($infoAzienda) != 0){
            for ($i = 0; $i <= sizeof($infoAzienda)-1; $i++){
                array_push($couponPassati, $infoAzienda[$i]);
            }
        }

        if (sizeof($couponPassati) == 0) {
            return redirect(route('catalogo'))->with("Errore", "ERRORE, LA RICERCA EFFETTUATA NON HA PRODOTTO RISULTATI VALIDI");
        } else {
            return redirect()->intended(route('catalogo'))->with('couponPassati', $couponPassati);
        }
    }
}
