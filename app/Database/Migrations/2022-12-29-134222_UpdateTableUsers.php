<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTableUsers extends Migration
{
    public function up()
    {
        //
        $fields = array(
            'USER_ID' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique' => true
            ],
            'USER_NAME' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique' => true
            ],
        );
        $this->forge->modifyColumn('users', $fields);
    }

    public function down()
    {
        //
    }
}
