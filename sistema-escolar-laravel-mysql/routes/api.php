<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\alunoController;
use App\Http\Controllers\cursoController;
use App\Http\Controllers\EnviandoEmail;


Route::post('/user', [AuthController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'login']);

//Protegendo as rotas com JWT: Para segurança , prefiro utilizar o POST.
Route::middleware(['auth:api'])->group(function () {
    Route::post('/novoaluno',[alunoController::class, 'novoaluno']);
    Route::post('/atualizaraluno',[alunoController::class, 'atualizaraluno']);
    Route::get('/listarTodosaluno',[alunoController::class, 'listarTodosaluno']);
    Route::delete('/deletandoaluno/{id}',[alunoController::class, 'deletandoaluno']);
    Route::post('/novocurso',[cursoController::class, 'novocurso']);
    Route::get('/pegarcursoes',[cursoController::class, 'pegarcursoes']);
    Route::post('/enviandoEmail',[EnviandoEmail::class, 'enviandoEmail']);
    
   
});
Route::get('/unauthenticatedd', function(){
    return 'Acesso não autorizado';
})->name('login');
