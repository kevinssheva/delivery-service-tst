<?php

namespace App\Controllers;

use App\Models\PengirimanModel;

class Home extends BaseController
{
  protected $pengirimanModel;

  public function __construct()
  {
    $this->pengirimanModel = new PengirimanModel();
  }
  public function index()
  {
    $apiUrl = 'http://localhost:8080/api/order';

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
      $pesananList = json_decode($response, true);
    } else {
      echo 'Failed to fetch data from API.';
    }

    $pengirimanList = $this->pengirimanModel->findAll();
    $pesananListData = $pesananList['data'];

    foreach ($pengirimanList as $item2) {
      foreach ($pesananListData as $key => $item1) {
        // Membandingkan hanya atribut 'id'
        if ($item1['id_pesanan'] == $item2['id_pesanan']) {
          // Hapus elemen yang sesuai dari array pertama
          unset($pesananListData[$key]);
        }
      }
    }

    $data = [
      'title' => 'Daftar Pesanan',
      'pesanan' => $pesananListData,
    ];

    return view('home/page', $data);
  }
}
