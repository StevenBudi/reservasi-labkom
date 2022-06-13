<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReservasiLabkom extends Migration
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
            'peminjam' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'labkom' => [
                'type' => 'ENUM',
                'constraint' => ['rpl', 'mulmed', 'tkj']
            ],
            'waktu_peminjaman' => [
                'type' => 'DATETIME'
            ],
            'waktu_penggunaan' => [
                'type' => 'DATETIME'
            ],
            'waktu_akhir_penggunaan' => [
                'type' => 'DATETIME'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['finished', 'unfinished']
            ],
            'catatan' => [
                'type' => 'TEXT'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('reservasi_labkom');
    }

    public function down()
    {
        $this->forge->dropTable("reservasi_labkom");
    }
}
