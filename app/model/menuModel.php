<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class menuModel extends Model
{
    protected $table = "vw_product_category_restaurant";

    public function __construct()
    {
        parent::__construct();
    } 

    public function menuList($id)
    {
        return menuModel::where('restaurant_id','=',$id)->get();
    }
}