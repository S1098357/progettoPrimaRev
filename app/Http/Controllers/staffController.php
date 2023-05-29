<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class staffController extends Controller
{
    public function listaStaff(){
        $staff=DB::Table('users')
            ->where('role', 'staff')->get();
        $utenti=DB::Table('users')
            ->where('role', 'user')->get();
        return view('listaStaff', ['listaStaff'=>$staff],['listaUtenti'=>$utenti]);
    }


    public function modificaStaff(Request $request){
        $staff=DB::Table('users')
            ->where('id', $request->id)->get();
        $option= 'edit';
        return view('staffDesigner', ['staff'=>$staff], ['option'=>$option]);
    }


    public function staffCreator(){
        return view('staffDesigner', ['option'=>'create']);
    }

    public function eliminaStaff(Request $request){
        DB::delete('delete from users where id = ?',[$request->id]);
        return redirect(route('listaStaff'));
    }

    public function editStaff(Request $request)
    {

        $request->validate([
            'username',
            'password',
            'email',
            'nome',
            'cognome',
            'telefono',
            'datadinascita',
            'genere'
        ]);

        $data['username'] = $request->username;
        $data['password']=Hash::make($request->password);
        $data['email'] = $request->email;
        $data['nome'] = $request->nome;
        $data['cognome'] = $request->cognome;
        $data['telefono'] = $request->telefono;
        $data['datadinascita'] = $request->datadinascita;
        $data['genere'] = $request->genere;
        $data['role']='staff';

        User::where('id',$request->id)->update($data);
        return redirect(route('listaStaff'));
    }

    public function creaStaff(Request $request)
    {

        $request->validate([
            'username',
            'password',
            'email',
            'nome',
            'cognome',
            'telefono',
            'datadinascita',
            'genere'
        ]);

        $data['username'] = $request->username;
        $data['password']=Hash::make($request->password);
        $data['email'] = $request->email;
        $data['nome'] = $request->nome;
        $data['cognome'] = $request->cognome;
        $data['telefono'] = $request->telefono;
        $data['datadinascita'] = $request->datadinascita;
        $data['genere'] = $request->genere;
        $data['role']='staff';
        $Coupon = User::create($data);

        return redirect(route('listaStaff'));

    }

}
