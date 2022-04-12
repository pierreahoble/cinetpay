<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PayController extends Controller
{
    
    public function index()
    {
        return view('allpay');
    }

    public function pay(REQUEST $request)
    {
       
       $marchand = array(
           'apikey'=> env('CINETPAY_APIKEY'),
           'site_id'=> env('CINETPAY_SITE_ID'),
            "transaction_id"=> Str::random(10), //
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

       $header =['Content-Type'=> 'application/json'];

       
       $response = Http::withHeaders($header)
                        ->post('https://api-checkout.cinetpay.com/v2/payment',$marchand);


            if ($response) {
                return redirect($response->payment_url);
            }else{
                return redirect()->back();
            }

        

    }





    
}
