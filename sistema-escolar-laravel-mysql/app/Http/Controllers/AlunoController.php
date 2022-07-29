<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Aluno, Curso};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class AlunoController extends Controller
{
    //

    public function novoaluno(Request $request)
    {
        $array = ['error' => ''];
        $rules = [
            'nome'  => 'required',
            'email' => 'required|email|unique:aluno,email',
            'foto' => 'mimes:jpg',
            'telefone'  => 'required',
            'curso'  => 'required'

        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $array['errorBoolean'] = true;
            $array['error'] = $validator->messages();
            return response()->json($array, 400);
        }




        //Inserir mais validação do upload
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $extencao = $request->file('foto')->extension();
                if ($extencao != 'jpg') {
                    $array['errorBoolean'] = true;
                    $array['error'] = ['foto' => 'Arquivo com extenção diferente de JPG'];
                    return response()->json($array, 400);
                } else {
                    $foto = $request->file('foto')->store('public');
                    $urll = asset(Storage::url($foto));
                }
            } else {
                $array['errorBoolean'] = true;
                $array['error'] = ['foto' => 'Arquivo invalido'];
                return response()->json($array, 400);
            }
        } else {
            $array['errorBoolean'] = true;
            $array['error'] = ['foto' => 'Não foi enviado arquivo nenhum'];
            return response()->json($array, 400);
        }
        $nome = ucfirst($request->input('nome'));
        $email =  $request->input('email');
        $telefone =  $request->input('telefone');
        $url =   $urll;

        $curso = explode(",", $request->input('curso'));



        $id_curso = array();
        foreach ($curso as $cursos) {
            $cursoBd = Curso::where('nome', $cursos)->first();
            array_push($id_curso, $cursoBd->id);
        }

        $aluno = Aluno::create(["nome" => $nome, "email" => $email, "imagem" => $url]);
        $aluno->telefones()->create(['telefone' => $telefone]);

        $aluno->cursoes()->attach($id_curso);





        return response()->json($array, 200);
    }

    public function atualizaraluno(Request $request)
    {
        $array = ['error' => ''];
        $aluno = Aluno::where('id', $request->input('id'))->first();
        

        if ($aluno) {

            $rules = [
                'nome'  => 'required',
                'email' => 'required|email',
                'telefone'  => 'required',
                'curso'  => 'required'

            ];


            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $array['errorBoolean'] = true;
                $array['error'] = $validator->messages();
                return response()->json($array, 400);
            }

            //Inserir mais validação do upload
            if (($request->hasFile('foto')) && (!$request->input('url'))) {
                if ($request->file('foto')->isValid()) {
                    $extencao = $request->file('foto')->extension();
                    if ($extencao != 'jpg') {
                        $array['errorBoolean'] = true;
                        $array['error'] = ['foto' => 'Arquivo com extenção diferente de JPG'];
                        return $array;
                    } else {
                        $foto = $request->file('foto')->store('public');
                        $urll = asset(Storage::url($foto));
                    }
                } else {
                    $array['errorBoolean'] = true;
                    $array['error'] = ['foto' => 'Arquivo invalido'];
                    return $array;
                }
            } else {
                $urll = $request->input('url');
            }

            $nome = ucfirst($request->input('nome'));
            $email =  $request->input('email');

            $telefone =  $request->input('telefone');
            $url =   $urll;

            $curso = explode(",", $request->input('curso'));



            $id_curso = array();
            foreach ($curso as $cursos) {
                $cursoBd = Curso::where('nome', $cursos)->first();
                array_push($id_curso, $cursoBd->id);
            }



            $aluno->update(['nome' => $nome, 'email' => $email, 'imagem' => $url]);
            $aluno->telefones()->update(['telefone' => $telefone]);
            $aluno->cursoes()->sync($id_curso);
        }

        $array['error'] = $request->input('nome');
        return response()->json($array, 200);
    }

    public function listarTodosaluno()
    {
        $alunos = array();

        try {
            $aluno = Aluno::with(['telefones', 'cursoes'])->get();


            return  response()->json($aluno, 200);
        } catch (QueryException $e) {
            // You can check get the details of the error using `errorInfo`:


            return response()->json(["error"], 401);
        }
    }

    public function deletandoaluno($id)
    {

        $excluiraluno = Aluno::find($id);

        $excluiraluno->telefones()->delete();

        $excluiraluno->cursoes()->detach();
        $excluiraluno->delete();
    }
}
