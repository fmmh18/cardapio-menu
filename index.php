<?php 

require __DIR__ . '/vendor/autoload.php';

use CoffeeCode\Router\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load(); 

if(getenv('APP_DEBUG') == TRUE){
    
    error_reporting(E_ALL);
    ini_set('display_errors', true);
}

include __DIR__ . '/src/depedencie.php';

$router = new Router(getenv('APP_HOST'));


//Rota do Site
$router->namespace("app\controller");
$router->group(null);
$router->get("/","IndexController:index"); 
$router->get("/restaurante","IndexController:restaurant"); 
$router->get("/cardapio/{slug}","IndexController:menu"); 
$router->get("/cardapio/{slug}/{message}","IndexController:menu"); 
$router->get("/prato/{slug}/{tag}","IndexController:detail"); 
$router->get("/orcamento","IndexController:budget"); 
$router->post("/pedido","IndexController:order");  
$router->get("/pedido","IndexController:order");  
$router->get("/pedido/listar","RequestController:requestList");  
$router->get("/pedido/listar/{page}","RequestController:requestList");  
$router->post("/finalizar","IndexController:shore");  
$router->get("/login","UserController:userPageLogin"); 
$router->post("/login","UserController:userLogin"); 
$router->post("/registrar","UserController:userShore"); 
$router->get("/sair","UserController:userLogout");
$router->get("/cancelar","IndexController:sessionOrder");
//Usuario
$router->get("/usuario/listar", "UserController:userList");
$router->get("/usuario/adicionar", "UserController:userCreate");
$router->get("/usuario/adicionar/{message}", "UserController:userCreate");
$router->post("/usuario/adicionar", "UserController:userShore");
$router->get("/usuario/editar/{id}", "UserController:userEdit");
$router->get("/usuario/editar/{id}/{message}", "UserController:userEdit");
$router->post("/usuario/editar", "UserController:userUpdate");

//Rota Admin
$router->namespace("app\controller");
$router->group("admin");
$router->get("/", "User:userLogin");
$router->get("/{message}", "User:userLogin"); 
$router->get("/sair", "User:userLogout");
//CRUD Usuário
$router->get("/usuario/adicionar", "UserController:userCreate");
$router->get("/usuario/adicionar/{message}", "UserController:userCreate");
$router->post("/usuario/adicionar", "UserController:userStore");
$router->post("/usuario/editar", "UserController:userUpdate");
$router->get("/usuario/editar/{id}", "UserController:userDetail");
$router->get("/usuario/editar/{id}/{message}", "UserController:userDetail");
//CRUD Pagina
$router->get("/pagina/listar/{page}", "Page:pageList");
$router->get("/pagina/listar/{page}/{message}", "Page:pageList");
$router->get("/pagina/adicionar", "Page:pageCreate");
$router->get("/pagina/adicionar/{message}", "Page:pageCreate");
$router->post("/pagina/adicionar", "Page:pageStore");
$router->post("/pagina/editar", "Page:pageUpdate");
$router->get("/pagina/editar/{id}", "Page:pageDetail");
$router->get("/pagina/editar/{id}/{message}", "Page:pageDetail");
$router->get("/pagina/deletar/{id}", "Page:pageDelete"); 

//Exception erro
$router->namespace("app\controller");
$router->group("oops");
$router->get("/{errcode}", "ErrorController:error");

$router->dispatch(); 



if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}
 