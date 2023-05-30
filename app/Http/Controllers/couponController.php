<?php

namespace App\Http\Controllers;

use App\Models\emissione_coupon;
use App\Models\emissioneCoupon;
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
        return redirect(route('catalogo'));
    }
}
