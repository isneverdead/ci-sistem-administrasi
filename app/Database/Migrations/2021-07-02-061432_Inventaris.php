<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventaris extends Migration
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
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'jumlah'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'status'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'dipinjam_oleh'       => [
				'type'       => 'VARCHAR',
				'constraint' => '250',
			],
			'created_at datetime default current_timestamp',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('inventaris');
	}
	
	public function down()
	{
		//
		$this->forge->dropTable('inventaris');
	}
}
