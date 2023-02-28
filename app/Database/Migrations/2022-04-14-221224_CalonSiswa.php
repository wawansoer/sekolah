<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CalonSiswa extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
			'idCalonSiswa'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nisn'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '10'
			],
			'namaLengkap'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
            'tempatLahir'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
            'tanggalLahir'      => [
				'type'           => 'DATE',
			],
            'alamatSiswa'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'agama' => [
				'type'           => 'VARCHAR',
				'constraint'     => 20,
			],
			'noKontak' => [
				'type'           => 'VARCHAR',
				'constraint'     => 13,
			],
			'jenisKelamin'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'sekolahAsal'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'namaWali'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'alamatWali'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'agamaWali'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'pekerjaanWali'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'pendapatanWali'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'kontakOrtu'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],    
		]);

		$this->forge->addKey('idCalonSiswa', TRUE);

		$this->forge->createTable('CalonSiswa', TRUE);
    }

    public function down()
    {
        //
    }
}
