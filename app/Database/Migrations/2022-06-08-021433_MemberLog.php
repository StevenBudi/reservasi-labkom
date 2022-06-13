<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MemberLog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'action' => [
                'type' => 'ENUM',
                'constraint' => ['login', 'update', 'logout', 'delete']
            ],
            'ip' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('member_log');
    }

    public function down()
    {
        $this->forge->dropTable("member_log");
    }
}
