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

}
