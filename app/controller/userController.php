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
        session_start();
        $users = new userModel;

        $mail     = $request['mail'];
        $password = $request['password'];

        $custo = '08';
        $salt = 'Cf1f11ePArKlBJomM0F6aJ';
        $password = crypt($password, '$2a$' . $custo . '$' . $salt . '$');
       

        if($users->userFindMail($mail) == 1 && $users->userFindStatus($mail) == 1)
        {
            $return = $users->userValidate($mail,$password);
          
            if(!empty($return))
            {
                $_SESSION['uID']   = $return['user_id'];
                $_SESSION['uName'] = $return['user_name'];
                $_SESSION['uLevel'] = $return['user_level']; 
                $_SESSION['uFoto'] = $return['user_image']; 
                if(!empty($_SESSION['page']))
                {
                    header("location: ".getenv('APP_HOST')."/".$_SESSION['page']); 
                }
                else
                {
                    header("location: ".getenv('APP_HOST')."/"); 
                }
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
        
        session_start();
        $users   = new userModel;
        
        //remover acentuação
        $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú',' ');
        $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U','-');

        $request['user_slug'] = strtolower(str_replace($comAcentos, $semAcentos,$request['user_name']));


        //gerar senha aleatória
        $password = 'xomenu'.date('Y');
        $custo = '08';
        $salt = 'Cf1f11ePArKlBJomM0F6aJ';
        $hash = crypt($password, '$2a$' . $custo . '$' . $salt . '$');
        //echo $hash;exit;
        $request['user_password'] = $hash;
        
        //Upload
        $uploaded = 1;

        if($request['user_level'] == 2){
            $url = getenv('APP_UPLOADLOGO');
        }else{
            $url = getenv('APP_UPLOADIMAGE');
        }

        $images = $_FILES;  

        if($images['user_image']['error'] == 0)
        {
           
            if(move_uploaded_file($images["user_image"]["tmp_name"], $url.$images["user_image"]["name"]))
            {
                    $request['user_image'] = $images["user_image"]["name"];
                    return $users->userInsert($request);
                    
                    header("location: ".getenv('APP_HOST')."/adicionar/sucesso");
            }

        }else{
            
            if($request['user_level'] == 2){
                $request['user_image'] = 'logo-120-generic.png';
            }else{
                
                $request['user_image'] = 'user-generic.png';
            }
                return $users->userInsert($request);

                
                header("location: ".getenv('APP_HOST')."/adicionar/sucesso");
       
        }
 
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
            header("location: ".getenv('APP_HOST')."/permissao");
        }else{
            $datas = $users->userList(); 
            
            $title = "XôMenu - Seu webcardárpio";
             require __DIR__."/../view/admin/user/list.php";

        }
    }
    public function userCreate($request)
    {
        session_start();

        if(!empty($request['message']))
        {
            if($request['message'] == 'sucesso')
            {
                $status['message'] = 'sucesso' ;
                $message = "Usuário criado.";
            }
            else if($request['message'] == 'erro')
            {
                $status['message'] = 'erro' ;
                $message = "Opss! aconteceu algo que não previamos.";
            }
        }
 
        if($_SESSION['uLevel'] != 1)
        {
            header("location: ".getenv('APP_HOST')."/permissao");
        }else{
            $title = "XôMenu - Seu webcardárpio";
            require __DIR__."/../view/admin/user/add.php";
        }
    }

    public function userEdit($request)
    {
        session_start();
        
        $id = $request['id'];

        if(!empty($request['message']))
        {
            if($request['message'] == 'sucesso')
            {
                $status['message'] = 'sucesso' ;
                $message = "Usuário alterado.";
            }
            else if($request['message'] == 'erro')
            {
                $status['message'] = 'erro' ;
                $message = "Opss! aconteceu algo que não previamos.";
            }
        }

        $users = new userModel;

        $user = $users->userDetail($id);

        $title = "XôMenu - Seu webcardárpio";
        require __DIR__."/../view/admin/user/edit.php"; 
    }

    public function userUpdate($request)
    {
        session_start();
 
        $id = $request['user_id'];
        $users = new userModel;

        if($request['user_level'] == 2){
            $url = getenv('APP_UPLOADLOGO');
        }else{
            $url = getenv('APP_UPLOADIMAGE');
        }


        $image_old = $request['user_image_old'];
        $image_new = $_FILES['user_image']['name'];

        if($image_old != $image_new){ 

            $images = $_FILES;  

            if($images['user_image']['error'] == 0)
            {
                if(move_uploaded_file($images["user_image"]["tmp_name"], $url.$images["user_image"]["name"]))
                {
                    $request['user_image'] = $images["user_image"]["name"];
                    return $users->userUpdate($request);
                    
                    header("location: ".getenv('APP_HOST')."/usuario/editar/".$id."/sucesso");
                }
            }
        }else{
            $request['user_image'] = $image_old;

            return $users->userUpdate($request);
            
            header("location: ".getenv('APP_HOST')."/usuario/editar/".$id."/sucesso");
        }
    }
}