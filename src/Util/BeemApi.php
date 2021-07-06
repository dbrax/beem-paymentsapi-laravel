<?php
/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github: https://github.com/dbrax
 * Email: emmanuel@opensource.co.tz
 *
 */

namespace Epmnzava\Beempayments\util;
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

        $ch = curl_init($url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, array(
            CURLOPT_HTTPGET => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$this->key:$this->secret"),
                'Content-Type: application/json'
            ),
        ));

        // Send the request
        $response = curl_exec($ch);

        // Check for errors
        if ($response === FALSE) {

            Log::info(json_encode($response));
            echo $response;

            die(curl_error($ch));
        } else
            return $response;
    }
}
