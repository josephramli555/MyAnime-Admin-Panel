<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Anime extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE,
			],
			'nama'=>[
				'type'           => 'VARCHAR',
				'constraint'     => 300,
			],
			'cover'=>[
				'type'           => 'VARCHAR',
				'constraint'     => 300,
			],
			'tahun_rilis'=>[
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'jumlah_episode'=>[
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
			],
			'penulis'=>[
				'type'           => 'VARCHAR',
				'constraint'     => 300,
			],
			'plot'=>[
				'type'           => 'VARCHAR',
				'constraint'     => 600,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('anime');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
