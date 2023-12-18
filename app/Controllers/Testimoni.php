<?php

namespace App\Controllers;

use App\Models\TestimoniModel;

class Testimoni extends BaseController
{
    public function testimoni(){
        $testimoniModel = new TestimoniModel();
        $data['testimoniData'] = $testimoniModel->select('testimoni.*, pelanggan.nama_pelanggan, pelanggan.email, pelanggan.foto')
            ->join('pelanggan', 'pelanggan.id_pelanggan = testimoni.id_pelanggan')
            ->findAll();

        return view('admin/testimonimanajemen', $data);
    }

    public function testimonitambahstore()
    {

        // Ambil data dari formulir
        $judul = $this->request->getPost('judul');
        $deskripsi = $this->request->getPost('deskripsi');
        // Simpan data ke dalam tabel testimoni
        $testimoniModel = new TestimoniModel();
        $testimoniModel->save([
            'id_pelanggan' => session('id_pelanggan'), // Use the actual session variable that stores id_pelanggan
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'date' => date('Y-m-d H:i:s'),
        ]);

        // Redirect ke halaman testimoni atau halaman lain yang sesuai
        return redirect()->to('/');
    }

    public function testimonidestroy($id)
    {
        // Membuat instance dari model produkModel
        $model = new TestimoniModel();

        // Menghapus data produk berdasarkan ID
        $model->delete($id);

        // Redirect kembali ke halaman produk setelah menghapus
        return redirect()->to('/admin/testimoni');
    }


}
