<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroAnimalFormRequest;
use App\Http\Requests\CadastroAnimalUpdateFormRequest;
use App\Models\Animal;
use Illuminate\Http\Request;

class CadastroAnimalController extends Controller
{
   // Função de Cadastro de Animais
   public function cadastrarAnimais(CadastroAnimalFormRequest $request)
   {
       $animal = Animal::create([
           'nome' => $request->nome,
           'especie' => $request->especie,
           'peso' => $request->peso,
           'altura' => $request->altura,
           'sexo' => $request->sexo,
           'dieta' => $request->dieta,
           'habitat' => $request->habitat,
           'idade' => $request->idade,
           'ra' => $request->ra
       ]);
       return response()->json([
           "sucess" => true,
           "message" => "Registro de Animal Concluído",
           "data" => $animal
       ], 200);
   }

   // Função de pesquisa por nome
  public function pesquisarPorNome(Request $request)
  {
      $animal = Animal::where('nome', 'like', '%' . $request->nome . '%')->get();
      if (count($animal) > 0) {
          return response()->json([
              'status' => true,
              'data' => $animal
          ]);
      }
      return response()->json([
          'status' => false,
          'message' => "Não há resultados na pesquisa"
      ]);
  }

  // Função de pesquisa por ra
  public function pesquisarPorId($id)
  {
      $animal = Animal::find($id);
      if ($animal == null) {
         return response()->json([
             'status' => false,
             'message' => "Animal não encontrado"
         ]);
     }
     return response()->json([
         'status' => true,
         'data' => $animal
     ]);
  }

  // Função de pesquisa por CPF
  public function pesquisarPorRa(Request $request)
  {
      $animal = Animal::where('ra', 'like', '%' . $request->ra . '%')->get();
      if (count($animal) > 0) {
          return response()->json([
              'status' => true,
              'data' => $animal
          ]);
      }
      return response()->json([
          'status' => true,
          'message' => "Não há resultados na pesquisa"
      ]);
  }

      // Função de pesquisa por Email
  public function pesquisarPorEspecie(Request $request)
  {
      $animal = Animal::where('especie', 'like', '%' . $request->especie . '%')->get();
      if (count($animal) > 0) {
          return response()->json([
              'status' => true,
              'data' => $animal
          ]);
      }
      return response()->json([
          'status' => true,
          'message' => "Não há resultados na pesquisa"
      ]);
  }



  // Função de exclusão
  public function excluir($id)
  {
      $animal = Animal::find($id);

      if (!isset($animal)) {
          return response()->json([
              'status' => false,
              'message' => "Animal não encontrado"
          ]);
      }
      $animal->delete();
      return response()->json([
          'status' => true,
          'message' => "Cadastro de Animal excluído com sucesso"
      ]);
  }

  // Função de retornar todos os profissionais cadastrados no banco de dados
  public function retornarTodos()
  {
      $animal = Animal::all();
      return response()->json([
          'status' => true,
          'data' => $animal
      ]);
  }


      // Função de dar update nos campos 
      // A função If Isset é utilizada para chegar se a variável está vazia ou com algum valor determinado
      public function updateAnimal(CadastroAnimalUpdateFormRequest $request)
      {
          $animal = Animal::find($request->id);
  
          if (!isset($animal)) {
              return response()->json([
                  'status' => false,
                  'message' => 'Animal não encontrado'
              ]);
          }
  
          if (isset($request->nome)) {
              $animal->nome = $request->nome;
          }
  
  
          if (isset($request->especie)) {
              $animal->especie = $request->especie;
          }
  
          if (isset($request->peso)) {
              $animal->peso = $request->peso;
          }
  
          if (isset($request->sexo)) {
              $animal->sexo = $request->sexo;
          }
          if (isset($request->dieta)) {
              $animal->dieta = $request->dieta;
          }
          if (isset($request->habitat)) {
              $animal->habitat = $request->habitat;
          }
          if (isset($request->idade)) {
              $animal->idade = $request->idade;
          }
          if (isset($request->ra)) {
              $animal->ra = $request->ra;
          }
        
          $animal->update();
  
          return response()->json([
              'status' => true,
              'message' => 'Animal atualizado'
          ]);
      }

     
}
