<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Edit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'adminId'   => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'tanamanId' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'createdAt' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => Time::now('Asia/Jakarta', 'en_US'),
            ],
        ]);

        $this->forge->addKey(['adminId', 'tanamanId']);
        $this->forge->addForeignKey('adminId', 'admin', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tanamanId', 'tanaman', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('edit');
    }

    public function down()
    {
        $this->forge->dropTable('edit');
    }
}
