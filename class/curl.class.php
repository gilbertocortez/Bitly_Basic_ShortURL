<?php
// ------------------------------------------------
// This is a cURL Object
// Created by: Gilberto C.
// InteractiveUtopia.com
// ------------------------------------------------

class CurlServer
{
    private $access_token;

    function __construct()
    {
        // Bitly Access Token
        $this->access_token = '{Enter Token Here}';
    }

    function post_request($url, $json_data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Authorization: Bearer ' . $this->access_token , 
                                                    'Content-Type: application/json', 
                                                    'Content-Length: ' . strlen($json_data)
                                                ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        $serverReponseObject = json_decode($server_output);

        return $serverReponseObject;
    }

}