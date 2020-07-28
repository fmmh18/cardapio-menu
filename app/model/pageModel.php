<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;


    class pageModel extends Model
    {
        protected $table = "page";

        public function __construct()
        {
            parent::__construct();
        } 

        public function pageDetailTag($tag)
        {
            return pageModel::where('page_tag','=',$tag)->first();
        }
    }