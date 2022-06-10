<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Labkom extends Migration
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
            'labkom' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'pc' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'meja' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'kursi' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'papan tulis' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'penghapus' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'kabel VGA' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('laboratorium');
    }

    public function down()
    {
        //
    }
}
