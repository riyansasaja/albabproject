<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbKredit extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_kredit'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 25
            ],
            'kredit_info'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'kredit_ballance'       => [
                'type'           => 'NUMERIC'
            ]

        ]);

        $this->forge->addKey('id_kredit', true);
        $this->forge->createTable('tb_kredit', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_kredit');
    }
}
