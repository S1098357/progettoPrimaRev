<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Promozione;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;

class filterController extends Controller
{
    //da aggiungere il button salva coupon
    public function filter(Request $request){
        $output = "";
        if ($request->ricercaAzienda!=''&& $request->ricercaParola==''){
            $filteredCoupons= DB::table('promozione')->join('aziendas', 'promozione.idAzienda', '=', 'aziendas.idAzienda')->where('nomeAzienda','Like','%'.$request->ricercaAzienda.'%')->get();
            foreach ($filteredCoupons as $filteredCoupon){
                $output.=
                    '<div class="promozione">
             <p>Nome Offerta: '.$filteredCoupon->nomePromozione.'</p>
             <p>Oggetto Offerta:'.$filteredCoupon->oggetto.'</p>
              <div class="sconto"><p id="scontistica"> Scontistica:' . $filteredCoupon->scontistica.' </p></div>
                    <div><p id="nomeAzienda"> Nome Azienda: '.$filteredCoupon->nomeAzienda.' </p></div>
            </div>';
            }
            return response($output);
        }
        if ($request->ricercaParola!='' && $request->ricercaAzienda==''){
            $filteredCoupons = Promozione::join('aziendas', 'promozione.idAzienda', '=', 'aziendas.idAzienda')->where('oggetto', 'Like', '%' . $request->ricercaParola . '%')->get();
            foreach ($filteredCoupons as $filteredCoupon) {
                $output .=
                    '<div class="promozione">
             <p>Nome Offerta: ' . $filteredCoupon->nomePromozione . '</p>
             <p>Oggetto Offerta:' . $filteredCoupon->oggetto . '</p>
              <div class="sconto"><p id="scontistica"> Scontistica:' . $filteredCoupon->scontistica.' </p></div>
                    <div><p id="nomeAzienda"> Nome Azienda: '.$filteredCoupon->nomeAzienda.' </p></div>
            </div>';
            }
            return response($output);
        }
        $listaCoupon=[];
        if ($request->ricercaParola && $request->ricercaAzienda) {
            $filteredCouponsbyName= DB::table('promozione')->join('aziendas', 'promozione.idAzienda', '=', 'aziendas.idAzienda')->where('nomeAzienda','Like','%'.$request->ricercaAzienda.'%')->get();
            $filteredCouponsbyWords = Promozione::where('oggetto', 'Like', '%' . $request->ricercaParola . '%')->get();
            foreach ($filteredCouponsbyWords as $filteredCouponbyWords) {
                foreach ($filteredCouponsbyName as $filteredCouponbyName){
                    if ($filteredCouponbyName->idPromozione==$filteredCouponbyWords->idPromozione){
                        array_push($listaCoupon,$filteredCouponbyName);
                    }
                }
            }
            foreach ($listaCoupon as $coupon){
                $output .=
                    '<div class="promozione">
                   <p>Nome Offerta: ' . $coupon->nomePromozione . '</p>
                   <p>Oggetto Offerta:' . $coupon->oggetto . '</p>
                   <div class="sconto"><p id="scontistica"> Scontistica:' . $coupon->scontistica.' </p></div>
                    <div><p id="nomeAzienda"> Nome Azienda: '.$coupon->nomeAzienda.' </p></div>
                </div>';
            }
        }

        return response($output);
    }


    public function filtriVecchi(Request $request)
    {
        if ($request->ricercaAzienda != '' && $request->ricercaParola == '') {
            $filteredCoupons = DB::table('promozione')->join('aziendas', 'promozione.idAzienda', '=', 'aziendas.idAzienda')->where('nomeAzienda', 'Like', '%' . $request->ricercaAzienda . '%')->get();
            $listaPromozioni = $filteredCoupons;
        }
        if ($request->ricercaParola != '' && $request->ricercaAzienda == '') {
            $filteredCoupons = Promozione::join('aziendas', 'promozione.idAzienda', '=', 'aziendas.idAzienda')->where('oggetto', 'Like', '%' . $request->ricercaParola . '%')->get();
            $listaPromozioni = $filteredCoupons;
        }
        $listaCoupon = [];
        if ($request->ricercaParola && $request->ricercaAzienda) {
            $filteredCouponsbyName = DB::table('promozione')->join('aziendas', 'promozione.idAzienda', '=', 'aziendas.idAzienda')->where('nomeAzienda', 'Like', '%' . $request->ricercaAzienda . '%')->get();
            $filteredCouponsbyWords = Promozione::where('oggetto', 'Like', '%' . $request->ricercaParola . '%')->get();
            foreach ($filteredCouponsbyWords as $filteredCouponbyWords) {
                foreach ($filteredCouponsbyName as $filteredCouponbyName) {
                    if ($filteredCouponbyName->idPromozione == $filteredCouponbyWords->idPromozione) {
                        array_push($listaCoupon, $filteredCouponbyName);
                    }
                }
            }
            $listaPromozioni = $listaCoupon;
        }
        if ($request->ricercaAzienda == '' && $request->ricercaParola == '') {
            $listaPromozioni=DB::table('promozione')->join('aziendas', 'promozione.idAzienda', '=', 'aziendas.idAzienda')->get();
        }
        return view('CRUDPromozioni/listaPromozioni', ['listaPromozioni' => $listaPromozioni]);
    }
}
