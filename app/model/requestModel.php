<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Facades\DB; 

class requestModel extends Model
{
    protected $table = "request";
    protected $fillable = ['request_id','request_date','request_status','request_total','request_payment','request_change_payment','request_restaurant_id'];

    public function __construct()
    {
        parent::__construct();
    } 

    public function requestListAll($filter)
    {
        $request = new requestModel;
 

        $request->where('request_status',1); 
        if(!empty($filter['request_restaurant_id']))
        {
            $request->where('request_restaurant_id',$filter['request_restaurant_id']);
        }
        if(!empty($filter['request_id']))
        {
            $request->where('request_id','=',$filter['request_id']);
        }
        if(!empty($filter['restaurant_id']))
        {
            $request->where('request_restaurant_id',$filter['restaurant_id']);
        }  
        
        return $request->count();
      
    }

    public function requestList($filter)
    {

        $request = new requestModel;

        $request->where('request_status',1);

        if(!empty($filter['request_restaurant_id']))
        {
            $request->where('request_restaurant_id',$filter['request_restaurant_id']);
        }
        if(!empty($filter['request_id']))
        {
            $request->where('request_id',$filter['request_id']);
        }
        if(!empty($filter['restaurant_id']))
        {
            $request->where('request_restaurant_id',$filter['restaurant_id']);
        }
        return $request->paginate(15);

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
        $order->request_restaurant_id   = $data['request_restaurant_id'];
        $order->created_at              = date('Y-m-d H:i:s');
        $order->request_situation       = 1;
        $order->request_read            = 0;
        $order->save();
        return $order->id; 
    }
}



 