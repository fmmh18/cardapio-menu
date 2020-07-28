<?php
    
    namespace App\Controller;

    use App\Model\pageModel;

class indexController
{
    public function index()
    {
        $pages = new pageModel;

        $page = $pages->pageDetailTag('home');

        $title = "XôMenu - Seu webcardárpio";

             require __DIR__."/../view/page.php";
    }

    public function restaurant()
    {
        echo "restaurante";
       // $title = "XôMenu - Seu webcardárpio - Lista de Restaurantes";
       // require __DIR__."/../view/page.php";
    }
}