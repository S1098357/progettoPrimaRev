<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;

class filterController extends Controller
{

    public function filtri()
    {
        $promozioni=DB::Table('coupons')->get();
        $listaPromozioni=[];
        foreach ($promozioni as $promozione){
            $dataScadenza=new DateTime($promozione->dataScadenza);
            $dataOdierna= new DateTime(date("Y-m-d"));

            if($dataOdierna<=$dataScadenza){
                array_push($listaPromozioni, $promozione);
            }
        }
        return view('catalogo', ['listaPromozioni'=>$listaPromozioni]);
    }


    public function filtriPost(Request $request)
    {
        $request->validate([
            'ricercaParola',
            'ricercaAzienda'
        ]);

        $ricercaP['ricercaParola'] = $request->ricercaParola;
        $ricercaA['ricercaAzienda'] = $request->ricercaAzienda;

        // $azienda=$request->only('idAzienda');
        $info = Coupon::all();
        $infoAzienda = Coupon::where('idAzienda', $ricercaA)->get();

        $couponPassati = [];

        if ($ricercaP['ricercaParola'] != '' and sizeof($infoAzienda) != 0) {
            for ($i = 0; $i <= sizeof($infoAzienda) - 1; $i++) {
                if (str_contains($infoAzienda[$i]['oggetto'], $ricercaP['ricercaParola'])) {
                    array_push($couponPassati, $infoAzienda[$i]);
                }
            }
        } elseif ($ricercaP['ricercaParola'] != '' and sizeof($infoAzienda) == 0) {
            for ($i = 0; $i <= sizeof($info) - 1; $i++) {
                if (str_contains($info[$i]['oggetto'], $ricercaP['ricercaParola'])) {
                    array_push($couponPassati, $info[$i]);
                }
            }
        } elseif ($ricercaP['ricercaParola'] == '' and sizeof($infoAzienda) != 0) {
            for ($i = 0; $i <= sizeof($infoAzienda) - 1; $i++) {
                array_push($couponPassati, $infoAzienda[$i]);
            }
        }

        if (sizeof($couponPassati) == 0) {
            return redirect(route('catalogo'))->with("Errore", "ERRORE, LA RICERCA EFFETTUATA NON HA PRODOTTO RISULTATI VALIDI");
        } else {
            return redirect()->intended(route('catalogo'))->with('couponPassati', $couponPassati);
        }
    }

        public function filter(Request $request){
        $output="";
        if ($request->ricercaAzienda!='')
        {
            $filteredCoupons= Coupon::where('idAzienda','Like','%'.$request->ricercaAzienda.'%')->get();
            foreach ($filteredCoupons as $filteredCoupon){
                $output.=
                    '<div class="promozione">
             <p>Nome Offerta: '.$filteredCoupon->idAzienda.'</p>
             <p>Oggetto Offerta:'.$filteredCoupon->oggetto.'</p>
            </div>';
            }
            return response($output);
        }else{
            $output='<div class="promozione"></div>';
            return response($output);
        }

    }



        public function filter2(Request $request){

        $output="";
        if ($request->ricercaParola!='') {
            $filteredCoupons = Coupon::where('oggetto', 'Like', '%' . $request->ricercaParola . '%')->get();
            foreach ($filteredCoupons as $filteredCoupon) {
                $output .=
                    '<div class="promozione">
             <p>Nome Offerta: ' . $filteredCoupon->idAzienda . '</p>
             <p>Oggetto Offerta:' . $filteredCoupon->oggetto . '</p>
            </div>';
            }
            return response($output);
        }else{
            $output='<div class="promozione"></div>';
            return response(null);
        }
    }


        public function filter3(Request $request){
        $output = "";
        if ($request->ricercaAzienda!=''&& $request->ricercaParola==''){
            $filteredCoupons= Coupon::where('idAzienda','Like','%'.$request->ricercaAzienda.'%')->get();
            foreach ($filteredCoupons as $filteredCoupon){
                $output.=
                    '<div class="promozione">
             <p>Nome Offerta: '.$filteredCoupon->idAzienda.'</p>
             <p>Oggetto Offerta:'.$filteredCoupon->oggetto.'</p>
            </div>';
            }
            return response($output);
        }
        if ($request->ricercaParola!=''&&$request->ricercaAzienda==''){
            $filteredCoupons = Coupon::where('oggetto', 'Like', '%' . $request->ricercaParola . '%')->get();
            foreach ($filteredCoupons as $filteredCoupon) {
                $output .=
                    '<div class="promozione">
             <p>Nome Offerta: ' . $filteredCoupon->idAzienda . '</p>
             <p>Oggetto Offerta:' . $filteredCoupon->oggetto . '</p>
            </div>';
            }
            return response($output);
        }
        $listaCoupon=[];
        if ($request->ricercaParola && $request->ricercaAzienda) {
            $filteredCouponsbyName = Coupon::where('idAzienda', 'Like', '%' . $request->ricercaAzienda . '%')->get();
            $filteredCouponsbyWords = Coupon::where('oggetto', 'Like', '%' . $request->ricercaParola . '%')->get();
            foreach ($filteredCouponsbyWords as $filteredCouponbyWords) {
                foreach ($filteredCouponsbyName as $filteredCouponbyName){
                    if ($filteredCouponbyName==$filteredCouponbyWords){
                        array_push($listaCoupon,$filteredCouponbyName);
                    }
                }
                foreach ($listaCoupon as $coupon){
                    $output .=
                        '<div class="promozione">
                    <p>Nome Offerta: ' . $coupon->idAzienda . '</p>
                    <p>Oggetto Offerta:' . $coupon->oggetto . '</p>
                 </div>';
                }
            }
        }
            return response($output);
        }
}
