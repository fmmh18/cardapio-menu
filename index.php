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
$router->get("/cardapio/{id}","IndexController:menu"); 
$router->get("/orcamento","IndexController:budget"); 
$router->post("/pedido","IndexController:shore");  
$router->post("/login","userController:userLogin"); 

//Rota Admin
$router->namespace("app\controller");
$router->group("admin");
$router->get("/", "User:userLogin");
$router->get("/{message}", "User:userLogin");
$router->post("/login", "User:userAuthenticate");
$router->get("/principal", "User:userDashboard");
//CRUD Usuário
$router->get("/usuario/listar/{page}", "User:userList");
$router->get("/usuario/adicionar", "User:userCreate");
$router->get("/usuario/adicionar/{message}", "User:userCreate");
$router->post("/usuario/adicionar", "User:userStore");
$router->post("/usuario/editar", "User:userUpdate");
$router->get("/usuario/editar/{id}", "User:userDetail");
$router->get("/usuario/editar/{id}/{message}", "User:userDetail");
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
//CRUD Curriculo
$router->get("/curriculo/listar/{page}", "Curriculum:curriculumList");
$router->get("/curriculo/listar/{page}/{message}", "Curriculum:curriculumList");
$router->get("/curriculo/adicionar", "Curriculum:curriculumCreate");
$router->get("/curriculo/adicionar/{message}", "Curriculum:curriculumCreate");
$router->post("/curriculo/adicionar", "Curriculum:curriculumStore");
$router->post("/curriculo/editar", "Curriculum:curriculumEdit");
$router->get("/curriculo/editar/{id}", "Curriculum:curriculumDetail");
$router->get("/curriculo/editar/{id}/{message}", "Curriculum:curriculumDetail");
//CRUD Vaga
$router->get("/vaga/listar/{page}", "Vacancy:vacancyList");
$router->get("/vaga/listar/{page}/{message}", "Vacancy:vacancyList");
$router->get("/vaga/adicionar", "Vacancy:vacancyCreate");
$router->post("/vaga/adicionar", "Vacancy:vacancyStore");
$router->post("/vaga/editar", "Vacancy:vacancyUpdate");
$router->get("/vaga/editar/{id}", "Vacancy:vacancyDetail");
$router->get("/vaga/editar/{id}/{message}", "Vacancy:vacancyDetail");

$router->get("/sair", "User:userLogout");

//Exception erro
$router->namespace("app\controller");
$router->group("oops");
$router->get("/{errcode}", "Error:erro");

$router->dispatch(); 



if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}
 