<?php
    
    namespace App\Controller;

    use Illuminate\Http\Request;
    use App\Model\userModel;

class userController
{
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
                header("location: ".getenv('APP_HOST')."/");
            }
            else
            {
                session_destroy();
                header("location: ".getenv('APP_HOST')."/erro-login");
            }

        }
        
    }
}