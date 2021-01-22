<?php

namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 'admin',
                'password'    => 'password',
                'profile_name'    => 'Jason Todd',
                'user_role'    => "PRIME_ADMIN",
                'profile_img'    => '1611231746_b25f8f0e6dec8c0e625e.jpg'
               
            ],
            [
                'user_id' => 'admin2',
                'password'    => 'password',
                'profile_name'    => 'Secondary Class Admin ^_^',
                'user_role'    => "SECONDARY_ADMIN",
                'profile_img'    => 'default.jpg'
            ],
           
        ];
        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO anime (nama, cover, tahun_rilis,jumlah_episode,penulis,plot) VALUES(:nama:, :cover:,:tahun_rilis:,:jumlah_episode:,:penulis:,:plot:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
