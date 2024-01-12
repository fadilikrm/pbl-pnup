<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Omset extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_omset' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_produk' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'jumlah_beli_produk' => [
                'type' => 'INT',
                'constraint' => 15,
            ],
            'total_harga_produk' => [
                'type' => 'INT',
                'constraint' => 15,
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
        $this->forge->addKey('id_omset', true);
        $this->forge->addForeignKey('id_produk', 'produk', 'id_produk');
        $this->forge->createTable('omset');
    }

    public function down()
    {
        $this->forge->dropTable('omset');
    }
}
