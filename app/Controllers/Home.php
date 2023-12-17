<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $pesananList;
    public function __construct()
    {
        // Ambil data pesanan dari API order
        $apiUrl = 'http://localhost:8080/api/order';

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) {
            $this->pesananList = json_decode($response, true);
        } else {
            echo 'Failed to fetch data from API.';
        }
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk',
            'produk' => $this->pesananList->findAll()
        ];
        return view('home/page', $data);
    }
}
