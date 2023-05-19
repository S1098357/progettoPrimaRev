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

    public function modificaPromozione()
    {
        return view('modificaPromozione');
    }

    public function modificaPromozionePost(Request $request)
    {
        $request->validate(['idCoupon']);
        $couponRichiesto=null;

        $data['idCoupon'] = $request->idCoupon;
        $info = Coupon::all();
        for ($i = 0; $i <= sizeof($info)-1; $i++) {
            if ($info[$i]['idCoupon']==$data['idCoupon']) {
                $couponRichiesto=$info[$i];
            }
        }

        return redirect()->intended(route('modificaPromozione'))->with('promozione', $couponRichiesto);
    }

    public function visualizzaPromozionePost(Request $request)
    {
        $request->validate(['idCoupon']);

        $data['idCoupon'] = $request->idCoupon;

        $info = Coupon::all();
        $couponRichiesto = $info[0];

        for ($i = 0; $i <= sizeof($info)-1; $i++) {
            if ($info[$i]['idCoupon']==$data['idCoupon']) {
                $couponRichiesto=$info[$i];
            }
        }

        return redirect()->intended(route('visualizzaPromozione'))->with('couponRichiesto', $couponRichiesto);
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
        $data['qrCode'] = 'prova';
        $data['tempoFruizione'] = '2h';
        $Coupon = Coupon::create($data);

        return redirect(route('Promozioni'));
    }


        public function modificaPromozioneFinale(Request $request)
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

        Coupon::destroy($data['idCoupon']);
        $Coupon= Coupon::create($data);

        return redirect(route('Promozioni'));
    }

    public function eliminaPromozione(Request $request)
    {

        $request->validate([
            'idCoupon'
        ]);

        $data['idCoupon'] = $request->idCoupon;

        Coupon::destroy($data['idCoupon']);

        return redirect(route('Promozioni'));
    }



}
