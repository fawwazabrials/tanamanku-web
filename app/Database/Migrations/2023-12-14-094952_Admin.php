<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'namaAdmin'     => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email'    => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('id');
        $this->forge->addUniqueKey('email');

        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
