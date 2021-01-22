<?php

namespace App\Controllers;

use App\Models\AnimeModel;

class Anime extends BaseController
{
    protected $animeModel;

    public function __construct()
    {
        $this->animeModel = new AnimeModel();
    }

    public function index()
    {
        if (session('login') == TRUE) {
            $data = [
                'animes' => $this->animeModel->findAll()
            ];
            return view('anime/dashboard', $data);
        } else {
            return view('login');
        }
    }

    public function detail($id)
    {
        if (session('login') == TRUE) {
            $anime = $this->animeModel->search($id);
            $data = [
                'anime' => $anime
            ];
            return view('anime/detail', $data);
        }else{
            return view('login');
        }
    }

    public function addData()
    {
        $data = ['validation' => \Config\Services::validation()];
        return view('anime/create', $data);
    }

    public function edit($id)
    {
        $anime = $this->animeModel->search($id);
        $data = [
            'anime' => $anime,
            'validation' => \Config\Services::validation()
        ];
        return view('anime/edit', $data);
    }

    public function save()
    {


        // echo $text;

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[anime.nama]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar, coba anime lain'
                ]
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/anime/addData')->withInput();
        }
        $file = $this->request->getFile('cover');
        $cover_name = "";
        if ($file->getError() == 4) {
            $cover_name = "default.jpg";
        } else {
            //handle file dan ganti nama
            $cover_name = $file->getRandomName();
            $file->move('img', $cover_name);
        }
        $data = [
            'nama' => $this->request->getVar('nama'),
            'cover' => $cover_name,
            'tahun_rilis' => $this->request->getvar('tahun_rilis'),
            'jumlah_episode' => $this->request->getvar('jumlah_episode'),
            'penulis' => $this->request->getvar('penulis'),
            'plot' => $this->request->getvar('plot')
        ];
        $this->animeModel->save($data);
        session()->setFlashdata('success', 'Data ' . $this->request->getVar('nama') . ' berhasil ditambahkan');
        return redirect()->to('/home');
    }
    //--------------------- -----------------------------------------------

    public function update()
    {
        $id = $this->request->getVar('id');
        $anime = $this->animeModel->search($id);
        if ($anime['nama'] == $this->request->getVar('nama')) {
            $rules_nama = 'required';
        } else {
            $rules_nama = 'required|is_unique[anime.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rules_nama,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar, coba anime lain'
                ]
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/anime/edit/' . $id)->withInput();
        }

        $file = $this->request->getFile('cover');
        $oldCover = $this->request->getVar('oldcover');
        if ($file->getError() == 4) {
            $cover_name = $oldCover;
        } else {
            $cover_name = $file->getRandomName();
            $file->move('img', $cover_name);
            if ($oldCover !== 'default.jpg')
                unlink('img/' . $oldCover);
        }

        $this->animeModel->save([
            'id' => $id,
            "nama" => $this->request->getVar('nama'),
            'cover' => $cover_name,
            'tahun_rilis' => $this->request->getvar('tahun_rilis'),
            'jumlah_episode' => $this->request->getvar('jumlah_episode'),
            'penulis' => $this->request->getvar('penulis'),
            'plot' => $this->request->getvar('plot')
        ]);
        session()->setFlashdata('success', 'Data ' . $this->request->getVar('nama') . ' berhasil diedit');

        return redirect()->to('/home');
    }

    public function delete($id)
    {
        $anime = $this->animeModel->find($id);

        if ($anime['cover'] != 'default.jpg') {
            unlink("/img/" . $anime['cover']);
        }
        $this->animeModel->delete($id);
        session()->setFlashdata('success', 'Data ' . $this->request->getVar('nama') . ' berhasil dihapus');

        return redirect()->to('/home');
    }
}
