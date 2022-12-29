<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up() {
        $this->forge->addField([
            'ID' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'USER_ID' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'USER_NAME' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'PASSWORD' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'USER_RANK' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'EMAIL' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'CREATED_AT timestamp NOT NULL default current_timestamp',
            'UPDATED_AT timestamp NOT NULL default current_timestamp',
            'DELETED_AT timestamp NULL default NULL'
        ]);
        $this->forge->addKey('ID', true);
        $this->forge->createTable('users');
    }

    public function down() {
        $this->forge->dropTable('users');
    }
}
