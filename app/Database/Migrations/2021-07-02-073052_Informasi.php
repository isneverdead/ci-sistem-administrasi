<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Informasi extends Migration
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
			'title'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'description'       => [
				'type'       => 'TEXT',
				'null' 		 => true,
			],
			'creator'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'tag'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'created_at datetime default current_timestamp',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('informasi');
	}
	
	public function down()
	{
		//
		$this->forge->dropTable('informasi');
	}
}
