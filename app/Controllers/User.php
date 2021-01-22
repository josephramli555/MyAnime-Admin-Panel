<?php

namespace App\Controllers;

use App\Models\AuthModel;

class User extends BaseController
{
	protected $authModel;

	public function __construct()
	{
		$this->authModel = new AuthModel();
	}

	public function login_page()
	{
		if (session('login') == TRUE)
			return redirect()->to('/home');
		else
			return view('login');
	}

	public function login()
	{
		$userid = $this->request->getVar('userid');
		$password = $this->request->getvar('password');
		$data = [
			'user_id'  => $userid,
			'password' => $password
		];
		$is_login = $this->authModel->login($data);
		if ($is_login == TRUE) {
			return redirect()->to('/home');
		} else {
			return redirect()->to('/user/login_page');
		}
	}

	public function edit()
	{
		if (session('login') == TRUE) {
			$data = ['validation' => \Config\Services::validation()];
			return view('user/edit.php', $data);
		} else
			return redirect()->to('/user/login_page');
	}
	//--------------------------------------------------------------------
	public function update()
	{

		if (!$this->validate([
			'profile_name' => [
				'rules' => 'required',
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
			return redirect()->to('/user/edit/')->withInput();
		}

		$file = $this->request->getFile('cover');
		$profile_img = $file->getName();
		$data = [
			"user_id" => session('user_id'),
			"profile_name" => $this->request->getVar("profile_name"),
			"profile_img" => $file->getName()
		];

		$file = $this->request->getFile('cover');
		if ($file->getError() == 4) {
			$profile_img = session('img');
		} else {
			$profile_img = $file->getRandomName();
			$file->move('img/user', $profile_img);
			if (session('img') !== 'default.jpg')
				unlink('img/user/' . session('img'));
		}

		$this->authModel->save([
			'user_id' => session('user_id'),
			"profile_name" => $this->request->getVar('profile_name'),
			'profile_img' => $profile_img,
		]);
		session()->setFlashdata('success', 'Profile berhasil diedit');

		//remove old session data


		$data = [
			'user_id' => session('user_id'),
			'name' => $this->request->getVar('profile_name'),
			'img' => $profile_img,
			'role' => session('role'),
			'login' => TRUE
		];
		session()->set($data);

		return redirect()->to('/home');
	}

	public function create()
	{
		if (session('login') != TRUE)
			return redirect()->to("/user/login_page");
		else if (session('role') != "PRIME_ADMIN")
			redirect()->to("/home");
		else {
			$data = ['validation' => \Config\Services::validation()];
			return view("user/create.php", $data);
		}
	}

	public function save()
	{
		if (!$this->validate([
			'user_id' => [
				'rules' => 'required|is_unique[users.user_id]',
				'errors' => [
					'required' => 'User id harus diisi',
					'is_unique' => 'User Id sudah terdaftar, coba user id lain'
				]
			],
			'profile_img' => [
				'rules' => 'max_size[profile_img,1024]|is_image[profile_img]|mime_in[profile_img,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar'
				]
			]
		])) {
			return redirect()->to('/user/create/')->withInput();
		}
		$search_id = session('user_id');
		$current_user = $this->authModel->search_user($search_id);
		$admin_pass = $current_user['password'];
		$rules = 'in_list[' . $admin_pass . ']';
		if (!$this->validate([
			'admin_password' => [
				'rules' => $rules,
				'errors' => [
					'in_list' => 'Password yang anda masukkan salah'
				]
			]
		])) {
			return redirect()->to('/user/create/')->withInput();
		}

		$file = $this->request->getFile('profile_img');
		$cover_name = $file->getRandomName();
		$file->move('img/user', $cover_name);
		$data = [
			'user_id' => $this->request->getVar('user_id'),
			'password' => $this->request->getVar('password'),
			'profile_name' => $this->request->getVar('profile_name'),
			'user_role' => $this->request->getVar('user_role'),
			'profile_img' => $cover_name
		];
		// dd($data);
		$result = $this->authModel->insert($data) ;
		if ($result == false) {
			dd($this->authModel->errors());
		} else {
			// dd($result);
			session()->setFlashdata('success', 'User ' . $this->request->getVar('profile_name') . ' berhasil ditambahkan');
			return redirect()->to('/home')->withInput();
		}
	}
}
