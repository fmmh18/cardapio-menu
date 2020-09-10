<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;


    class clientModel extends Model
    {
        protected $table = "user";

        public function __construct()
        {
            parent::__construct();
        }  

        public function clientDetail($id)
        {
            return clientModel::where('user_status','=',1)->where('user_id','=',$id)->first();
        }

 
    }