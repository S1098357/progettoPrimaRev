<?php

namespace App\Http\Controllers;

use App\Models\emissione_coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class couponController extends Controller
{
    public function salvaCoupon(Request $request){
        $data['idCoupon']=$request->id;
        $data['idUtente']=Auth::user()->id;
        $data['dataEmissione']=date('Y-m-d');
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        $data['codice']=$randomString;
        emissione_coupon::create($data);
        $listaId=DB::Table('emissione_coupon')
            ->where('idUtente', Auth::user()->id)->get();
        $Coupons=DB::Table('coupons')->where('idCoupon', $request->id)->get();
        $codice=null;
        foreach ($listaId as $coupon){
            if ($coupon->idCoupon==$request->id){
                $codice=$coupon->codice;
            }
        }
        $utenti=User::all();
        return view('couponSingolo',['promozione'=>$Coupons],['codice'=>$codice]);
    }
}
