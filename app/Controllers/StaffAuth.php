<?php

namespace App\Controllers;

use App\Models\StaffModel;
use App\Controllers\BaseController;

class StaffAuth extends BaseController
{
    public function adminlogin()
    {
        return view('adminlogin');
    }

    public function adminpostlogin()
    {
        $model = new StaffModel();
        $email = $this->request->getPost('email');
        $password =(string) $this->request->getPost('password');
        $staff = $model->where('email', $email)
                       ->first();
        if ($staff) {
            // Periksa apakah kata sandi sesuai
            if (password_verify($password, $staff['password'])) {
                session()->start();
                $session = session();
                $session->set('staff', true);
                $session->set('id_staff', $staff['id_staff']);
                $session->set('nama', $staff['nama']);
                $session->set('level', $staff['level']);
                $session->set('foto', $staff['foto']);
                $session->set('email', $staff['email']);
                return redirect()->to('/admin/dashboard');
            }
        }

        return redirect()->to('/admin/login');
    }

    public function adminlogout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/admin/login');
    }
}
