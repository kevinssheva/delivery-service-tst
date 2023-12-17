<?php

namespace App\Controllers;

use App\Models\DriverModel;
use App\Models\PengirimanModel;
use CodeIgniter\I18n\Time;

class Pengiriman extends BaseController
{
  protected $pesananList;
  protected $produkList;
  protected $pengirimanModel;

  public function __construct()
  {
    $this->pengirimanModel = new PengirimanModel();
    // Ambil data pesanan dari API order
    $apiPesananUrl = 'http://localhost:8080/api/order';
    $chPesanan = curl_init($apiPesananUrl);
    curl_setopt($chPesanan, CURLOPT_RETURNTRANSFER, true);
    $responsePesanan = curl_exec($chPesanan);
    curl_close($chPesanan);

    // Ambil data produk dari API produk
    $apiProdukUrl = 'http://localhost:8080/api/produk';
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

  public function create()
  {
    // dd($this->request->getVar());
    $this->pengirimanModel->save([
      'tanggal_pengiriman' => Time::now()->toDateString(),
      'tanggal_penerimaan' => null,
      'alamat_tujuan' => $this->request->getVar('alamat'),
      'status' => 'dikirim',
      'id_pesanan' => $this->request->getVar('id_pesanan'),
      'nama_penerima' => $this->request->getVar('nama_penerima'),
      'telepon_penerima' => $this->request->getVar('telepon_penerima'),
      'id_driver' => $this->request->getVar('id_driver'),
    ]);
  }

  public function detail($id = 0)
  {
    $pengiriman = $this->pengirimanModel
      ->join('driver', 'driver.id = pengiriman.id_driver', 'LEFT')
      ->select('pengiriman.*, driver.nama AS nama, driver.no_telepon AS no_telepon, driver.plat AS plat')
      ->find($id);
    // dd($pengiriman);
    $pesanan = current(array_filter($this->pesananList, function ($pesanan) use ($pengiriman) {
      return $pesanan['id_pesanan'] == $pengiriman['id_pesanan'];
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

    // Kembalikan data ke view
    $data = [
      'title' => 'Pengiriman',
      'pesanan' => $pesanan,
      'produk' => $produk,
      'pengiriman' => $pengiriman,
    ];

    return view('pengiriman/detail', $data);
  }

  public function changeStatus()
  {
    // dd($this->request->getVar());
    $id = $this->request->getVar('id');
    $this->pengirimanModel->save([
      'id' => $id,
      'status' => $this->request->getVar('status'),
    ]);
  }
}
