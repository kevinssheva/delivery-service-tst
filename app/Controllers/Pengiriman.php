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
      $this->pesananList = json_decode($responsePesanan, true)['data'];
      $this->produkList = json_decode($responseProduk, true)['data'];
    } else {
      echo 'Failed to fetch data from API.';
    }
  }

  public function index($id = 0): string
  {
    $pesanan = current(array_filter($this->pesananList, function ($pesanan) use ($id) {
      return $pesanan['id_pesanan'] == $id;
    }));

    if (!$pesanan) {
      return 'Pesanan dengan ID ' . $id . ' tidak ditemukan.';
    }

    $produkId = $pesanan['produk_id'];

    $produk = current(array_filter($this->produkList, function ($produk) use ($produkId) {
      return $produk['id'] == $produkId;
    }));

    if (!$produk) {
      return 'Produk dengan ID ' . $produkId . ' tidak ditemukan.';
    }

    $driverModel = new DriverModel();
    $drivers = $driverModel->findAll();

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

    $data = [
      'id_pesanan' => $this->request->getVar('id_pesanan'),
      'status_pengiriman' => 'dikirim',
    ];

    $response = $this->sendNotification($data);

    return redirect()->to('/pengiriman');
  }

  public function detail($id = 0)
  {
    $pengiriman = $this->pengirimanModel
      ->join('driver', 'driver.id = pengiriman.id_driver', 'LEFT')
      ->select('pengiriman.*, driver.nama AS nama, driver.no_telepon AS no_telepon, driver.plat AS plat')
      ->find($id);

    $pesanan = current(array_filter($this->pesananList, function ($pesanan) use ($pengiriman) {
      return $pesanan['id_pesanan'] == $pengiriman['id_pesanan'];
    }));

    if (!$pesanan) {
      return 'Pesanan dengan ID ' . $id . ' tidak ditemukan.';
    }

    $produkId = $pesanan['produk_id'];

    $produk = current(array_filter($this->produkList, function ($produk) use ($produkId) {
      return $produk['id'] == $produkId;
    }));

    if (!$produk) {
      return 'Produk dengan ID ' . $produkId . ' tidak ditemukan.';
    }

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
    $id = $this->request->getVar('id');
    $this->pengirimanModel->save([
      'id' => $id,
      'status' => $this->request->getVar('status'),
    ]);

    $id_pesanan = $this->pengirimanModel->find($id)['id_pesanan'];



    $data = [
      'id_pesanan' => $id_pesanan,
      'status_pengiriman' => $this->request->getVar('status'),
    ];

    $response = $this->sendNotification($data);

    //redirect back
    return redirect()->to('/pengiriman');
  }

  protected function sendNotification($data)
  {
    $apiUrl = 'http://localhost:8080/api/notifikasi/create';
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Content-Type: application/json',
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response ? $response : 'Gagal membuat notifikasi.';
  }

  public function deliveryList(): string
  {
    $data = [
      'title' => 'Daftar Pengiriman',
      'pengiriman' => $this->pengirimanModel->findAll()
    ];
    return view('pengiriman/listPengiriman', $data);
  }
}
