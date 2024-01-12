<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table = 'detailtransaksi';
    protected $primaryKey = 'id_detail_transaksi';
    protected $allowedFields = [
        'id_produk',
        'id_transaksi',
        'jumlah_pembelian',
        'total_harga_pembelian'
    ];


    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk','id_produk');
    }

    public function transaksi()
    {
        return $this->belongsTo(TransaksiModel::class, 'id_transaksi','id_transaksi');
    }
}

