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
        'password' => 'e00cf25ad42683b3df678c61f42c6bda',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'username' => 'admin2',
        'password' => 'c84258e9c39059a89ab77d846ddab909',
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
