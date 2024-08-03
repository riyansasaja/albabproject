<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbDebet extends Migration
{
    public function up()
    {
        //


        $this->forge->addField([
            'id_debet'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 25
            ],
            'debet_info'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'debet_ballance'       => [
                'type'           => 'NUMERIC'
            ]

        ]);

        $this->forge->addKey('id_debet', true);
        $this->forge->createTable('tb_debet', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_debet');
    }
}
