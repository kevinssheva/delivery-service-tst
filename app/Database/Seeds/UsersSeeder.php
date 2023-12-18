<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UsersSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'username' => 'admin1',
        'password' => 'admin1',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'username' => 'admin2',
        'password' => 'admin2',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
    ];

    // Simple Queries
    // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

    // Using Query Builder
    $this->db->table('user')->insertBatch($data);
  }
}
