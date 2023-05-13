<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class emissioneCoupon extends Model
{
    protected $table = 'emissioneCoupon';

    protected $fillable = [
      'idCoupon', 'Username', 'dataEmissione'
    ];

    public function proprietario(){
        return $this->belongsTo('app\Models\Utente', 'Username');
    }

    public function couponRiferimento(){
        return $this->belongsTo('app\Models\Coupon', 'idCoupon');
    }
}
