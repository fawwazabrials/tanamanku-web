<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'namaAdmin'     => 'Admin 1',
                'email'    => 'admin1@example.com',
                'password' => md5('admin123')
            ],
            [
                'namaAdmin'     => 'Admin 2',
                'email'    => 'admin2@example.com',
                'password' => md5('admin123')
            ],
            // Add more admin data as needed
        ];

        $this->db->table('admin')->insertBatch($data);
    }
}
