<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTableUsers extends Migration
{
    public function up()
    {
        //
        $fields = array(
            'USER_RANK' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default' => 'COMMON'
            ],
        );
        $this->forge->modifyColumn('users', $fields);
    }

    public function down()
    {
        //
    }
}
