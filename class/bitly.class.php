<?php
// ------------------------------------------------
// This is a Bitly URL Shortening Object
// Created by: Gilberto C.
// InteractiveUtopia.com
// ------------------------------------------------
require 'curl.class.php';

class BitlyShortener extends CurlServer
{
    private $bitly_data;

    function shorten_url($long_url)
    {
        $bitly_base_url = 'https://api-ssl.bitly.com/v4';
        $bitly_endpoint = '/shorten';

        $curl_url = $bitly_base_url . $bitly_endpoint;
        $data = new stdClass();
        $data->long_url = $long_url;
        $data->domain = "bit.ly";
        $data->group_guid = "Bl4p3y9jkNs";
        $this->bitly_data = json_encode($data);

        return $this->post_request($curl_url, $this->bitly_data);
    }
}