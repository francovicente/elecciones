<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuscadorController extends Controller
{
     public function buscar(Request $request)
    {
    	$user = DB::table('mas_pda')->where('NUMERO_CED', $request->input('cedula'))->first();
    	//dd($user);
        return view('home', ['data' => $user]);
    }
}
