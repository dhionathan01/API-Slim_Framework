<?php
     require 'vendor/autoload.php';

     // Criando objeto para definição das rotas
     $app = new \Slim\App;

     // criando uma rota e passando uma função para ela
     $app->get('/postagens', function(){
          echo "Lista de postagens: <BR>";
     });

     // Executando a aplicação

     $app->run();
