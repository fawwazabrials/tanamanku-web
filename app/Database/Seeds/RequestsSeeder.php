<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RequestsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_requester' => 'John Doe',
                'quantity' => 5,
                'status' => 'pending',
                'tanamanId' => 1,
            ],
            [
                'nama_requester' => 'Jane Doe',
                'quantity' => 3,
                'status' => 'accepted',
                'tanamanId' => 2,
            ],
            [
                'nama_requester' => 'Bob Smith',
                'quantity' => 2,
                'status' => 'rejected',
                'tanamanId' => 3,
            ],
            [
                'nama_requester' => 'Alice Johnson',
                'quantity' => 1,
                'status' => 'pending',
                'tanamanId' => 4,
            ],
            [
                'nama_requester' => 'Charlie Brown',
                'quantity' => 4,
                'status' => 'accepted',
                'tanamanId' => 5,
            ],
        ];

        $this->db->table('requests')->insertBatch($data);
    }
}
