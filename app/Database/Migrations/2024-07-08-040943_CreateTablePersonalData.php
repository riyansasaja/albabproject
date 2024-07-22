<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePersonalData extends Migration
{
    public function up()
    {
        //table personal data
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'            => ['type' => 'int', 'constraint' => 11],
            'jenis_kelamin'         => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
            'asal_sekolah'         => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'cita-cita'         => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'motivasi'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'ukuran_baju'         => ['type' => 'varchar', 'constraint' => 10, 'null' => true],
            'nomor_telpon'         => ['type' => 'varchar', 'constraint' => 18, 'null' => true],
            'nomor_telpon_ortu'         => ['type' => 'varchar', 'constraint' => 18, 'null' => true],
            'pengalaman'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'aktivitas'         => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'opbdh'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'nm'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'bi'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'smpad'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'stmdka'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'apypbdha'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'kytt'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'amtad'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],

        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('personal_data', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('personal_data');
    }
}
