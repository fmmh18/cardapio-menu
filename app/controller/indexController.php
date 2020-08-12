<?php
    
    namespace App\Controller;

    use Illuminate\Http\Request;
    use App\Model\pageModel;
    use App\Model\restaurantModel;
    use App\Model\ClientModel;
    use App\Model\menuModel;
    use App\Model\categoryModel;
    use App\Model\productModel;
    use App\Model\RequestModel;
    use App\Model\restaurantcategoryModel;

class indexController
{
    public function index($data)
    {
        session_start();  
        $pages = new pageModel;

        $page = $pages->pageDetailTag('home');

        $title = "XôMenu - Seu webcardárpio";

             require __DIR__."/../view/page.php";
    }

    public function restaurant($data)
    {
        session_start(); 
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
            session_start(); 
            $slug = $request['slug'];

            $menus = new menuModel;
            $restaurants = new restaurantModel;
            $restaurantsCategorys = new restaurantcategoryModel;

            $restaurant = $restaurants->restaurantInfo($slug);
            $rows  = $restaurantsCategorys->restaurantCategoryList($restaurant['restaurant_id']);
            $datas = $menus->menuList($restaurant['restaurant_id']);
            
            $title = "XôMenu - Seu webcardárpio - Cardápio do ".$restaurant['restaurant_name'];
            require __DIR__."/../view/menu.php";
    }

    public function detail($request)
    {
        session_start(); 
        $restaurant_id  = $request['slug'];
        $product_id     = $request['tag'];
        $restaurants = new restaurantModel;
        $products = new productModel;

        $data = $products->productDetailSlug($product_id);
        $restaurant = $restaurants->restaurantInfo($restaurant_id);   
        
        $title = "XôMenu - Seu webcardárpio";
        require __DIR__."/../view/detail.php";
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
    
    public function shore($request)
    {
        session_start(); 
        print_r($request);
        $requests = new requestModel;
 
       
        $restaurant_id  = $_SESSION['order']['restaurant_id'];
        $user_id        = $_SESSION['uID'];
        $change_payment = str_replace(',','.',$request['change_payment']);
        $total = str_replace(',','.',$request['total']);
        $data = ['request_payment' => $request['payment'], 'request_total' => $total,'request_change_payment' => $change_payment];

        $order = $requests->requestInsert($data);
        echo $order;
       // print_r($data);
        unset($_SESSION['order']['restaurant_id']); 
        print_r($_SESSION['order']);
    }
}