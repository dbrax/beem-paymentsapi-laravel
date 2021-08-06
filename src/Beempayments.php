<?php

/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github: https://github.com/dbrax
 * Email: emmanuel@opensource.co.tz
 *
 */

namespace Epmnzava\Beempayments;


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
        $response = $beemapi->BpayRequest($url);


      return $response;
    }


    public function processTokenUrl()
    {
    }
}
