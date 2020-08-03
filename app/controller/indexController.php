<?php
    
    namespace App\Controller;

    use Illuminate\Http\Request;
    use App\Model\pageModel;
    use App\Model\restaurantModel;
    use App\Model\ClientModel;
    use App\Model\menuModel;
    use App\Model\categoryModel;
    use App\Model\restaurantcategoryModel;

class indexController
{
    public function index($request)
    {
        
        $pages = new pageModel;

        $page = $pages->pageDetailTag('home');

        $title = "XôMenu - Seu webcardárpio";

             require __DIR__."/../view/page.php";
    }

    public function restaurant($request)
    {
        $pagina = 'restaurant';
        $pages = new pageModel;
        $restaurants = new restaurantModel;

        $datas = $restaurants->restaurantList();

        $page = $pages->pageDetailTag('restaurant');

        $title = "XôMenu - Seu webcardárpio - Lista de Restaurantes";
        require __DIR__."/../view/page.php";
    }
    
    public function menu($request)
    {
            $id = $request['id'];

            $menus = new menuModel;
            $restaurants = new restaurantModel;
            $restaurantsCategorys = new restaurantcategoryModel;

            $rows  = $restaurantsCategorys->restaurantCategoryList($id);
            $datas = $menus->menuList($id);
            $restaurant = $restaurants->restaurantInfo($id);
            
            $title = "XôMenu - Seu webcardárpio - Cardápio do ".$restaurant['restaurant_name'];
            require __DIR__."/../view/menu.php";
    }

    public function order($data)
    {
        session_start(); 
        $_SESSION['order'] = $data;
        if(empty($_SESSION['order']))
        {

            $resquests = $_SESSION['order']; 
        }
        else
        {
            $resquests = $data; 
        }

        if(empty($_SESSION['uID']))
        {
            
            header("location: ".getenv('APP_HOST')."/login");
            exit;
        }
        else
        {
        $menus = new menuModel;
        $restaurants = new restaurantModel;
        $clients = new clientModel;
    
        $datas = $menus->menuList($_SESSION['order']['restaurant_id']);     
        $restaurant = $restaurants->restaurantInfo($_SESSION['order']['restaurant_id']);  
        $client = $clients->clientDetail($_SESSION['uID']);
    
        
        $title = "XôMenu - Seu webcardárpio";
        require __DIR__."/../view/order.php";
        }
    }
}