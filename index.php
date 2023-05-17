<?php
     require 'vendor/autoload.php';
     use \Psr\Http\Message\ServerRequestInterface as Request;
     use \Psr\Http\Message\ResponseInterface as Response;

     // Criando objeto para definição das rotas
     $app = new \Slim\App([
          'settings' => [
               'displayErrorDetails' => true,
          ]
          ]);

     /*
          Tipos de respostas
          cabeçalho, texto, Json, XML
     */
    $app->get('/header', function(Request $request, Response $response) {
          $response->write('Esse é um retorno header');
          // Definindo informações de cabeçalho
          // allow = permitir , PUT = tipo de requisição, essa instrução permite apenas  requisição de put
          return $response->withHeader('allow', 'PUT')
                    ->withAddedHeader('Content-Length', 10);
     });
    $app->get('/json', function(Request $request, Response $response) {
          return $response->withJson([
               "nome" => "Dhionathan Lanzoni Jobim",
               "endereco" => "Rua Dom Silverio 544",
               "email" => "dhionathan321@gmail.com"
          ]);
          
     });
    $app->get('/xml', function(Request $request, Response $response) {
          $xml = file_get_contents('arquivo.xml');
          $response->write($xml);
          return $response->withHeader('Content-type', 'application/xml');
          
     });
     /* Middleware*/
     // Adicionando um middleware
     $app->add(function (Request $request, Response $response, $next) {
          $response->write('Middleware 1 : inicio camada 1 +');
          return $next($request, $response);
     });
     /* O middeware são acessados de forma inversa a sua definição logo é executado o segundo o primeiro e entt as rotas da aplicação são liberadas*/
     $app->add(function (Request $request, Response $response, $next) {
          $response->write('Middleware 2 : inicio camada 2 +');
          return $next($request, $response);
     });
    $app->get('/middleware_usuarios', function(Request $request, Response $response) {
        
          $response->write('Ação principal usuarios');
          
     });
    $app->get('/middleware_postagens', function(Request $request, Response $response) {
        
          $response->write('Ação principal postagens');
          
     });
     $app->run(); 

     // Container dependency injection
/* 
     class Servico {

     }
     $servico = new Servico;
     // Criando um container com pimple (ele é instalado juntamente com o slim, pode verificar sua pasta no vendor);
    
     $app->get('/servico', function(Request $request, Response $response) {
          // Usando o container
          $servico = $this->get('servico');
         var_dump($servico);
     });


      // Container Pimple:
      $container = $app->getContainer();
      // Fazendo injeção de dependencia
      $container['View'] = function(){
           return new App\View;
      };
 
     // Controllers como serviço:
     $app->get('/usuario', '\App\controllers\Home:index');
     // Executando a aplicação
     */

     // Padrão PSR7
     /* 
     Tipos de requisição ou Verbos HTTP

     get -> Recuperar recursos do servidor (Select)
     post -> Criar dado no servidor (Insert)
     put -> Atualizar dados no servidor (Update)
     delete -> Deletar dados do servidor (Delete)
     
     */
     // Realizando requisição get
/*      $app->get('/postagens', function(Request $request, Response $response){
          // Escreve no corpo da resposta utilizando o padrão PSR7
          $response->getBody()->write("Listagem de postagens");
          return $response;
     });
     // Realizando requisição post
     $app->post('/usuarios/adiciona', function(Request $request, Response $response){
          //criando uma requisição post
          // Recupera post($_POST)
          $post = $request->getParsedBody();
          $nome = $post['nome'];
          $email = $post['email'];

          // INSERT INTO para inserir no banco de dados...
          
          return $response->getBody()->write("Nome:{$nome} - Email:{$email}");
     });
     // Realizando uma requisição put
     $app->put('/usuarios/atualiza', function(Request $request, Response $response){
          //criando uma requisição post
          // Recupera post($_POST)
          $post = $request->getParsedBody();
          $id = $post['id'];
          $nome = $post['nome'];
          $email = $post['email'];
          // Atualizar no banco de dados com UPDATE...
          return $response->getBody()->write("Sucesso ao Atualizar usuario com id: {$id}");
     });
     // Realizando uma requisição DELETE
     $app->delete('/usuarios/remove/{id}', function(Request $request, Response $response){
          $id = $request->getAttribute('id');
          return $response->getBody()->write("Sucesso ao Deletar Usuario ID: {$id}");
     }); */




     /* // criando rotas e passando uma função para ela
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
 */

