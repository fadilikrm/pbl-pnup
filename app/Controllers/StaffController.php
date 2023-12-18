<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StaffModel;

class StaffController extends BaseController
{
    public function staff()
    {
        // Membuat instance dari model StaffModel
        $model = new StaffModel();

        // Mengambil data staff dari database
        $data['staff'] = $model->findAll();

        // Menampilkan view dengan membawa data staff
        return view('/admin/staffmanajemen', $data);
    }

    public function stafftambah()
    {
        return view('/admin/stafftambah');
    }

    public function staffedit($id)
    {
        // Membuat instance dari model StaffModel
        $model = new StaffModel();

        // Mengambil data staff berdasarkan ID
        $data['staff'] = $model->find($id);

        // Menampilkan view dengan membawa data staff
        return view('/admin/staffedit', $data);
    }


    public function staffeditstore()
{
    // Ambil data dari formulir
    $id_staff = $this->request->getPost('id_staff');
    $nama = $this->request->getPost('nama');
    $level = $this->request->getPost('level');
    $email = $this->request->getPost('email');

    // Siapkan array data untuk update
    $dataToUpdate = [
        'nama' => $nama,
        'level' => $level,
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
        $uploadDir = 'public/staff/img';

        // Handle the file upload
        $newName = $file->getRandomName();
        $file->move($uploadDir, $newName);

        // Tambahkan nama file baru ke array data
        $dataToUpdate['foto'] = $newName;
    }

    // Simpan data ke dalam database (gunakan model atau DB)
    $model = new StaffModel();
    $model->update($id_staff, $dataToUpdate);

    // Redirect kembali ke halaman staff setelah mengedit
    return redirect()->to('/admin/staff');
}

    
    public function stafftambahstore()
    {
        $model = new StaffModel();

        // Handle the file upload
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('public/staff/img', $newName);
        }

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'foto' => $newName, // Save the new name of the uploaded file
            'level' => $this->request->getPost('level'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/admin/staff');
    }

    public function staffdestroy($id)
    {
        // Membuat instance dari model StaffModel
        $model = new StaffModel();

        // Menghapus data staff berdasarkan ID
        $model->delete($id);

        // Redirect kembali ke halaman staff setelah menghapus
        return redirect()->to('/admin/staff');
    }
}
