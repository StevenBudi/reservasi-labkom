<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Member extends Migration
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

            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 16
            ],

            'alamat' => [
                'type' => 'TEXT'
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            'status' => [
                'type' => 'ENUM',
                'constraint' => ['member_uns', 'member', 'admin'],
                'default' => 'member'
            ],

            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('member');
    }

    public function down()
    {
        //
    }
}
