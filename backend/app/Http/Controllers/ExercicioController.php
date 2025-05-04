<?php
namespace App\Http\Controllers;
use App\Models\Exercicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Não esqueça de importar a facade Auth
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Response;

class ExercicioController extends Controller{
    public function criar_exercicio(Request $request)
    {
        // Validação para garantir que a imagem, nome e descrição sejam enviados
        $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:500',
        ]);

        // Verifica se a imagem foi enviada
        if ($request->hasFile('imagem')) {
            // Armazena a imagem no diretório 'images' e retorna o caminho
            $path = $request->file('imagem')->store('images', 'public');

            // Salva as informações no banco de dados
            $post = new Exercicio();
            $post->nome = $request->input('nome');
            $post->descricao = $request->input('descricao');
            $post->imagem = Storage::url($path);
            $post->save();

            return response()->json([
                'message' => 'Imagem e dados salvos com sucesso!',
                'data' => $post
            ]);
        }

        return response()->json(['message' => 'Nenhuma imagem foi enviada'], 400);
    }

    public function exercicio_realizado(Request $request)
    {
        $user = Auth::user();

        // Correct validation rules
        $request->validate([
            'exercicio_id'=> 'required|exists:exercicios,id',
            'tempo' => 'nullable|string|max:255',
            'exercicio' => 'required|boolean',
            'feedback' => 'string'
        ]);

        //com a chave exercicio_id, o id do exercicio é passado para o attach
        //o attach é utilizado para criar o relacionamento entre o usuário e o exercício
        $user->exercicio()->attach([
            $request->input('exercicio_id') => [
                'exercicio' => $request->input('exercicio'),
                'tempo' => $request->input('tempo'),
                'feedback' => $request->input('feedback'),
            ]]);

        return response()->json(['message' => 'Registro de exercício realizado com sucesso'],201);
    }


    public function obter_exercicio_dia(request $request){
        //pegando a data atual

        //se a data não for passada, pega a data atual
        //se a data for passada, pega a data passada
        $data_atual = $request->input('data') // O input procura esse dado em body, path,query,, form-data
        ?Carbon::parse($request->input('data'))
        : Carbon::now();

        $user = Auth::user();
        //filtrando sobre os exercicios do usuario por dia

        $exercicios = $user->exercicio()
            ->where('exercicio', true)
            ->wherePivot('created_at', '>=', $data_atual->copy()->startOfDay())
            ->wherePivot('created_at', '<=', $data_atual->copy()->endOfDay())
            ->get();


        if($exercicios->isEmpty()){
            return response()->json(['message' => 'Nenhum exercício encontrado para hoje'], 404);
        }

        return response()->json(['exercicios_hoje'=>$exercicios], 200);
    }

}
