<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class restaurantCategoryModel extends Model
{
    protected $table = "vw_category_restaurant_enabled";

    public function __construct()
    {
        parent::__construct();
    } 

    public function restaurantCategoryList($id)
    {
        return restaurantCategoryModel::where('user_id','=',$id)->get();
    }
}



 