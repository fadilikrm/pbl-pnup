<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        $data['total_harian'] = $this->ambilOmsetHarian();
        $data['total_bulanan'] = $this->ambilOmsetBulanan();
        $data['total_tahunan'] = $this->ambilOmsetTahunan();
        $data['produk_terlaris_harian'] = $this->ambilProdukHarian();
        $data['produk_terlaris_bulanan'] = $this->ambilProdukBulanan();
        $data['produk_terlaris_tahunan'] = $this->ambilProdukTahunan();
        return view('admin/dashboard', $data);
    }

    public function dashboardomsetharian(){
        $data['detail_harian'] = $this->ambilDetailOmsetHarian();
        return view('admin/dashboardomsetharian', $data);
    }
    public function dashboardomsetbulanan(){
        $data['detail_bulanan'] = $this->ambilDetailOmsetBulanan();
        return view('admin/dashboardomsetbulanan', $data);
    }
    public function dashboardomsettahunan(){
        $data['detail_tahunan'] = $this->ambilDetailOmsetTahunan();
        return view('admin/dashboardomsettahunan', $data);
    }
    public function dashboardprodukharian(){
        $data['detail_produk_terlaris_harian'] = $this->ambilDetailProdukHarian();
        return view('admin/dashboardprodukharian', $data);
    }
    public function dashboardprodukbulanan(){
        $data['detail_produk_terlaris_bulanan'] = $this->ambilDetailProdukBulanan();
        return view('admin/dashboardprodukbulanan', $data);
    }
    public function dashboardproduktahunan(){
        $data['detail_produk_terlaris_tahunan'] = $this->ambilDetailProdukTahunan();
        return view('admin/dashboardproduktahunan', $data);
    }

    private function ambilOmsetHarian()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL NilaiOmsetHarian(CURDATE())");
        return $query->getResult();
    }

    private function ambilOmsetBulanan()
    {
        $db = \Config\Database::connect();
        $currentMonthYear = date('Y-m');
        $query = $db->query("CALL NilaiOmsetBulanan('$currentMonthYear')");
        return $query->getResult();
    }

    private function ambilOmsetTahunan()
    {
        $db = \Config\Database::connect();
        $currentYear = date('Y');
        $query = $db->query("CALL NilaiOmsetTahunan($currentYear)");
        return $query->getResult();
    }

    private function ambilDetailOmsetHarian()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL NilaiOmsetHarianSemua()");
        return $query->getResult();
    }

    private function ambilDetailOmsetBulanan()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL NilaiOmsetBulananSemua()");
        return $query->getResult();
    }

    private function ambilDetailOmsetTahunan()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL NilaiOmsetTahunanSemua()");
        return $query->getResult();
    }

    private function ambilProdukHarian()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL ProdukTerlarisHarian(CURDATE())");
        return $query->getResult();
    }

    private function ambilProdukBulanan()
    {
        $db = \Config\Database::connect();
        $currentMonthYear = date('Y-m');
        $query = $db->query("CALL ProdukTerlarisBulanan('$currentMonthYear')");
        return $query->getResult();
    }

    private function ambilProdukTahunan()
    {
        $db = \Config\Database::connect();
        $currentYear = date('Y');
        $query = $db->query("CALL ProdukTerlarisTahunan($currentYear)");
        return $query->getResult();
    }

    private function ambilDetailProdukHarian()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL ProdukTerlarisHarianSemua()");
        return $query->getResult();
    }

    private function ambilDetailProdukBulanan()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL ProdukTerlarisBulananSemua()");
        return $query->getResult();
    }

    private function ambilDetailProdukTahunan()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL ProdukTerlarisTahunanSemua()");
        return $query->getResult();
    }
}
