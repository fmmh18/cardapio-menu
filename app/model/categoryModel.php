<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    protected $table = "category";

    public function __construct()
    {
        parent::__construct();
    } 

    public function categoryListAll()
    {
        return categoryModel::get();
    }
}