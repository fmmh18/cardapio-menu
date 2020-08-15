<?php
    
    namespace App\Controller;

class errorController
{
    public function error($request)
    {
        $errorcode = $request['errcode'];

        $title = "XôMenu - Erro".$errorcode;
        require __DIR__."/../view/error.php";
    }
}