<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Auth\UsuarioResource;
use App\Models\Api\Cadastros\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Método de registro()
     * Responsavel por cadastrar um novo Usuário
     */
    public function registro(Request $request)
    {
        // Verifica se email já esta cadastro
        $user = User::where('email', $request->email)->first();
        // Se não estiver cadastro ele cadastra
        if (!$user) {
            // Valida os dados vindos do usuário
            $attr = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed'
            ]);

            // Cria um novo usuário
            $user = User::create([
                'name' => $attr['name'],
                'password' => Hash::make($attr['password']),
                'email' => $attr['email']
            ]);

            // Retornar uma mensagens de Sucesso
            return response()->json([
                'message' => 'Administrador Cadastrado com Sucesso.', 
                'user' => $user,
                'token' => $user->createToken($request['device'].$request['email'])->plainTextToken
            ],201);
           
        } else {
            return response()->json(['message' => 'ERROR: Usuario Já Cadastrdo.'], 401);
        }
    }

    /**
     * Método login()
     * Responsavel por verificar se o email e senha consiste no banco
     */
    public function login(Request $request)
    {
        // Valida os dados vindos do usuário
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        // Verifica se o login e senha são validos
        if (!Auth::attempt($attr)) {
            return response()->json(['message' => 'ERROR: Usuário ou Senha Invados.'], 401); // se não for validos
        }

        // Retornar uma mensagens de Sucesso
        return response()->json([
            'message' => 'Administrador Cadastrado com Sucesso.', 
            'user' => new UsuarioResource (auth()->user()),
            'token' => auth()->user()->createToken($request['device'].$request['email'])->plainTextToken,
        ],201);
        
    }

    /**
     * Método de logout()
     * Resposnavel por efeturar o logout do usuário
     */
    public function logout()
    {
        // Remove o token do banco
        auth()->user()->tokens()->delete();

        // Retornar uma mensagens de Sucesso
        return [
            'message' => 'Deslogado com Susseso'
        ];
    }
}
