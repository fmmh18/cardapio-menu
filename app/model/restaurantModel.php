<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class restaurantModel extends Model
{
    protected $table = "restaurant";

    public function __construct()
    {
        parent::__construct();
    } 

    public function restaurantList()
    {
        return restaurantModel::where('restaurant_status','=',1)->get();
    }

    public function restaurantInfo($id)
    {
        return restaurantModel::where('restaurant_status','=',1)->where('restaurant_id','=',$id)->first();
    }

}