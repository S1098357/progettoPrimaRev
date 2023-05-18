<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
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

    public function creaPromozione()
    {
        return view('creaPromozione');
    }

    public function creaPromozionePost(Request $request)
    {

        $request->validate([
            'idCoupon',
            'oggetto',
            'modalità',
            'scontistica',
            'luogoFruizione',
            'Azienda',
        ]);

        $data['idCoupon'] = $request->idCoupon;
        $data['oggetto'] = $request->oggetto;
        $data['modalità'] = $request->modalità;
        $data['scontistica'] = $request->scontistica;
        $data['luogoFruizione'] = $request->luogoFruizione;
        $data['idAzienda'] = $request->Azienda;
        $data['qrCode']='prova';
        $data['tempoFruizione']='2h';
        $Coupon= Coupon::create($data);

        return redirect(route('Promozioni'));



    }
}
