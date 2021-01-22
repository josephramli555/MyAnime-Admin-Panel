<?php

namespace App\Database\Seeds;

class AnimeSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Naruto',
                'cover'    => 'default.jpg',
                'tahun_rilis'    => 1984,
                'jumlah_episode'    => 32,
                'penulis'    => 'Masashi Kishimoto',
                'plot'    => 'Bocah Ninja Kyubi',
               
            ],
            [
                'nama' => 'One Piece',
                'cover'    => '1610875160_0243a97a943fc71a4272.jpg',
                'tahun_rilis'    => 2008,
                'jumlah_episode'    => 45,
                'penulis'    => 'Redni Savage',
                'plot'    => 'Bajak Laut Nomor 1 Dunia',
               
            ],
            [
                'nama' => 'Eyeshield 21',
                'cover'    => '1611047503_e804b048f229e2bff077.png',
                'tahun_rilis'    => 2056,
                'jumlah_episode'    => 21,
                'penulis'    => 'Rudi Tabuti',
                'plot'    => 'American Footbal is the best',
               
            ],
        ];
        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO anime (nama, cover, tahun_rilis,jumlah_episode,penulis,plot) VALUES(:nama:, :cover:,:tahun_rilis:,:jumlah_episode:,:penulis:,:plot:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('anime')->insertBatch($data);
    }
}
