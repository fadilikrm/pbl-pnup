<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_pelanggan',
        'nama_pelanggan',
        'tanggal_transaksi',
        'total_harga',
        'metode_pembayaran',
        'status_transaksi'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(PelangganModel::class, 'id_pelanggan','id_pelanggan');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksiModel::class,'id_detail_transaksi','id_detail_transaksi');
    }
}

