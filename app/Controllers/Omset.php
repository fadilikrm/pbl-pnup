<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OmsetModel;
use App\Models\ProdukModel;
use \Config\Database;

class Omset extends BaseController
{
    public function omset()
    {
        $omsetModel = new OmsetModel();
        $data['omset'] = $omsetModel
            ->select('omset.*, produk.nama_produk')
            ->join('produk', 'produk.id_produk = omset.id_produk')
            ->findAll();

        $data['detail_harian'] = $this->getOmsetHarian();

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
        $produkIds = $this->request->getPost('id_produk');
        $quantities = $this->request->getPost('jumlah_beli_produk');
        $date = $this->request->getPost('date');

        if (!empty($produkIds) && !empty($quantities) && is_string($date)) {
            $omsetModel = new OmsetModel();

            foreach ($_POST['id_produk'] as $index => $productId) {
                $omsetModel->insert([
                    'id_produk' => $productId,
                    'jumlah_beli_produk' => $_POST['jumlah_beli_produk'][$index],
                    'date' => $date,
                ]);
            }

            // Panggil stored procedure HitungTotalHargaProduk
            $db = Database::connect();
            $db->query("CALL HitungTotalHargaProduk()");
        }

        return redirect()->to('/admin/omset');
    }

    public function omsetedit($id)
    {
        $omsetModel = new OmsetModel();
        $data['omset'] = $omsetModel->select('omset.*, produk.nama_produk, produk.harga, produk.foto')
            ->join('produk', 'produk.id_produk = omset.id_produk')
            ->where('omset.id_omset', $id)
            ->first();

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

        if (is_string($date)) {
            $omsetModel->update($id, [
                'date' => $date,
                'jumlah_beli_produk' => $this->request->getPost('jumlah_beli_produk'),
            ]);

            // Panggil stored procedure HitungTotalHargaProduk
            $db = Database::connect();
            $db->query("CALL HitungTotalHargaProduk()");
        }

        return redirect()->to('/admin/omset');
    }

    public function omsetdestroy($id)
    {
        $omsetModel = new OmsetModel();
        $omsetModel->delete($id);

        // Panggil stored procedure HitungTotalHargaProduk
        $db = Database::connect();
        $db->query("CALL HitungTotalHargaProduk()");

        return redirect()->to('/admin/omset');
    }

    private function getOmsetHarian()
    {
        $db = Database::connect();
        $query = $db->query("CALL NilaiOmsetHarianSemua()");
        return $query->getResult();
    }
}
