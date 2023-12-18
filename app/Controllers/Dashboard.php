<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OmsetModel;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        $omsetModel = new OmsetModel();
        
        // Mendapatkan bulan dan tahun saat ini
        $bulanSekarang = date('m');
        $tahunSekarang = date('Y');
        
        // Query untuk mendapatkan total bulanan dan tahunan saat ini
        $totalBulanan = $omsetModel->selectSum('total_harga_produk')
                                    ->where('MONTH(date)', $bulanSekarang)
                                    ->where('YEAR(date)', $tahunSekarang)
                                    ->first();
                                    
        $totalTahunan = $omsetModel->selectSum('total_harga_produk')
                                    ->where('YEAR(date)', $tahunSekarang)
                                    ->first();
        
        // Menyiapkan data untuk dikirim ke view
        $data = [
            'total_bulanan' => $totalBulanan['total_harga_produk'],
            'total_tahunan' => $totalTahunan['total_harga_produk']
        ];
        
        // Memanggil view dan mengirimkan data
        return view('/admin/dashboard', $data);
    }
}
