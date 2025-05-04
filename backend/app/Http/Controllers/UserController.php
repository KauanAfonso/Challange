<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Adicionar mais informações para o usuario quando ele logar
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
