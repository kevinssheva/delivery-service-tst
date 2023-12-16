<?php

namespace App\Controllers;

use App\Models\DriverModel;

class Pengiriman extends BaseController
{
  protected $pesananList;
  protected $produkList;

  public function __construct()
  {
    // Ambil data pesanan dari API order
    $apiPesananUrl = 'http://localhost:8081/api/order';
    $chPesanan = curl_init($apiPesananUrl);
    curl_setopt($chPesanan, CURLOPT_RETURNTRANSFER, true);
    $responsePesanan = curl_exec($chPesanan);
    curl_close($chPesanan);

    // Ambil data produk dari API produk
    $apiProdukUrl = 'http://localhost:8081/api/produk';
    $chProduk = curl_init($apiProdukUrl);
    curl_setopt($chProduk, CURLOPT_RETURNTRANSFER, true);
    $responseProduk = curl_exec($chProduk);
    curl_close($chProduk);

    if ($responsePesanan && $responseProduk) {
      $this->pesananList = json_decode($responsePesanan, true);
      $this->produkList = json_decode($responseProduk, true);
      // dd($this->pesananList, $this->produkList);
    } else {
      echo 'Failed to fetch data from API.';
    }
  }
  public function index($id = 0): string
  {
    // Cari pesanan berdasarkan ID
    $pesanan = current(array_filter($this->pesananList, function ($pesanan) use ($id) {
      return $pesanan['id_pesanan'] == $id;
    }));

    if (!$pesanan) {
      // Pesanan tidak ditemukan
      return 'Pesanan dengan ID ' . $id . ' tidak ditemukan.';
    }

    // Ambil ID produk dari pesanan
    $produkId = $pesanan['produk_id'];

    // Cari produk berdasarkan ID
    $produk = current(array_filter($this->produkList, function ($produk) use ($produkId) {
      return $produk['id'] == $produkId;
    }));

    if (!$produk) {
      // Produk tidak ditemukan
      return 'Produk dengan ID ' . $produkId . ' tidak ditemukan.';
    }

    // Ambil data driver
    $driverModel = new DriverModel();
    $drivers = $driverModel->findAll();

    // Kembalikan data ke view
    $data = [
      'title' => 'Pengiriman',
      'driver' => $drivers,
      'pesanan' => $pesanan,
      'produk' => $produk,
    ];

    return view('pengiriman/page', $data);
  }
}
