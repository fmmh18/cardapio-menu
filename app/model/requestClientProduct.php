<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class requestClientProduct extends Model
{
    protected $table = "request_product_client";

    public function __construct()
    {
        parent::__construct();
    } 

    public function orderClientProductInsert($data)
    {
        $order = new requestClientProduct;
        $order->request_id      = $data['request_id'];
        $order->product_id      = $data['product_id'];
        $order->client_id       = $data['client_id'];
        $order->quantity        = $data['quantity'];
        $order->product_price   = $data['product_price'];
        $order->created_at      = date('Y-m-d H:i:s');
        return $order->save();
    }
}