<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastosController extends Controller
{
    public function ver()
    {
    	$users = DB::table('votos')->get();
//dd($users);
        return view('gastos', ['users' => $users]);
    }

    public function pagar(Request $request)
    {
    	$cedula = $request->input('cedula');
    	$persona = $request->input('persona');

    	DB::table('votos')->insert(['cedula' => $cedula, 'nombre' => $persona]);

        return view('confirmar', ['success'=> 'INGRESADO CORRECTAMENTE..']);
    }

    public function buscar(Request $request)
    {
    	$user = DB::table('mas_pda')->where('NUMERO_CED', $request->input('cedula'))->first();

    	if (empty($user)) {
    		return view('confirmar', ['error'=> 'Persona no encontrada en el padron..']);
    	} else {
    		$data = DB::table('votos')->where('cedula', $request->input('cedula'))->first();
    		if (!empty($data)) {
    			return view('confirmar', ['error'=> 'ERROR, YA FUE INGRESADO...']);
    		} else {
    			return view('confirmar', ['user'=> $user]);
    		}
		}

        return redirect('/gastos');
    }

}
