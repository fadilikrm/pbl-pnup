<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OmsetModel;
use App\Models\ProdukModel;

class Omset extends BaseController
{
    public function omset()
    {
        $omset = new OmsetModel();
        $data['omset'] = $omset->select('omset.*, produk.nama_produk, produk.harga, produk.foto')
            ->join('produk', 'produk.id_produk = omset.id_produk')
            ->findAll();

        return view('admin/omsetmanajemen', $data);
    }

    public function omsettambah()
    {
        $model = new ProdukModel();
        $data['produk'] = $model->findAll();
        $data['index'] = 0;
        return view('admin/omsettambah', $data);
    }

    public function omsettambahstore()
    {
        // Retrieve the values from the form
        $produkIds = $this->request->getPost('id_produk');
        $quantities = $this->request->getPost('jumlah_beli_produk');
        $date = $this->request->getPost('date');

        // Check if both arrays are not empty
        if (!empty($produkIds) && !empty($quantities) && is_string($date)) {
            $omsetModel = new OmsetModel();

            // Loop through the products and insert omset data
            foreach ($_POST['id_produk'] as $index => $productId) {
                $omsetModel->insert([
                    'id_produk' => $productId,
                    'jumlah_beli_produk' => $_POST['jumlah_beli_produk'][$index],
                    'date' => $date,
                    // Tambahkan field lain jika diperlukan
                ]);
            }

            $db = \Config\Database::connect(); // Get the database connection instance
            $db->query("CALL HitungTotalHargaProduk()");

            // Modifikasi pemanggilan stored procedure HitungTotalKeseluruhan() dengan memberikan tanggal sebagai parameter
            $tanggal_param = date('Y-m-d', strtotime($date)); // Ubah format tanggal sesuai kebutuhan
            $db->query("CALL HitungTotalKeseluruhan('$tanggal_param')");

            // Panggil stored procedures untuk bulanan dan tahunan
            $bulan_param = date('m', strtotime($date));
            $tahun_param = date('Y', strtotime($date));
            $db->query("CALL HitungTotalBulanan('$bulan_param', '$tahun_param')");
            $db->query("CALL HitungTotalTahunan('$tahun_param')");
        }

        // Redirect to the omset page or wherever you want
        return redirect()->to('/admin/omset');
    }

    public function Omsetedit($id)
    {
        $omsetModel = new OmsetModel();
        $data['omset'] = $omsetModel->select('omset.*, produk.nama_produk, produk.harga, produk.foto')
            ->join('produk', 'produk.id_produk = omset.id_produk')
            ->where('omset.id_omset', $id)
            ->first();

        // Pastikan bahwa kolom 'date' ada di dalam database dan diambil dengan benar
        if ($data['omset']) {
            $data['omset']['date'] = date('Y-m-d', strtotime($data['omset']['date']));
        }

        return view('admin/omsetedit', $data);
    }

    public function omseteditstore()
    {
        $omsetModel = new OmsetModel();
        $id = $this->request->getPost('id_omset');
        $date = $this->request->getPost('date');

        // Pastikan bahwa $date adalah string dan bukan null
        if (is_string($date)) {
            $tanggal_param = date('Y-m-d', strtotime($date));

            // Update data omset
            $omsetModel->update($id, [
                'date' => $date,
                'jumlah_beli_produk' => $this->request->getPost('jumlah_beli_produk'),
                // Tambahkan field lain jika diperlukan
            ]);

            // Panggil stored procedure untuk menghitung ulang total harga produk
            $db = \Config\Database::connect();
            $db->query("CALL HitungTotalHargaProduk()");

            // Panggil stored procedure untuk menghitung ulang total keseluruhan
            $db->query("CALL HitungTotalKeseluruhan('$tanggal_param')");

            // Panggil stored procedures untuk bulanan dan tahunan
            $bulan_param = date('m', strtotime($date));
            $tahun_param = date('Y', strtotime($date));
            $db->query("CALL HitungTotalBulanan('$bulan_param', '$tahun_param')");
            $db->query("CALL HitungTotalTahunan('$tahun_param')");
        } else {
            // Handle error jika $date bukan string atau null
            // ...
        }

        // Redirect ke halaman omset atau halaman lain yang diinginkan
        return redirect()->to('/admin/omset');
    }

    public function omsetdestroy($id)
    {
        $omsetModel = new OmsetModel();
        $db = \Config\Database::connect();

        // Dapatkan tanggal dari omset yang akan dihapus untuk digunakan dalam stored procedure
        $omset = $omsetModel->find($id);
        $tanggal_param = date('Y-m-d', strtotime($omset['date']));

        // Hapus omset
        $omsetModel->delete($id);

        // Panggil stored procedure untuk menghitung ulang total harga produk
        $db->query("CALL HitungTotalHargaProduk()");

        // Panggil stored procedure untuk menghitung ulang total keseluruhan
        $db->query("CALL HitungTotalKeseluruhan('$tanggal_param')");

        // Panggil stored procedures untuk bulanan dan tahunan
        $bulan_param = date('m', strtotime($tanggal_param));
        $tahun_param = date('Y', strtotime($tanggal_param));
        $db->query("CALL HitungTotalBulanan('$bulan_param', '$tahun_param')");
        $db->query("CALL HitungTotalTahunan('$tahun_param')");

        // Redirect ke halaman omset atau halaman lain yang diinginkan
        return redirect()->to('/admin/omset');
    }
}
