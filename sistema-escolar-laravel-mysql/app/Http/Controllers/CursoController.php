<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    //

    public function novocurso(Request $request)
    {
        $array = ['error'=> ''];
        $rules=[  
            'nome' => 'required',
            
        ];


        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $array['errorBoolean'] = true;
            $array['error'] = $validator->messages();
            return response()->json($array, 400);
        }

        $nome = $request->input('nome');

        Curso::create(['nome'=> $nome]);

        $array['errorBoolean'] = false;
        return response()->json($array, 200);
        

    }
    public function pegarcursoes()
    {
        $array = ['error'=> ''];
        $capturarcursoes = Curso::all();
        $cursoes = [];
        $cursoes['nome'] =[];


        foreach($capturarcursoes as $valores)
        {
            array_push($cursoes['nome'],$valores['nome']);
        }

        $dadosLimpos = array_unique($cursoes, SORT_REGULAR);
        $array['errorBoolean'] = false;
        $array['curso'] = $dadosLimpos;
        return response()->json($array, 200);
    }
}
