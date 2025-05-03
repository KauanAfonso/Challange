<?php

// app/Http/Controllers/Anotacoes.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anotacao;
use Illuminate\Support\Facades\Auth;

class AnotacoesController extends Controller
{
    // POST /api/anotacoes
    public function criar_anotacao(Request $request)
    {

        $user = Auth::user();

        $request->validate([
            'objetivo' => 'required|string|max:255'
        ]);

        $anotacao = Anotacao::create([
            'objetivo' => $request->input('objetivo'),
            'user_id' => $user->id
        ]);

        return response()->json(['message' => 'Anotação criada!', 'data' => $anotacao], 201);
    }

    // GET /api/anotacoes
    public function obter_anotacoes()
    {
        $anotacoes = Anotacao::where('user_id', Auth::id())->get();
        return response()->json(['data' => $anotacoes]);
    }
}
