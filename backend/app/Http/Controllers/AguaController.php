<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use App\Models\Agua;

class AguaController extends Controller
{
    public function registrar_agua(Request $request){

        $data_atual = Carbon::today();

        //validando dados
        $request->validate([
            "user_id"=> "integer",
            "quantidade"=>"required|integer|min:1"
        ]);

        //obtendo id do usuario
        $user_id = Auth::user()->id;

        //procurando no banco se o user tem algum registro de agua no dia
        $registro = Agua::where("user_id", $user_id)
        ->where('created_at', '>=', $data_atual->copy()->startOfDay())
        ->where('created_at', '<=', $data_atual->copy()->endOfDay())
        ->first();


        //Se tiver altere somente a quantidade
        if($registro){
            $registro->quantidade += $request->quantidade;
            $meta = '';
            $registro->save();
            ($registro->quantidade >= 8)? $meta = "Parabéns meta alcançada com sucesso !" : "";
            return response(["message" => "Mais um copo adicionado com sucesso !" , "meta" => $meta]);
        }

        //Caso não tenha, crie um registro
        Auth::user()->agua()->create([
            "quantidade" => $request->input('quantidade')
        ]);

        return response(["message" => "Um copo de água adicionado com sucesso !"], 201);

    }


    //Função que retorna copos de agua do usuario no dia
    public function obter_agua_dia(Request $request) {

        $inicio_do_dia = Carbon::today()->startOfDay();
        $fim_do_dia = Carbon::today()->endOfDay();

        $copos_de_agua = Auth::user()->agua()
            ->whereBetween('created_at', [$inicio_do_dia, $fim_do_dia])
            ->get();

        if ($copos_de_agua->isEmpty()) {
            return response()->json(["message" => "Você não bebeu água hoje"], 200);
        }

        return response()->json(["Copos" => $copos_de_agua], 200);
    }

}
