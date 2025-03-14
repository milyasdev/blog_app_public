<?php

if (!function_exists('sendData')) {
    function sendData($url)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get($url);
        return $response->getBody()->getContents();
    }
}