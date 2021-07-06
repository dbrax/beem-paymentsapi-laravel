<?php

/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github: https://github.com/dbrax
 * Email: emmanuel@opensource.co.tz
 *
 */

namespace Epmnzava\Beempayments\util;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Log;


class BeemApi
{



    public $key;
    public $secret;

    public function __construct($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }
    public function BpayRequest($url)
    {

        $client = new Client();
        $credentials = base64_encode("$this->key:$this->secret");


        try {
            $response = $client->get(
                $url,
                [
                    'headers' => [
                        'Authorization' => 'Basic ' . $credentials,
                        'Accept' => 'application/json',
                        'Content-Type: application/json',

                    ],
                ]


            );

            return ["status" => 1, "data" => $response];
        } catch (\Exception $e) {


            return ["status" => 0, "data" =>$e->getMessage()];
        }
    }
}
