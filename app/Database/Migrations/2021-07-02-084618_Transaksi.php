<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
	public function up() {
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
		
		'type'       => [
			'type'       => 'VARCHAR',
			'constraint' => '20',
		],
		'saldo'       => [
			'type'       => 'VARCHAR',
			'constraint' => '1000',
		],
		'current_saldo'       => [
			'type'       => 'VARCHAR',
			'constraint' => '1000',
		],
		'created_at datetime default current_timestamp',
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('transaksi');
	}

	public function down()
	{
		//
		$this->forge->dropTable('transaksi');
	}
}
