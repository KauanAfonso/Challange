<?php

// app/Http/Controllers/Anotacoes.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anotacao;
use Illuminate\Support\Facades\Auth;

class AnotacoesController extends Controller
{
    // Criar uma anotação
    public function criar_anotacao(Request $request)
    {

        $user = Auth::user(); //pegando o usuario autenticado

        $request->validate([
            'objetivo' => 'required|string|max:255'
        ]);

        //Criando a anotação e atribuindo ao usuario autenticado
        $anotacao = Anotacao::create([
            'objetivo' => $request->input('objetivo'),
            'user_id' => $user->id
        ]);

        return response()->json(['message' => 'Anotação criada!', 'data' => $anotacao], 201);
    }

    // Obter todas as anotações do usuário
    public function obter_anotacoes()
    {
        $anotacoes = Anotacao::where('user_id', Auth::id())->get();
        return response()->json(['data' => $anotacoes]);
    }


    //Deletar anotação
    public function excluir_anotacao($id){
        $anotacao = Anotacao::where('user_id', Auth::id())->find($id); //Procurando a anotação por id no meio das anotações do user
        if(!$anotacao){
            return response()->json(['message' => 'Aotação não encontrada'],404);
        }

        $anotacao->delete();
        return response()->json(['message' => 'anotacao excluida com sucesso'], 200);
    }
}
