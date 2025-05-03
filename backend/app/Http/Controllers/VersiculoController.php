<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Versiculo;


class VersiculoController extends Controller{



    public function obter_versiculo(Request $request, int $id){

        $versiculo = Versiculo::findOrFail($id);
        return response()->json(['versiculo' => $versiculo], 200);
    }

    public function criar_versiculo(Request $request){

        //aviso ->ative o acepte aplication/json no postman para retorna o json
       $request->validate([
            'meditacao' => 'required|string|max:255',
            'livro' => 'required|string|max:255',
            'capitulo' => 'required|integer',
            'versiculo' => 'required|integer',
        ]);

        $versiculo = Versiculo::create([
            'meditacao' => $request->meditacao,
            'livro' => $request->livro,
            'capitulo' => $request->capitulo,
            'versiculo' => $request->versiculo,
        ]);

        return response()->json(['versicuo criado com sucesso' => $versiculo], 201);
    }

}
