<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{    
    protected $table = "user";

    public function __construct()
    {
        parent::__construct();
    } 

    public function userFindMail($mail)
    {
        return userModel::where('user_mail','=',$mail)->count();
    }

    public function userFindStatus($mail)
    {
        return userModel::where('user_status','=',1)->where('user_mail','=',$mail)->count();
    }

    public function userValidate($mail,$password)
    {
        return userModel::where('user_mail','=',$mail)
                        ->where('user_password','=',$password)
                        ->where('user_status','=',1)->first();
    }

    public function userInsert($data)
    {
        $user = new userModel;
        $user->user_name        = $data['name'];
        $user->user_mail        = $data['mail'];
        $user->user_password    = md5($data['password']);
        $user->level            = 3;
        $user->created_at       = date('Y-m-d H:i:s');
        $user->save();
        
        return $user->id();
    }
}