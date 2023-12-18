<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GaleriFotoModel;

class GaleriFoto extends BaseController
{
    public function galerifoto()
    {
        $model = new GaleriFotoModel();
        $data['galerifoto'] = $model->findAll();
        return view('/admin/galerifotomanajemen', $data);
    }

    public function galerifototambah()
    {
        return view('/admin/galerifototambah');
    }

    public function galerifototambahstore()
    {
        $model = new GaleriFotoModel();

        // Handle the file upload
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('public/galerifoto/img', $newName);
        }

        $model->save([
            'nama_foto' => $this->request->getPost('nama_foto'),
            'foto' => $newName, // Save the new name of the uploaded file
            'deskripsi_foto' => $this->request->getPost('deskripsi_foto'),
        ]);

        return redirect()->to('/admin/galerifoto');
    }

    public function galerifotodestroy($id)
    {
        // Membuat instance dari model galerifotoModel
        $model = new GaleriFotoModel();

        // Menghapus data galerifoto berdasarkan ID
        $model->delete($id);

        // Redirect kembali ke halaman galerifoto setelah menghapus
        return redirect()->to('/admin/galerifoto');
    }

    public function galerifotoedit($id)
    {
        // Membuat instance dari model galerifotoModel
        $model = new GaleriFotoModel();

        // Mengambil data galerifoto berdasarkan ID
        $data['galerifoto'] = $model->find($id);

        // Menampilkan view dengan membawa data galerifoto
        return view('/admin/galerifotoedit', $data);
    }


    public function galerifotoeditstore()
{
    // Ambil data dari formulir
    $id_foto = $this->request->getPost('id_foto');
    $nama_foto = $this->request->getPost('nama_foto');
    $deskripsi_foto = $this->request->getPost('deskripsi_foto');
    $file = $this->request->getFile('foto');

    // Initialize the model
    $model = new GaleriFotoModel();

    // Check if a new file is uploaded
    if ($file->isValid() && !$file->hasMoved()) {
        // Handle the file upload
        $uploadDir = 'public/galerifoto/img';
        $newName = $file->getRandomName();
        $file->move($uploadDir, $newName);

        // Update data with the new file
        $model->update($id_foto, [
            'nama_foto' => $nama_foto,
            'foto' => $newName,
            'deskripsi_foto' => $deskripsi_foto,
        ]);
    } else {
        // Update data without changing the file
        $model->update($id_foto, [
            'nama_foto' => $nama_foto,
            'deskripsi_foto' => $deskripsi_foto,
        ]);
    }

    // Redirect back to the galerifoto page after editing
    return redirect()->to('/admin/galerifoto');
}

}

