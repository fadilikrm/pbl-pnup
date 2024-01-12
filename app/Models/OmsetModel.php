<?php

namespace App\Models;

use CodeIgniter\Model;

class OmsetModel extends Model
{
    protected $table = 'omset';
    protected $primaryKey = 'id_omset';
    protected $allowedFields = ['id_produk','date', 'jumlah_beli_produk', 'total_harga_produk'];

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk', 'id_produk');
    }
}

