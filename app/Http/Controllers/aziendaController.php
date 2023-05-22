<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use Illuminate\Http\Request;

class aziendaController extends Controller
{
    public function listaAziende()
    {
        return view('listaAziende');
    }

    public function modificaAzienda()
    {
        return view('modificaAzienda');
    }

    public function visualizzaAzienda()
    {
        return view('azienda');
    }

    public function creaAzienda()
    {
        return view('creaAzienda');
    }

    public function modificaAziendaPost(Request $request)
    {
        $request->validate(['id']);
        $azienda = null;

        $data['id'] = $request->id;
        $info = Azienda::all();
        for ($i = 0; $i <= sizeof($info) - 1; $i++) {
            if ($info[$i]['id'] == $data['id']) {
                $azienda = $info[$i];
            }
        }

        return redirect()->intended(route('modificaAzienda'))->with('azienda', $azienda);
    }

    public function visualizzaAziendaPost(Request $request)
    {
        $request->validate(['id']);

        $data['id'] = $request->id;

        $info = Azienda::all();
        $azienda = $info[0];

        for ($i = 0; $i <= sizeof($info)-1; $i++) {
            if ($info[$i]['id']==$data['id']) {
                $azienda=$info[$i];
            }
        }

        return redirect()->intended(route('visualizzaAzienda'))->with('azienda', $azienda);
    }

    public function listaAziendePost(Request $request)
    {
        $request->validate(['id']);

        $data['id'] = $request->id;

        $info = Azienda::all();
        $azienda = $info[0];

        for ($i = 0; $i <= sizeof($info) - 1; $i++) {
            if ($info[$i]['id'] == $data['id']) {
                $azienda = $info[$i];
            }
        }

        return redirect()->intended(route('listaAziende'))->with('$azienda', $azienda);
    }

    public function creaAziendaPost(Request $request)
    {

        $request->validate([
            'id',
            'ragioneSociale',
            'localizzazione',
            'nomeAzienda',
            'logo',
            'tipologia',
            'descrizioneAzienda',
        ]);

        $data['id'] = $request->id;
        $data['ragioneSociale'] = $request->ragioneSociale;
        $data['localizzazione'] = $request->localizzazione;
        $data['nomeAzienda'] = $request->nomeAzienda;
        $data['logo'] = $request->logo;
        $data['tipologia'] = $request->tipologia;
        $data['descrizioneAzienda'] = $request->descrizioneAzienda;
        $azienda = Azienda::create($data);

        return redirect(route('listaAziende'));

    }

public function modificaAziendaFinale(Request $request)
{

    $request->validate([
        'id',
        'ragioneSociale',
        'nomeAzienda',
        'localizzazione',
        'logo',
        'tipologia',
        'descrizioneAzienda',
    ]);

    $data['id'] = $request->id;
    $data['ragioneSociale'] = $request->ragioneSociale;
    $data['nomeAzienda'] = $request->nomeAzienda;
    $data['localizzazione'] = $request->localizzazione;
    $data['logo'] = $request->logo;
    $data['tipologia'] = $request->tipologia;
    $data['descrizioneAzienda'] = $request->descrizioneAzienda;
    $azienda = Azienda::create($data);

    Azienda::where('id',$data['id'])->delete();
    $Coupon= Azienda::create($data);

    return redirect(route('listaAziende'));
}

    public function eliminaAzienda(Request $request)
    {

        $request->validate([
            'id'
        ]);

        $data['id'] = $request->id;

        Azienda::where('id',$data['id'])->delete();

        return redirect(route('listaAziende'));
    }


}
