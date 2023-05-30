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
        return view('catalogo');
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

    public function statistiche()
    {
        return view('statistiche');
    }

    public function listaStaff()
    {
        return view('listaStaff');
    }

}
