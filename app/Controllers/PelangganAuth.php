<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;

class PelangganAuth extends BaseController
{
    public function pelangganlogin()
    {
        return view('pelangganlogin');
    }

    public function pelangganpostlogin()
    {
        $model = new PelangganModel();

        $email = $this->request->getPost('email');
        $password =(string) $this->request->getPost('password');

        $pelanggan = $model->where('email', $email)
                          ->first();

        if ($pelanggan) {
            // Periksa apakah kata sandi sesuai
            if (password_verify($password, $pelanggan['password'])) {
                session()->start();
                $session = session();
                $session->set('pelanggan', true);
                $session->set('id_pelanggan', $pelanggan['id_pelanggan']);
                $session->set('nama_pelanggan', $pelanggan['nama_pelanggan']);
                $session->set('foto', $pelanggan['foto']);
                $session->set('alamat', $pelanggan['alamat']);
                $session->set('nomor_telepon', $pelanggan['nomor_telepon']);
                $session->set('email', $pelanggan['email']);

                return redirect()->to('/');
            }
        }

        return redirect()->to('/login');
    }

    public function pelangganlogout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }

    public function pelangganregister(){
        return view('pelangganregister');
    }

    public function pelanggansimpanregister() {
    $model = new PelangganModel();

    // Handle the file upload
    $file = $this->request->getFile('foto');
    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move('public/pelanggan/img', $newName);
    }

    $model->save([
        'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
        'foto' => $newName, // Save the new name of the uploaded file
        'alamat' => $this->request->getPost('alamat'),
        'nomor_telepon' => $this->request->getPost('nomor_telepon'),
        'email' => $this->request->getPost('email'),
        'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
    ]);

    return redirect()->to('/login');
    }
}

