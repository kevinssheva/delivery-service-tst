<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengirimanSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'tanggal_pengiriman' => '2023-12-15',
        'tanggal_penerimaan' => null,
        'alamat_tujuan' => 'Jl. Contoh No. 123',
        'status' => 'dikirim',
        'id_pesanan' => 1,
        'nama_penerima' => 'John Doe',
      ],
      [
        'tanggal_pengiriman' => '2023-12-16',
        'tanggal_penerimaan' => '2023-12-17',
        'alamat_tujuan' => 'Jl. Contoh No. 456',
        'status' => 'diterima',
        'id_pesanan' => 2,
        'nama_penerima' => 'Jane Doe',
      ],
      [
        'tanggal_pengiriman' => '2023-12-18',
        'tanggal_penerimaan' => null,
        'alamat_tujuan' => 'Jl. Contoh No. 789',
        'status' => 'dikirim',
        'id_pesanan' => 3,
        'nama_penerima' => 'Bob Smith',
      ],
    ];

    // Simple Queries
    $this->db->table('pengiriman')->insertBatch($data);
  }
}
