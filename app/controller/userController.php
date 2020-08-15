<?php
    
    namespace App\Controller;

    use Illuminate\Http\Request;
    use App\Model\userModel;
    use App\Model\clientModel;

class userController
{
    public function userPageLogin()
    {
        session_start();
        $title = "XôMenu - Seu webcardárpio - Login";
        require __DIR__."/../view/login.php";
    }

    public function userLogin($request)
    {
        $users = new userModel;

        $mail = $request['mail'];
        $password = md5($request['password']);

        if($users->userFindMail($mail) == 1 && $users->userFindStatus($mail) == 1)
        {
            $return = $users->userValidate($mail,$password);

            if(!empty($return))
            {
                session_start();
                $_SESSION['uID']   = $return['user_id'];
                $_SESSION['uName'] = $return['user_name'];
                $_SESSION['uLevel'] = $return['user_level']; 
                    header("location: ".getenv('APP_HOST')."/pedido"); 
            }
            else
            {
                session_destroy();
                header("location: ".getenv('APP_HOST')."/erro-login");
            }

        }
        
    }

    public function userShore($request)
    {
        $clients = new clientModel;
        $users   = new userModel;
    }

    public function userLogout()
    {
        session_start();
        session_destroy();
        unset($_SESSION);
        header("location: ".getenv('APP_HOST')."/");
        
    }

    public function userList()
    {
        session_start();
        
        $users   = new userModel; 
        if($_SESSION['uLevel'] != 1)
        {
        header("location: ".getenv('APP_HOST')."/admin/permissao");
        }else{
            $datas = $users->userList(); 
            
            $title = "XôMenu - Seu webcardárpio";
             require __DIR__."/../view/admin/user/list.php";

        }
    }
    public function userAdd($request)
    {
        session_start();

        $slug = $request['slug'];
        
        if($_SESSION['uLevel'] != 1)
        {
            header("location: ".getenv('APP_HOST')."/admin/permissao");
        }else{
        $title = "XôMenu - Seu webcardárpio";
        require __DIR__."/../view/admin/user/add.php";
        }
    }
}