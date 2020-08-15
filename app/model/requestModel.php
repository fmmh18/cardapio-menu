<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

class requestModel extends Model
{
    protected $table = "request";
    protected $fillable = ['request_id','request_date','request_status','request_total','request_payment','request_change_payment'];

    public function __construct()
    {
        parent::__construct();
    } 

    public function requestInsert($data)
    {
        $order = new requestModel;
        $order->request_date            = date('Y-m-d H:i:s');
        $order->request_status          = 1;
        $order->request_total           = $data['request_total'];
        $order->request_payment         = $data['request_payment'];
        $order->request_change_payment  = $data['request_change_payment'];
        $order->request_delivery        = $data['request_delivery'];
        $order->created_at              = date('Y-m-d H:i:s');
        $order->save();
        return $order->id; 
    }
}



 