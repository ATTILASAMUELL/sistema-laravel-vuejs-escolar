<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Exception;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function create(Request $request)
    {
        $array = ['error'=> ''];
        $rules=[
            'email' => 'required|email|unique:users,email',
            'password' => 'required'

        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $array['error'] = $validator->messages();
            return $array;
        }
        $email = $request->input('email');
        $password = $request->input('password');
        
        $token =  $request->input('token');
        $nome =  $request->input('nome');

        $newUser = new User();
        $newUser->email = $email;
        $newUser->password = Hash::make($password);
        $newUser->name = $nome;
        $newUser->token = $token;
        $newUser->save();


        return $array;
    }

    public function login(Request $request)
    {
        $array = ['error'=> ''];

        
        $rules=[
          
            'email' => 'required|email',
            'password' => 'required',
            

        ];


        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $array['errorBoolean'] = true;
            $array['error'] = $validator->messages();
            return response()->json($array, 400);
        }

        $email = $request->input('email');
        $senha = $request->input('password');
        
        
        
        
        $token = auth('api')->attempt(['email' => $email, 'password' => $senha]);
        if($token)
        {
            
 
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 12900,
                'errorBoolean' =>false
            ]);
        }else
        {
            $array['errorBoolean'] = true;
            $array['error'] = ["emailnvalido"=>"E-mail/Senha Inválidos!!!"];
            return response()->json($array, 401);
            

        }



        return $array;

    }

    public function logout()
    {
        
    }

   
}


