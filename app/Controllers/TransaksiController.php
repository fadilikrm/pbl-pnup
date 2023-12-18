<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class TransaksiController extends BaseController

{
    public function checkout()
    {
        $session = session();
        $data['nama_pelanggan'] = $session->get('nama_pelanggan');
        $data['alamat'] = $session->get('alamat');
        $data['nomor_telepon'] = $session->get('nomor_telepon');
        $data['email'] = $session->get('email');
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();
        $dataToRecord = session()->get('dataToRecord') ?? [];
        $data['dataToRecord'] = $dataToRecord;

        return view('checkout', $data);
    }
}
