<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GaleriFoto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_foto' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_foto', true);
        $this->forge->createTable('galeri_foto');
    }

    public function down()
    {
        $this->forge->dropTable('galeri_foto');
    }
}
