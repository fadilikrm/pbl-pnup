<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class TransaksiController extends BaseController
{
    public function transaksi()
{
    $transaksiModel = new TransaksiModel();
    $detailTransaksiModel = new DetailTransaksiModel();
    $transaksiData = $transaksiModel->findAll();
    foreach ($transaksiData as &$transaksi) {
        $transaksi['detailTransaksi'] = $detailTransaksiModel->where('id_transaksi', $transaksi['id_transaksi'])->findAll();
    }
    $data['transaksi'] = $transaksiData;
    return view('/admin/transaksimanajemen', $data);
}

    public function transaksiedit($id)
    {
        $model = new TransaksiModel();
        $data['transaksi'] = $model->find($id);
        return view('/admin/transaksiedit', $data);
    }

    public function transaksieditstore()
    {
        $id_transaksi = $this->request->getPost('id_transaksi');
        $status_transaksi = $this->request->getPost('status_transaksi');
        $model = new TransaksiModel();
        $model->update($id_transaksi, [
            'status_transaksi' => $status_transaksi,
        ]);
        return redirect()->to('/admin/transaksi');
    }
    public function transaksidestroy($id)
    {
        $model = new TransaksiModel();
        $model->delete($id);
        return redirect()->to('/admin/transaksi');
    }
}
