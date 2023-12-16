<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DriverSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'nama' => 'John Doe',
        'no_telepon' => '08123456789',
        'plat' => 'B 1234 CD',
      ],
      [
        'nama' => 'Jane Doe',
        'no_telepon' => '08234567890',
        'plat' => 'A 5678 EF',
      ],
      [
        'nama' => 'Bob Smith',
        'no_telepon' => '08345678901',
        'plat' => 'C 9101 GH',
      ],
    ];

    // Simple Queries
    $this->db->table('driver')->insertBatch($data);
  }
}
