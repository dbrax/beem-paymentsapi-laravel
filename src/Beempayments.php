<?php

/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github: https://github.com/dbrax
 * Email: emmanuel@opensource.co.tz
 *
 */

namespace Epmnzava\Beempayments;

use Epmnzava\Beempayments\util\BeemApi;

class Beempayments
{

    public $apikey;
    public $secretkey;

    public function __construct()
    {
    }

    public function checkout(
        $amount,
        $mobile_number,
        $reference_number,
        $transactionid

    ) {
        $this->apikey = config("beempayments.api_key");
        $this->secretkey = config("beempayments.secret_key");
        $url = config('beempayments.base_url') . "/v1/checkout" .
            "?amount=" . $amount . "&reference_number=" . $reference_number . "&sendSource=true&mobile=" . $mobile_number."&transaction_id=".$transactionid;

        $beemapi = new BeemApi($this->apikey, $this->secretkey);
        $reponse = $beemapi->BpayRequest($url);



        if($reponse["status"]==1){
            //success

            //$reponse["data"];

        }
        else{

            //error
            return $reponse["data"];
        }

        //possible reponses

        //https://checkout.beem.africa/v1/checkout/page?token=656d9a11-7565-449e-b32a-d081c0c70fcf

        /**
         * HTTP/1.1 401 Unauthorized 
         *{
         *  "code" : 120,
         *   "message": "Invalid Authentication Parameters" 
         *}

         */


        /**
         * HTTP/1.1 404 Not Found 
         *{
         *   "src":"https://checkout.beem.africa/v1/checkout/error?message=No%20payment%20method%20set%20by%20client" 
         *}

         */
    }


    public function processTokenUrl()
    {
    }
}
