<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbBayar extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'   => ['type' => 'int'],
            'date'      => ['type' => 'date'],
            'jmlh_bayar' => ['type' => 'decimal', 'constraint' => 10],
            'log'       => ['type' => 'int'],
            'status' => ['type' => 'int', 'constraint' => 2]

        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_bayar', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_bayar');
    }
}
