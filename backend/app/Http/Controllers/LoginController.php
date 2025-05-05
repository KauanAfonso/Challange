<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Não esqueça de importar a facade Auth
use App\Models\User;

class LoginController extends Controller{


    public function register(Request $request){
        //validando os dados do usuario
        $request->validate([
            "name"=>"required|string|max:255",
            "username"=>"required|string|max:255",
            "email"=>"required|string|max:255|unique:users",
            "password"=>"required|string|max:255",
            "password_confirmation"=>"required|string|max:255|same:password"
        ]);

        //criando o usuario
        $user = User::create([
            "name"=>$request->name,
            "username"=>$request->username,
            "email"=>$request->email,
            "password"=>bcrypt($request->password)
        ]);

        
        if(!$user){
            return response()->json([
                "message"=>"Erro ao criar o usuario"
            ], 404);
        }

        $token = $user->createToken('user_token')->plainTextToken;
        //cria o token e retorna ele em texto
        return response()->json([
            "message"=>"Usuário criado com sucesso",
            "token"=>$token
        ], 201);
    }

    public function login(Request $request){

        //verificando no banco se o usuário existe
        $credentials = $request->only('email','password');

        //se for o usuário correto, ele irá criar um token
        if(Auth::attempt($credentials)){


            $user = Auth::user();//retorna o usuario autenticado
            $token = $user->createToken("user_token")->plainTextToken; //cria o token e retorna ele em texto

            return response()->json(["mensage"=> "Login sucesso",'token' => $token], 200);
        }

        return response()->json(['message' => 'login incorreto'], 401);

       }


       public function logout(Request $request){
            $request->user()->currentAccessToken()->delete(); //deleta o token do usuario no Sanctum
            return response()->json(["message" => "Logout sucesso"], 200);
       }

}
