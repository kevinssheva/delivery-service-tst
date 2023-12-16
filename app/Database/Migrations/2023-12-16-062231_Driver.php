<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Driver extends Migration
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
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'plat' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('driver');
    }

    public function down()
    {
        $this->forge->dropTable('driver');
    }
}
