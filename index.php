<?php
     require 'vendor/autoload.php';

     // Criando objeto para definição das rotas
     $app = new \Slim\App;

     // criando rotas e passando uma função para ela
     $app->get('/postagens2', function(){
          echo "Lista de postagens: <BR>";
     });
     // Parametro opcional
     $app->get('/usuarios[/{id}]', function($request, $response){
          $id = $request->getAttribute('id');
          echo "Lista de usuários ou ID: {$id}<BR>";
     });
     // Parametros Opcionais
     $app->get('/postagens[/{ano}[/{mes}]]', function($request, $response){
          $ano = $request->getAttribute('ano');
          $mes = $request->getAttribute('mes');
          echo "Lista de postagens Ano: {$ano} mes: {$mes}";
     });

     // Pegando vários valores
     $app->get('/lista/{itens:.*}', function($request, $response){
          $itens = $request->getAttribute('itens');
          echo $itens . "<BR>";
          var_dump(explode("/", $itens));
     });

     // Nomenado rotas:
     $app->get('/blog/postagens/{id}', function($request, $response){
          echo "Listar Postagem para um ID";
     })->setName("blog");

     $app->get('/meusite', function($request, $response){ 
          $retorno = $this->get("router")->pathFor("blog", ["id" => "10"]);
          echo $retorno;
     });

     // Agrupar rotas

     $app->group('/v1', function(){
          echo "Listagem de usuarios";

          $this->get('/usuarios', function(){
               echo "Listagem de usuarios";
          });
          $this->get('/postagens', function(){
               echo "Listagem de postagens";
          });
     });

     // Executando a aplicação

     $app->run();
