<?php
namespace App\Http\Controllers;
use App\Models\Exercicio;
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

        return response()->json(['message' => 'Registro de exercício realizado com sucesso'],200);
    }


}
