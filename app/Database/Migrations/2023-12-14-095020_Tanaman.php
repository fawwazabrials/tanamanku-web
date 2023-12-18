<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Tanaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'deskripsi'    => [
                'type'       => 'TEXT',
            ],
            'namaTanaman'          => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'soil_moisture' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,1',
                'default'   => 0,
            ],
            'temperature'   => [
                'type'       => 'DECIMAL',
                'constraint' => '5,1',
                'default'   => 0,
            ],
            'humidity'      => [
                'type'       => 'DECIMAL',
                'constraint' => '5,1',
                'default'   => 0,
            ],
            'ph_level'      => [
                'type'       => 'DECIMAL',
                'constraint' => '5,1',
                'default'   => 0,
            ],
            'quality'      => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default'   => 'unknown',
            ],
            'last_reading'  => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => Time::now('Asia/Jakarta', 'en_US'),
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default'   => 'default.jpg',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('id');
        $this->forge->createTable('tanaman');
    }

    public function down()
    {
        $this->forge->dropTable('tanaman');
    }
}
