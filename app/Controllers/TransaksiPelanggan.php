<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class TransaksiPelanggan extends BaseController
{
    public function transaksitambahstore()
    {
        $namaPelanggan = $this->request->getPost('nama_pelanggan');
        $alamat = $this->request->getPost('alamat');
        $nomorTelepon = $this->request->getPost('nomor_telepon');
        $email = $this->request->getPost('email');
        $catatanPesanan = $this->request->getPost('catatan');
        $dataToRecord = session()->get('dataToRecord') ?? [];
        $totalHarga = array_sum(array_column($dataToRecord, 'total'));
        $idPelanggan = session()->get('id_pelanggan');
        $transaksiData = [
            'id_pelanggan' => $idPelanggan,
            'nama_pelanggan' => $namaPelanggan,
            'nomor_telepon' => $nomorTelepon,
            'alamat' => $alamat,
            'email' => $email,
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'total_harga' => $totalHarga,
            'catatan' => $catatanPesanan,
            'status_transaksi' => 'Belum Diproses',
        ];

        $detailTransaksiData = [];
        foreach ($dataToRecord as $record) {
            $detailTransaksiData[] = [
                'id_produk' => $record['id_produk'],
                'nama_produk' => $record['nama_produk'],
                'jumlah_pembelian' => $record['jumlah_pembelian'],
                'harga_satuan' => $record['harga'],
                'total_harga_pembelian' => $record['total'],
            ];
        }
        $transaksiModel = new TransaksiModel();
        $detailTransaksiModel = new DetailTransaksiModel();
        $transaksiId = $transaksiModel->insert($transaksiData);
        foreach ($detailTransaksiData as &$detail) {
            $detail['id_transaksi'] = $transaksiId;
        }

        $detailTransaksiModel->insertBatch($detailTransaksiData);
        return redirect()->to('/riwayat');
    }

    public function riwayat()
    {
        $session = session();
        if (!$session->get('id_pelanggan')) {
            return redirect()->to('/login');
        }
        $id_pelanggan = $session->get('id_pelanggan');
        $transaksiModel = new TransaksiModel();
        $detailTransaksiModel = new DetailTransaksiModel();
        $transaksiData = $transaksiModel->where('id_pelanggan', $id_pelanggan)->findAll();
        foreach ($transaksiData as &$transaksi) {
            $transaksi['detailTransaksi'] = $detailTransaksiModel->where('id_transaksi', $transaksi['id_transaksi'])->findAll();
        }
        $data['transaksi'] = $transaksiData;
        return view('/riwayat', $data);
    }

    public function riwayatedit($id)
    {
        $transaksiModel = new TransaksiModel();
        $transaksi = $transaksiModel->find($id);

        $data = [
            'transaksi' => $transaksi,
        ];

        return view('/riwayatedit', $data);
    }

    public function riwayateditstore()
    {
        $id_transaksi = $this->request->getPost('id_transaksi');
        $namaPelanggan = $this->request->getPost('nama_pelanggan');
        $alamat = $this->request->getPost('alamat');
        $nomorTelepon = $this->request->getPost('nomor_telepon');
        $email = $this->request->getPost('email');
        $catatanPesanan = $this->request->getPost('catatan');
        $transaksiModel = new TransaksiModel();
        $transaksiModel->update($id_transaksi, [
            'nama_pelanggan' => $namaPelanggan,
            'alamat' => $alamat,
            'nomor_telepon' => $nomorTelepon,
            'email' => $email,
            'catatan' => $catatanPesanan,
        ]);

        return redirect()->to('/riwayat');
    }


    public function riwayatdestroy($id)
    { {
            $model = new TransaksiModel();
            $model->delete($id);
            return redirect()->to('/riwayat');
        }
    }
}
