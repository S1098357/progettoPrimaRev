<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class GestioneAziende extends Model
{
    protected $table ='GestioneAziende';

    protected  $fillable = [
        'Username',
        'idAzienda'
    ];

    public function riferimentoAziendale(){
        return $this->belongsTo('app\Models\Azienda', 'idAzienda');
    }

    public function riferimentoUtente(){
        return $this->belongsTo('app\Models\Utente', 'Username');
    }
}
