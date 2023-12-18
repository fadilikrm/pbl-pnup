<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class KeranjangController extends BaseController
{
    public function keranjangtambahstore()
    {
        $produkModel = new ProdukModel();
        $produk = $produkModel->findAll();
        $dataToRecord = [];
        foreach ($produk as $pr) {
            $quantityInput = $this->request->getPost('quantity_' . $pr['id_produk']);
            if ($quantityInput >= 1) {
                $dataToRecord[] = [
                    'id_produk' => $pr['id_produk'],
                    'nama_produk' => $pr['nama_produk'],
                    'foto' => $pr['foto'],
                    'harga' => $pr['harga'],
                    'jumlah_pembelian' => $quantityInput,
                    'total' => $quantityInput * $pr['harga'],
                ];
            }
        }
        session()->set('dataToRecord', $dataToRecord);

        return redirect()->to('/checkout');
    }
}
