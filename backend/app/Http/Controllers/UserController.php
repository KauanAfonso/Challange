<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ Aqui está o correto

class UserController extends Controller
{
    //
    public function adicionar_info(Request $request){

        $request->validate([
            'data_nascimento' => "date|required",
            'peso' => "numeric|required",
            'altura' => "numeric|required"
        ]);

        $user = Auth::user();

        $user->update([
            "data_nascimento" => $request->input('data_nascimento'),
            "peso" =>$request->input('peso'),
            "altura" =>$request->input('altura'),
        ]);

        return response(["Usuario atualizado" => $user], 200);

    }
}
