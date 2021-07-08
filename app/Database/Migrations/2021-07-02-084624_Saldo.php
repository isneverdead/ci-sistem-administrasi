<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Saldo extends Migration
{
	public function up() {
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nominal'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			
			'created_at datetime default current_timestamp',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('saldo');
		}
	
		public function down()
		{
			//
			$this->forge->dropTable('saldo');
		}
}
