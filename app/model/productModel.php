<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    protected $table = "product";

    public function __construct()
    {
        parent::__construct();
    } 

    public function productDetailSlug($slug)
    {
        return productModel::where('product_slug',$slug)->first();
    }
}