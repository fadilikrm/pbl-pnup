<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail_transaksi' => [
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
            'id_transaksi' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'jumlah_pembelian' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'harga_satuan' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
            ],
            'total_harga_pembelian' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
            ],
        ]);
        $this->forge->addKey('id_detail_transaksi', true);
        $this->forge->addForeignKey('id_produk', 'produk', 'id_produk');
        $this->forge->addForeignKey('id_transaksi', 'transaksi', 'id_transaksi');
        $this->forge->createTable('detailtransaksi');
    }

    public function down()
    {
        $this->forge->dropTable('detailtransaksi');
    }
}