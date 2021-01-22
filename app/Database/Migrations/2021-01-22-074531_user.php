<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id'=>[
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'password'=>[
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'profile_name'=>[
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'user_role'=>[
				'type'           => 'ENUM',
				'constraint'     => "'PRIME_ADMIN','SECONDARY_ADMIN'",
			],
			'profile_img'=>[
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
		]);
		$this->forge->addKey('user_id', true);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
