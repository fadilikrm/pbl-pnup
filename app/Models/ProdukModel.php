<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['nama_produk', 'harga', 'foto', 'deskripsi_produk', 'status'];

    public function omset()
    {
        return $this->hasMany(OmsetModel::class, 'id_produk', 'id_produk');
    }

    public function detailtransaksi()
    {
        return $this->hasMany(DetailTransaksiModel::class, 'id_detail_transaksi', 'id_detail_transaksi');
    }


}
