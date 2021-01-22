<?php namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model
{
    protected $table      = 'anime';
    protected $primaryKey = 'id';
    protected $db;

    // protected $returnType     = 'array';
    protected $allowedFields = ['nama', 'cover','tahun_rilis','jumlah_episode','penulis','plot'];



    public function search($id){
        $data = $this->where('id',$id)->first();
        return $data;
    }
}