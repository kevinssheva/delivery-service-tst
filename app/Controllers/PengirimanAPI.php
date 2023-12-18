<?php

namespace App\Controllers;

use App\Models\PengirimanModel;

class PengirimanAPI extends BaseController
{
  protected $pengirimanModel;

  public function __construct()
  {
    $this->pengirimanModel = new PengirimanModel();
  }
  public function getAllPengirimanStatus()
  {
    try {
      $pengiriman = $this->pengirimanModel->select('status, id_pesanan')->findAll();

      $response = [
        'status' => 'success',
        'data' => $pengiriman,
      ];

      return $this->response->setJSON($response);
    } catch (\Exception $e) {
      $response = [
        'status' => 'error',
        'message' => 'An error occurred',
      ];

      return $this->response->setStatusCode(500)->setJSON($response);
    }
  }

  public function getPengirimanByPesanan($id_pesanan)
  {
    try {
      $pengiriman = $this->pengirimanModel->where('id_pesanan', $id_pesanan)->first();

      if (!$pengiriman) {
        $response = [
          'status' => 'error',
          'message' => 'Pengiriman not found',
        ];

        return $this->response->setStatusCode(404)->setJSON($response);
      }

      $response = [
        'status' => 'success',
        'data' => $pengiriman,
      ];

      return $this->response->setJSON($response);
    } catch (\Exception $e) {
      $response = [
        'status' => 'error',
        'message' => 'An error occurred',
      ];

      return $this->response->setStatusCode(500)->setJSON($response);
    }
  }
}
