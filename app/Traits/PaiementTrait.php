<?php

namespace App\Traits;
use App\Commande;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

trait PaiementTrait{

    public function payCinetPay($marchand)
    {
        $header =['Content-Type'=> 'application/json'];

        $response = Http::withHeaders($header)
                        ->post('https://api-checkout.cinetpay.com/v2/payment',$marchand);

        return $response;

            // if ($response) {
            //     return redirect($response['payment_url']);
            // }else{
            //     return redirect()->back();
            // }
    }

    public function validation_traitement_job() // verification des status  des transactions
    {
        $entities = Commande::where('staut','2')->get();
        foreach ($entities as $entity) {
            if ($this->verifie_status_transaction($entity)) {
                $this->approuve($entity);
            }
        }


    }



    //Checker si le paiement est bon
    public function verifie_status_transaction($entity) //verifier si le traitement est ok
    {
        $http_request = Http::post('https://api-checkout.cinetpay.com/v2/payment/check',[
            'apikey' => env('CINETPAY_APIKEY'),
            'site_id' => env('CINETPAY_SITE_ID'),
            'transaction_id' => $entity->code
        ]);

        $response = $http_request->json();
        
        if($response['code']==00){
            return true;
        }

        return false;
    }


    ///Approuver le paiement
    public function approuve($entity)
    {
       DB::transaction(function () use ($entity){
           $entity->update([
               'staut'=>1
           ]);
       });

     return response()->json([
         'success'=> true,
         'message'=>'Opération réussi'
     ]);
    }





}