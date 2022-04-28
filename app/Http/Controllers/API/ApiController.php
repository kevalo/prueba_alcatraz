<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\User;
use App\Models\Token;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $req)
    {
        $user = User::where('usuario', $req->usuario)->first();
        if(!$user){
            return response()->json([
                'token' => '',
                'error' => true
            ]); 
        }

        // simulacion de validacion de contraseña
        if(md5($req->password) === $user->password){
            $token = Str::random(32);
            Token::create(['value' => Str::random(32)]);
            return response()->json([
                'token' => $token,
                'error' => false
            ]); 
        }
        return response()->json([
            'token' => '',
            'error' => true
        ]); 
    }

    public function departamentos(Request $request)
    {
        $this->validateToken($request->header('token'));
        return response()->json([
            'data' => Departamento::all()->toArray(),
            'error' => false
        ]);
    }

    public function ciudades(Request $request, $idDept)
    {
        $this->validateToken($request->header('token'));
        if(!is_numeric($idDept)){
            return response()->json([
                'data' => [],
                'error' => true
            ]);  
        }

        return response()->json([
            'data' => Municipio::where('departamento_id', $idDept)->get()->toArray(),
            'error' => false
        ]); 
    }

    private function validateToken($token)
    {
        if(!Token::where('value', $token)->first()){
             return response()->json([
                'data' => [],
                'error' => true
            ]); 
        }
    }

}
