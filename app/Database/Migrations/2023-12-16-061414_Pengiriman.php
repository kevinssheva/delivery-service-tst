<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengiriman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal_pengiriman' => [
                'type' => 'DATE',
            ],
            'tanggal_penerimaan' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'alamat_tujuan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['dikirim', 'diterima', 'diselesaikan'],
                'default' => 'dikirim',
            ],
            'id_pesanan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'nama_penerima' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('pengiriman');
    }

    public function down()
    {
        $this->forge->dropTable('pengiriman');
    }
}
