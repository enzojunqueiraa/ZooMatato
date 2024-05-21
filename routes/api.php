<?php

use App\Http\Controllers\CadastroAnimalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Rota para cadastro de animais
Route::post('/animais/cadastrar', [CadastroAnimalController::class, 'cadastrarAnimais']);

// Rota para pesquisa por nome
Route::get('/animais/pesquisarPorNome', [CadastroAnimalController::class, 'pesquisarPorNome']);

// Rota para pesquisa por Id
Route::get('/animais/pesquisarPorId/{id}', [CadastroAnimalController::class, 'pesquisarPorId']);

// Rota para pesquisa por especie
Route::get('/animais/pesquisarPorEspecie', [CadastroAnimalController::class, 'pesquisarPorEspecie']);

// Rota para exclusão de um animal
Route::delete('/animais/excluir/{id}', [CadastroAnimalController::class, 'excluir']);

// Rota para retornar todos os animais
Route::get('/animais/retornarTodos', [CadastroAnimalController::class, 'retornarTodos']);

// Rota para atualização de um animal
Route::post('/animais/{id}', [CadastroAnimalController::class, 'updateAnimal']);

// Rota para pesquisa por RA
Route::get('/animais/pesquisarPorRa', [CadastroAnimalController::class, 'pesquisarPorRa']);