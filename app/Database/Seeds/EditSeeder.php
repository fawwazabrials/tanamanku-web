<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EditSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'adminId'   => 1,
                'tanamanId' => 1,
                'createdAt' => '2021-01-01 00:00:00',
            ],
            [
                'adminId'   => 1,
                'tanamanId' => 2,
                'createdAt' => '2021-03-01 10:20:00',
            ],
            [
                'adminId'   => 2,
                'tanamanId' => 1,
                'createdAt' => '2023-02-02 20:00:00',
            ],
            [
                'adminId'   => 2,
                'tanamanId' => 2,
                'createdAt' => '2021-02-02 20:00:00',
            ],
            [
                'adminId'   => 2,
                'tanamanId' => 2,
                'createdAt' => '2023-02-02 10:00:00',
            ],
            [
                'adminId'   => 1,
                'tanamanId' => 1,
                'createdAt' => '2022-01-01 15:30:00',
            ],
            [
                'adminId'   => 2,
                'tanamanId' => 1,
                'createdAt' => '2022-03-15 08:45:00',
            ],
        ];
        $this->db->table('edit')->insertBatch($data);
    }
}
