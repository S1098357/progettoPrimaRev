<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'Azienda';

    protected $fillable = [
        'id', 'ragioneSociale', 'localizzazione',
        'nomeAzienda', 'logo',
        'tipologia', 'descrizioneAzienda'
    ];
}
/*

  instradamento


 public function appartenenzaAzienda(){
        return $this->belongsTo('app\Models\Azienda', 'id');
    }
 */
