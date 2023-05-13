<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected $table="Utente";

    protected $fillable = [
        'Username', 'Password', 'Classe di Utenza',
        'Nome', 'Cognome',
        'Genere', 'dataNascita',
        'Telefono'
    ];

}
