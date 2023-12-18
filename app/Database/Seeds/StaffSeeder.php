<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run()
    {
        $staffData = [
            [
                'nama' => 'Admin1',
                'email' => 'Admin1@example.com',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'level' => 'admin',
            ],
            // Tambahkan data staff lainnya sesuai kebutuhan
        ];

        // Insert data staff ke dalam tabel staff
        $this->db->table('staff')->insertBatch($staffData);
    }
}
