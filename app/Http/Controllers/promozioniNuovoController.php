<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class promozioniNuovoController extends Controller
{
    public function listaPromozioni(){
        $promozioni=DB::Table('coupons')->get();
        $listaPromozioni=[];
        foreach ($promozioni as $promozione){
            $dataScadenza=new DateTime($promozione->dataScadenza);
            $dataOdierna= new DateTime(date("Y-m-d"));

            if($dataOdierna<=$dataScadenza){
                array_push($listaPromozioni, $promozione);
            }
        }
        return view('promozioni', ['listaPromozioni'=>$listaPromozioni]);
    }


    public function modificaPromozione(Request $request){
        $promozione=DB::Table('coupons')
            ->where('idCoupon', $request->idCoupon)->get();
        $option= 'edit';
        return view('promozioniDesigner', ['promozione'=>$promozione], ['option'=>$option]);
    }


    public function promozioneCreator(){
        return view('promozioniDesigner', ['option'=>'create']);
    }

    public function visualPromozione(Request $request){
        $info=DB::Table('coupons')
            ->where('idCoupon', $request->idCoupon)->get();
        return view('visualizzaPromozione',['info'=> $info]);
    }

    public function eliminaPromozione(Request $request){
        DB::delete('delete from coupons where idCoupon = ?',[$request->idCoupon]);
        return redirect(route('listaPromozioni'));
    }

    public function editPromozione(Request $request)
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
        $data['dataScadenza'] = $request->dataScadenza;

        Coupon::where('idCoupon',$request->id)->update($data);
        return redirect(route('listaPromozioni'));
    }

    public function creaPromozione(Request $request)
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
        $data['dataScadenza'] = $request->dataScadenza;
        Coupon::create($data);

        return redirect(route('listaPromozioni'));

    }

}
