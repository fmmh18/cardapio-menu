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
    use App\Model\requestClientProduct;
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

            if(!empty($request['message']))
            {
                if($request['message'] == 'sucesso')
                {
                    $status['message'] = 'sucesso' ;
                    $message = "Pedido enviado.";
                }
                else if($request['message'] == 'erro')
                {
                    $status['message'] = 'erro' ;
                    $message = "Opss! aconteceu algo que não previamos.";
                }
            }
            

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

    public function order($request)
    {
        session_start(); 
        if(!isset($_SESSION['order']))
        {
            $_SESSION['order'] = array();
        } 
        if(!empty($request))
        {
            $_SESSION['order'][] = ['product_id'=>$request['product_id'],'product_price'=>$request['product_price'],'product_quantity'=>$request['product_quantity']];
        }
        
        if(empty($_SESSION['uID']))
        {
            $_SESSION['restaurant_slug'] = $request['restaurant_slug'];
            $_SESSION['restaurant_id'] = $request['restaurant_id'];
           
            header("location: ".getenv('APP_HOST')."/login");
            exit;
        }
        else
        {
        $menus = new menuModel;
        $restaurants = new restaurantModel;
        $clients = new clientModel; 
        $resquests = $_SESSION['order']; 
      
        $restaurant = $restaurants->restaurantInfo($_SESSION['restaurant_slug']);  
        $datas = $menus->menuList($restaurant['restaurant_id']);  
        $client = $clients->clientDetail($_SESSION['uID']);
      
        $title = "XôMenu - Seu webcardárpio";
        require __DIR__."/../view/order.php";
        }
    }
    
    public function shore($request)
    {
        session_start(); 

        $requests       = new requestModel;
        $clientProduct  = new requestClientProduct; 

        $user_id        = $_SESSION['uID'];
        $change_payment = str_replace(',','.',$request['change_payment']);
        $total          = str_replace(',','.',$request['total']);
        $data           = ['request_payment' => $request['payment'], 'request_total' => $total,'request_change_payment' => $change_payment, 'request_delivery' => $request['delivery']];
      
        $result         = $requests->requestInsert($data);
    
        $count = count($_SESSION['order']); 
        for($i = 0;$i <= $count;$i++)
        {
            $row = ['request_id' => $result,'product_id'=>$_SESSION['order'][$i]['product_id'],'client_id'=>$_SESSION['uID'],'quantity'=>$_SESSION['order'][$i]['product_quantity'],'product_price'=>str_replace(',','.',$_SESSION['order'][$i]['product_price'])];
             $clientProduct->orderClientProductInsert($row);
            $row = array();
        }
        $restaurant_slug = $_SESSION['restaurant_slug'];
        if($result > 0)
        {
            
            unset($_SESSION['order']);
            unset($_SESSION['restaurant_slug']);
            unset($_SESSION['restaurant_id']);

            header("location: ".getenv('APP_HOST')."/cardapio/".$restaurant_slug."/sucesso");

        }
        else
        {
            header("location: ".getenv('APP_HOST')."/cardapio/".$restaurant_slug."/erro");
        }
    }
}