<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelajar extends Migration
{
	public function up() {
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'tingkat'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'created_at datetime default current_timestamp',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pelajar');
	}

	public function down()
	{
		//
		$this->forge->dropTable('pelajar');
	}
}
