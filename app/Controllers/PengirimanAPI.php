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
  public function getAllPengiriman()
  {
    try {
      $pengiriman = $this->pengirimanModel->findAll();

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
