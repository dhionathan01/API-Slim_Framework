<?php
     require 'vendor/autoload.php';

     // Criando objeto para definição das rotas
     $app = new \Slim\App;

     // criando rotas e passando uma função para ela
     $app->get('/postagens2', function(){
          echo "Lista de postagens: <BR>";
     });
     
     $app->get('/usuarios[/{id}]', function($request, $response){
          $id = $request->getAttribute('id');
          echo "Lista de usuários ou ID: {$id}<BR>";
     });
     $app->get('/postagens[/{ano}[/{mes}]]', function($request, $response){
          $ano = $request->getAttribute('ano');
          $mes = $request->getAttribute('mes');
          echo "Lista de postagens Ano: {$ano} mes: {$mes}";
     });
     // Executando a aplicação

     $app->run();
