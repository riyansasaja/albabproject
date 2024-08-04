<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKas extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_kas'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'tgl'       => [
                'type'           => 'DATE',
                'null'          => true
            ],
            'uraian'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => true
            ],
            'debit'       => [
                'type'           => 'DECIMAL',
                'constraint'     => 20, 6,
                'default'       => 0.000000
            ],
            'kredit'       => [
                'type'           => 'DECIMAL',
                'constraint'     => 20, 6,
                'default'       => 0.000000
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'


        ]);

        $this->forge->addKey('id_kas', true);
        $this->forge->createTable('tb_arus_kas', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_arus_kas');
    }
}
