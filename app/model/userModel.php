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
        return userModel::where('user_status',1)->where('user_mail',$mail)->count();
    }

    public function userValidate($mail,$password)
    {
        $user =  userModel::where('user_mail',$mail)
                        ->where('user_password',$password)
                        ->where('user_status',1)->first();
        return $user;
    }

    public function userInsert($data)
    {
        $user = new userModel;
        $user->user_name            = $data['user_name'];
        $user->user_mail            = $data['user_mail'];
        $user->user_password         = $data['user_password'];
        $user->user_address         = $data['user_address'];
        $user->user_neighborhood    = $data['user_neighborhood'];
        $user->user_zipcode         = $data['user_zipcode'];
        $user->user_number          = $data['user_number'];
        $user->user_state           = $data['user_state'];
        $user->user_city            = $data['user_city'];
        $user->user_phone           = $data['user_phone'];
        $user->user_cellphone       = $data['user_cellphone'];
        $user->user_image           = $data['user_image'];
        $user->user_level           = $data['user_level'];
        $user->created_at           = date('Y-m-d H:i:s');
        $user->save();
        
        return $user->id;
    }
    
    public function userList()
    {
        return userModel::all();
    }

    public function userDetail($id)
    {
        return userModel::where('user_id',$id)->first();
    }

    public function userUpdate($data)
    {
        $user = userModel::where('user_id','=',$data['user_id'])->update([
            'user_name'=>$data['user_name'],
            'user_mail'=>$data['user_mail'],
            'user_password'=>$data['user_password'],
            'user_phone'=>$data['user_phone'],
            'user_cellphone'=>$data['user_cellphone'],
            'user_zipcode'=>$data['user_zipcode'],
            'user_address'=>$data['user_address'],
            'user_number'=>$data['user_number'],
            'user_neighborhood'=>$data['user_neighborhood'],
            'user_complement'=>$data['user_complement'],
            'user_city'=>$data['user_city'],
            'user_state'=>$data['user_state'],
            'user_level'=>$data['user_level'],
            'user_status'=>$data['user_status'],
            'user_image'=>$data['user_image']
            ]);

    }
}