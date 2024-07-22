<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class CreateTbMenu extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_menu'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'routes'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'icon'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],

        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_menu', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_menu');
    }
}
