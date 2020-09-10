<?php

    namespace App\Controller;

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use App\Model\requestModel;
    use App\Model\restaurantModel;

class requestController
{

    public function requestList($request)
    {

        session_start();

        $restaurants = new restaurantModel;
        $orders      = new requestModel;

        
        if(!empty($_GET)):
            $filter = array();
        endif;

        if($_SESSION['uLevel'] == 2)
        {
            $filter['request_restaurant_id'] = $_SESSION['uID'];
        }

        if(!empty($_GET['request_restaurant_id']))
        {
            $filter['request_restaurant_id'] = $_GET['request_restaurant_id'];
        }

        if(!empty($_GET['request_id']))
        {
            $filter['request_id'] = $_GET['request_id'];
        }

        if(!empty($_GET['request_situation']))
        {
            $filter['request_situation'] = $_GET['request_situation'];
        }

        if(!empty($_GET['client_name']))
        {
            $filter['client_name'] = $_GET['client_name'];
        }

        //Paginacao

        $per_page   = 15;

        if (!empty($request['page'])) {
            $page = "0";
        } else {
            $page = $request['page'];
        }   

        $orders->where('request_status',1); 
        if(!empty($filter['request_restaurant_id']))
        {
            $orders->where('request_restaurant_id',$filter['request_restaurant_id']);
        }
        if(!empty($filter['request_id']))
        {
            $orders->where('request_id','=',$filter['request_id']);
        }
        if(!empty($filter['request_situation']))
        {
            $orders->where('request_situation',$filter['request_situation']);
        }  
        $count_page = $orders->count(); 
        

        $total_page = $count_page / $per_page;

        
        

        $datas = $orders->requestList($filter);

         
 
        
        $rows = $restaurants->restaurantList();


        $title = "XôMenu - Seu webcardárpio - Listar Pedidos";
        require __DIR__."/../view/admin/order/list.php";
    }
}