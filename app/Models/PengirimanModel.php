<?php

namespace App\Models;

use CodeIgniter\Model;

class PengirimanModel extends Model
{
  protected $table = 'pengiriman';
  protected $useTimestamps = true;
  protected $allowedFields = ['tanggal_pengiriman', 'tanggal_penerimaan', 'alamat_tujuan', 'status', 'id_pesanan', 'nama_penerima'];
}
