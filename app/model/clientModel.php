<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;


    class clientModel extends Model
    {
        protected $table = "client";

        public function __construct()
        {
            parent::__construct();
        }  

        public function clientDetail($id)
        {
            return clientModel::where('client_status','=',1)->where('client_id','=',$id)->first();
        }

        public function clientInsert($data)
        {
            $client = new clientModel;
            $client->client_name            = $data['name'];
            $client->client_mail            = $data['mail'];
            $client->client_phone           = $data['phone'];
            $client->client_zipcode         = $data['zipcode'];
            $client->client_address         = $data['address'];
            $client->client_neighborhood    = $data['neighborhood'];
            $client->client_complement      = $data['complement'];
            $client->client_city            = $data['city'];
            $client->client_state           = $data['state'];
            $client->client_status          = 1;
            $client->created_at             = date('Y-m-d H:i:s');
            $client->save();
            return $client->id();
        }
    }