<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;

class PelangganController extends BaseController
{
    public function pelanggan()
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->findAll();
        return view('/admin/pelangganmanajemen', $data);
    }

    public function pelanggantambah()
    {
        return view('/admin/pelanggantambah');
    }

    public function pelanggantambahstore()
    {
        $model = new PelangganModel();

        // Handle the file upload
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('public/pelanggan/img', $newName);
        }

        $model->save([
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'foto' => $newName,
            'role' => 'pelanggan',
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/admin/pelanggan');
    }

    public function pelangganedit($id)
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->find($id);
        return view('/admin/pelangganedit', $data);
    }

    public function pelangganeditprofile($id)
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->find($id);
        return view('/pelangganeditprofile', $data);
    }

    public function pelangganeditprofilestore()
    {
        // Ambil data dari formulir
        $id_pelanggan = $this->request->getPost('id_pelanggan');
        $nama_pelanggan = $this->request->getPost('nama_pelanggan');
        $alamat = $this->request->getPost('alamat');
        $nomor_telepon = $this->request->getPost('nomor_telepon');
        $email = $this->request->getPost('email');
    
        // Cek apakah ada file yang diunggah
        $file = $this->request->getFile('foto');
    
        // Siapkan array data untuk update
        $dataToUpdate = [
            'nama_pelanggan' => $nama_pelanggan,
            'alamat' => $alamat,
            'nomor_telepon' => $nomor_telepon,
            'email' => $email,
            // ... (tambahkan kolom lainnya)
        ];
    
        // Cek apakah password baru diisi dalam form
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            // Jika diisi, hash password baru dan tambahkan ke array data
            $dataToUpdate['password'] = password_hash((string) $newPassword, PASSWORD_DEFAULT);
        }
    
        if ($file->isValid() && !$file->hasMoved()) {
            // Tentukan direktori penyimpanan file
            $uploadDir = 'public/pelanggan/img';
    
            // Handle the file upload
            $newName = $file->getRandomName();
            $file->move($uploadDir, $newName);
    
            // Tambahkan nama file baru ke array data
            $dataToUpdate['foto'] = $newName;
        }
    
        // Simpan data ke dalam database (gunakan model atau DB)
        $model = new PelangganModel();
        $model->update($id_pelanggan, $dataToUpdate);
    
        // Redirect kembali ke halaman pelanggan setelah mengedit
        return redirect()->to('/');
    }
    

    public function pelangganeditstore()
    {
        // Ambil data dari formulir
        $id_pelanggan = $this->request->getPost('id_pelanggan');
        $nama_pelanggan = $this->request->getPost('nama_pelanggan');
        $alamat = $this->request->getPost('alamat');
        $nomor_telepon = $this->request->getPost('nomor_telepon');
        $email = $this->request->getPost('email');
    
        // Siapkan array data untuk update
        $dataToUpdate = [
            'nama_pelanggan' => $nama_pelanggan,
            'alamat' => $alamat,
            'nomor_telepon' => $nomor_telepon,
            'email' => $email,
            // ... (tambahkan kolom lainnya)
        ];
    
        // Cek apakah password baru diisi dalam form
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            // Jika diisi, hash password baru dan tambahkan ke array data
            $dataToUpdate['password'] = password_hash((string) $newPassword, PASSWORD_DEFAULT);
        }
    
        // Cek apakah ada file yang diunggah
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            // Tentukan direktori penyimpanan file
            $uploadDir = 'public/pelanggan/img';
    
            // Handle the file upload
            $newName = $file->getRandomName();
            $file->move($uploadDir, $newName);
    
            // Tambahkan nama file baru ke array data
            $dataToUpdate['foto'] = $newName;
        }
    
        // Simpan data ke dalam database (gunakan model atau DB)
        $model = new PelangganModel();
        $model->update($id_pelanggan, $dataToUpdate);
    
        // Redirect kembali ke halaman pelanggan setelah mengedit
        return redirect()->to('/admin/pelanggan');
    }
    

    public function pelanggandestroy($id)
    {
        $model = new PelangganModel();
        $model->delete($id);
        return redirect()->to('/admin/pelanggan');
    }
}
