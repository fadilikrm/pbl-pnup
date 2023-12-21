<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OmsetModel;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        $omsetModel = new OmsetModel();
        $bulanSekarang = date('m');
        $tahunSekarang = date('Y');
        $totalBulanan = $omsetModel->selectSum('total_harga_produk')
            ->where('MONTH(date)', $bulanSekarang)
            ->where('YEAR(date)', $tahunSekarang)
            ->first();
        $totalTahunan = $omsetModel->selectSum('total_harga_produk')
            ->where('YEAR(date)', $tahunSekarang)
            ->first();
        $db = db_connect();
        $db->query('CALL getTotalTransaksi()');
        $totalTransaksi = $db->query('SELECT @totalTransaksi as total_transaksi')->getRow()->total_transaksi;
        $data = [
            'total_bulanan' => $totalBulanan['total_harga_produk'],
            'total_tahunan' => $totalTahunan['total_harga_produk'],
            'total_transaksi' => $totalTransaksi,
        ];
        return view('/admin/dashboard', $data);
    }
}
