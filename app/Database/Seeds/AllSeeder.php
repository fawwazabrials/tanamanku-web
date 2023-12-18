<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call('AdminSeeder');
        $this->call('TanamanSeeder');
        $this->call('EditSeeder');
        $this->call('RequestsSeeder');
    }
}
