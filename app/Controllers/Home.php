<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $apiUrl = 'http://localhost:8081/api/order';

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) {
            $pesananList = json_decode($response, true);

            dd($pesananList);
        } else {
            echo 'Failed to fetch data from API.';
        }
    }
}
