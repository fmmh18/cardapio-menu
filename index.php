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
$router->post("/pedido","IndexController:request"); 

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
//CRUD Contato
$router->get("/contato/listar/{page}", "Contact:contactList");
$router->get("/contato/listar/{page}/{message}", "Contact:contactList");
$router->get("/contato/info/{id}", "Contact:contactInfoDetail");
$router->get("/contato/adicionar", "Contact:contactCreate");
$router->post("/contato/adicionar", "Contact:contactStore");
$router->post("/contato/editar", "Contact:contactUpdate");
$router->get("/contato/editar/{id}", "Contact:contactDetail");
$router->get("/contato/editar/{id}/{message}", "Contact:contactDetail");
$router->get("/contato/deletar/{id}", "Contact:contactDelete");
//CRUD Orçamento
$router->get("/orcamento/listar/{page}", "Budget:budgetList");
$router->get("/orcamento/listar/{page}/{message}", "Budget:budgetList");
$router->get("/orcamento/info/{id}", "Budget:budgetInfoDetail");
$router->get("/orcamento/adicionar", "Budget:budgetCreate");
$router->post("/orcamento/adicionar", "Budget:budgetStore");
$router->post("/orcamento/editar", "Budget:budgetUpdate");
$router->get("/orcamento/editar/{id}", "Budget:budgetDetail");
$router->get("/orcamento/editar/{id}/{message}", "Budget:budgetDetail");
$router->get("/orcamento/deletar/{id}", "Budget:budgetDelete");
//CRUD Serviço
$router->get("/servico/listar/{page}", "Service:serviceList");
$router->get("/servico/listar/{page}/{message}", "Service:serviceList");
$router->get("/servico/info/{id}", "Service:serviceInfoDetail");
$router->get("/servico/adicionar", "Service:serviceCreate");
$router->post("/servico/adicionar", "Service:serviceStore");
$router->post("/servico/editar", "Service:serviceUpdate");
$router->get("/servico/editar/{id}", "Service:serviceDetail");
$router->get("/servico/editar/{id}/{message}", "Service:serviceDetail");
$router->get("/servico/deletar/{id}", "Service:serviceDelete");

$router->get("/sair", "User:userLogout");

//Exception erro
$router->namespace("app\controller");
$router->group("oops");
$router->get("/{errcode}", "Error:erro");

$router->dispatch(); 



if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}
 