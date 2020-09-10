<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class restaurantModel extends Model
{
    protected $table = "user";

    public function __construct()
    {
        parent::__construct();
    } 

    public function restaurantList()
    {
        return restaurantModel::where('user_status',1)->where('user_level',2)->get();
    }

    public function restaurantInfo($slug)
    {
        return restaurantModel::where('user_status',1)->where('user_slug',$slug)->first();
    }

}