<?php
namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\emissione_coupon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class publicController extends Controller{


    public function home(){
        return view('home');
    }


    public function test(){
        return view('test');
    }

    public function catalogo(){
        $promozioni=DB::Table('coupons')->get();
        $listaPromozioni=[];
        foreach ($promozioni as $promozione){
            $dataScadenza=new DateTime($promozione->dataScadenza);
            $dataOdierna= new DateTime(date("Y-m-d"));

            if($dataOdierna<=$dataScadenza){
                array_push($listaPromozioni, $promozione);
            }
        }
        if(Auth::check()) {
            $couponSalvati=DB::Table('emissione_coupon')->where('idUtente', Auth::user()->id)->get();
            foreach ($couponSalvati as $coupon) {
                for ($i = 0; $i <= sizeof($listaPromozioni) - 1; $i++) {
                    if ($coupon->idCoupon == $listaPromozioni[$i]->idCoupon) {
                        array_splice($listaPromozioni, $i, 1);
                    }
                }
            }
            return view('catalogo', ['listaPromozioni' => $listaPromozioni]);
        }else{
            return view('catalogo', ['listaPromozioni' => $listaPromozioni]);
        }
    }

    public function info(){
        return view('info');
    }
    public function faq(){
        return view('faq');
    }

    public function profile(){
        return view('profile');
    }

    public function logout(){
        return view('home');
    }

    public function Promozioni(){
        return view('promozioni');
    }

    public function visualizzaPromozione()
    {
        return view('visualizzaPromozione');
    }

    public function couponSingolo()
    {
        $listaId=DB::Table('emissione_coupon')
            ->where('idUtente', Auth::user()->id)->get();
        $tuttiCoupon=DB::Table('coupons')->get();
        $listaCoupon=[];
        $dataOdierna= new DateTime(date("Y-m-d"));
        $listaCodici=[];
        foreach ($listaId as $id){
            foreach ($tuttiCoupon as $coupon){
                $dataScadenza=new DateTime($coupon->dataScadenza);
                if($coupon->idCoupon==$id->idCoupon and $dataOdierna<=$dataScadenza){
                    array_push($listaCodici,$id->codice);
                    array_push($listaCoupon,$coupon);
                }
            }
    }
        return view('couponSingolo',['listaCoupon'=>$listaCoupon],['listaCodici'=>$listaCodici]);
    }

    public function listaStaff()
    {
        return view('listaStaff');
    }

}
