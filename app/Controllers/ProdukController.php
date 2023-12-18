<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    public function produk()
    {
        $model = new ProdukModel();
        $data['produk'] = $model->findAll();
        return view('/admin/produkmanajemen', $data);
    }

    public function produktambah()
    {
        return view('/admin/produktambah');
    }

    public function produktambahstore()
    {
        $model = new ProdukModel();

        // Handle the file upload
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('public/produk/img', $newName);
        }

        $model->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'foto' => $newName, // Save the new name of the uploaded file
            'status' => $this->request->getPost('status'),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'harga' => $this->request->getPost('harga'),
        ]);

        return redirect()->to('/admin/produk');
    }

    public function produkdestroy($id)
    {
        // Membuat instance dari model produkModel
        $model = new ProdukModel();

        // Menghapus data produk berdasarkan ID
        $model->delete($id);

        // Redirect kembali ke halaman produk setelah menghapus
        return redirect()->to('/admin/produk');
    }

    public function produkedit($id)
    {
        // Membuat instance dari model produkModel
        $model = new ProdukModel();

        // Mengambil data produk berdasarkan ID
        $data['produk'] = $model->find($id);

        // Menampilkan view dengan membawa data produk
        return view('/admin/produkedit', $data);
    }


    public function produkeditstore()
    {
        // Ambil data dari formulir
        $id_produk = $this->request->getPost('id_produk');
        $nama_produk = $this->request->getPost('nama_produk');
        $deskripsi_produk = $this->request->getPost('deskripsi_produk');
        $harga = $this->request->getPost('harga');
        $status = $this->request->getPost('status');
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            // Tentukan direktori penyimpanan file
            $uploadDir = 'public/produk/img';

            // Handle the file upload
            $newName = $file->getRandomName();
            $file->move($uploadDir, $newName);

            // Simpan data ke dalam database (gunakan model atau DB)
            $model = new produkModel();
            $model->update($id_produk, [
                'nama_produk' => $nama_produk,
                'foto' => $newName,
                'deskripsi_produk' => $deskripsi_produk,
                'harga' => $harga,
                'status'=> $status, // Gunakan password yang sudah di-hash
                // ... (tambahkan kolom lainnya)
            ]);
        } else {
            // Jika tidak ada file yang diunggah, hanya update data tanpa mengubah foto
            $model = new produkModel();
            $model->update($id_produk, [
                'nama_produk' => $nama_produk,
                'deskripsi_produk' => $deskripsi_produk,
                'harga' => $harga,
                'status'=> $status, // Pertahankan nilai password jika tidak diisi
                // ... (tambahkan kolom lainnya)
            ]);
        }

        // Redirect kembali ke halaman produk setelah mengedit
        return redirect()->to('/admin/produk');
    }
}
