<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peserta extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'presensi_id'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'nim'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'tanggal'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'created_at datetime default current_timestamp',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('peserta');
		// $this->forge->dropTable('peserta');
	}

	public function down()
	{
		//
		// $this->forge->dropTable('peserta');

	}
}
