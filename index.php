<?php
     require 'vendor/autoload.php';

     // Criando objeto para definição das rotas
     $app = new \Slim\App;

     // criando rotas e passando uma função para ela
     $app->get('/postagens', function(){
          echo "Lista de postagens: <BR>";
     });
     
     $app->get('/usuarios[/{id}]', function($request, $response){
          $id = $request->getAttribute('id');
          echo "Lista de usuários ou ID: {$id}<BR>";
     });
     // Executando a aplicação

     $app->run();
