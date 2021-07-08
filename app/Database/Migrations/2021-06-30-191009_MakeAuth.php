<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MakeAuth extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'user_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '150',
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'nim'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null' => true,
			],
			'fakultas'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'jurusan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'angkatan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null' => true,
			],
			'aktif'       => [
				'type'       => 'VARCHAR',
				'constraint' => '10',
				'null' => true,
			],
			'profile_url'       => [
				'type'       => 'VARCHAR',
				'constraint' => '1000',
				'null' => true,
			],

		]);
		$this->forge->addKey('user_id', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		//
	}
}
