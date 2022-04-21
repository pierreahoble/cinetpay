<?php

namespace App\Http\Controllers;

use App\Commande;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\PaiementTrait;

class PayController extends Controller
{
    Use PaiementTrait;
    
    public function index()
    {
        return view('allpay');
    }

    public function pay(REQUEST $request)
    {
    //    return $request;
    $transaction_id = Str::random(10);
       $marchand = array(
           'apikey'=> env('CINETPAY_APIKEY'),
           'site_id'=> env('CINETPAY_SITE_ID'),
            "transaction_id"=> $transaction_id, //
            "amount"=> request('montant'),
            "currency"=> "XOF",
            "alternative_currency"=> "",
            "description"=> " TEST INTEGRATION ",
            "customer_id"=> "172",
            "customer_name"=> "KOUADIO",
            "customer_surname"=> "Francisse",
            "customer_email"=> "harrissylver@gmail.com",
            "customer_phone_number"=> "+225004315545",
            "customer_address"=> request('adresse'),
            "customer_city"=> request('city'),
            "customer_country"=> request('pays'),
            "customer_state"=> request('pays'),
            "customer_zip_code"=> request('zip_code'),
            "notify_url"=> "",
            "return_url"=> "",
            "channels"=> "ALL",
            "metadata"=> "user1",
            "lang"=> "FR",
            "invoice_data" => [
                "Donnee1"=> "",
                "Donnee2"=> "",
                "Donnee3"=> ""
            ]
       ); 


       $entities = Commande::create([
        'montant' =>request('montant'),
        'code'=>$transaction_id,
        'adresse'=>'MOn pays',
        'pays' => 'TG',
        'staut'=>'2',
        'user_id'=>'1',
       ]);


     $response = $this->payCinetPay($marchand);

     return $response;
        

    }

    public function redirec_pay(REQUEST $request)
    {
        return $request;
    }





    
}
