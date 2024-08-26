<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbMenuAccess extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'auth_group_id'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'menu_id'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0]

        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('auth_group_id', 'auth_groups', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('menu_id', 'tb_menu', 'id', '', 'CASCADE');
        $this->forge->createTable('tb_menu_access', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_menu_access');
    }
}
