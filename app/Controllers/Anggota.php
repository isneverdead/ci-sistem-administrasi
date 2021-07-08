<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;

class Anggota extends Controller
{
	public function __construct()
	{
		helper(['url', 'form']);
	}
	public function index()
	{
		$userModel = new \App\Models\UserModel();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$dataUser = $userModel->findAll();
		$data = [
			'page_title' => 'Daftar anggota',
			'user_info' => $userInfo,
			'users' => $dataUser,
		];


		echo view('templates/header', $data);
		echo view('anggota/daftar_anggota');
		echo view('templates/footer');
	}
	public function test()
	{
		$userModel = new \App\Models\UserModel();

		$dataUser = $userModel->findAll();
		// var_dump($dataUser);
		foreach ($dataUser as $user) {
?>
			<?= $user['name']; ?>

<?php
		}
	}

	public function add()
	{
		$userModel = new \App\Models\UserModel();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$dataUser = $userModel->findAll();
		$data = [
			'page_title' => 'Tambah anggota',
			'user_info' => $userInfo,
			'users' => $dataUser,
		];


		echo view('templates/header', $data);
		echo view('anggota/tambah_anggota');
		echo view('templates/footer');
	}

	public function add_save()
	{
		$validation = $this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan nama anda'
				]
			],
			'email' => [
				'rules' => 'required|valid_email|is_unique[users.email]',
				'errors' => [
					'required' => 'Tolong masukkan email anda',
					'valid_email' => 'Email tidak valid',
					'is_unique' => 'Email ini sudah dipakai'
				]
			],
			'confirm_password' => [
				'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
				'errors' => [
					'required' => 'Tolong masukkan password anda',
					'min_length' => 'Panjang password minimal 5 karakter',
					'max_length' => 'Panjang password maximal 12 karakter',
					'matches' => 'Konfirmasi password tidak sama'
				]
			],
		]);
		// var_dump($this->validator->hasError('name'));
		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);
			$dataUser = $userModel->findAll();
			$data = [
				'page_title' => 'Tambah anggota',
				'user_info' => $userInfo,
				'users' => $dataUser,
			];
			echo view('templates/header', $data);
			echo view('anggota/tambah_anggota', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$nim =  $this->request->getPost('nim');
			$jurusan =  $this->request->getPost('jurusan');
			$fakultas =  $this->request->getPost('fakultas');
			$angkatan =  $this->request->getPost('tahun');
			$aktif =  '-';
			$profile_url = null;

			$values = [
				'name' => $name,
				'password' => Hash::make($password),
				'email' => $email,
				'nim' => (strlen($nim) > 2) ? $nim : '-',
				'fakultas' => (strlen($fakultas) > 2) ? $fakultas : '-',
				'jurusan' => (strlen($jurusan) > 2) ? $jurusan : '-',
				'angkatan' => (strlen($angkatan) > 2) ? $angkatan : '-',
				'aktif' =>  $aktif,
				'profile_url' => $profile_url
			];
			// $values = ['ss'];
		}
		$userModel = new \App\Models\UserModel();
		// var_dump($values);
		$query = $userModel->insert($values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/anggota/add')->with('success', 'Anggota berhasil terdaftar');
		}
	}

	public function edit($id = null)
	{
		//
		$userModel = new \App\Models\UserModel();
		$query = $userModel->where('user_id', $id)->first();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$data = [
			'page_title' => 'Edit anggota',
			'user_info' => $userInfo,
			'user_edit' => $query,
		];
		// var_dump($query['name']);
		echo view('templates/header', $data);
		echo view('anggota/edit_anggota');
		// echo view('templates/footer');
		return view('templates/footer');
	}

	public function edit_save($id = null)
	{
		//
		$validation = $this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan nama anda'
				]
			],
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Tolong masukkan email anda',
					'valid_email' => 'Email tidak valid',
					'is_unique' => 'Email ini sudah dipakai'
				]
			],
			'confirm_password' => [
				'rules' => 'matches[password]',
				'errors' => [

					'matches' => 'Konfirmasi password tidak sama'
				]
			],
		]);

		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);

			$query = $userModel->where('user_id', $id)->first();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);
			$data = [
				'page_title' => 'Edit anggota',
				'user_info' => $userInfo,
				'user_edit' => $query,
			];
			echo view('templates/header', $data);
			echo view('anggota/edit_anggota', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$nim =  $this->request->getPost('nim');
			$jurusan =  $this->request->getPost('jurusan');
			$fakultas =  $this->request->getPost('fakultas');
			$angkatan =  $this->request->getPost('angkatan');
			$aktif =  $this->request->getPost('aktif');
			$profile_url =  $this->request->getPost('profile_url');

			$userModel = new \App\Models\UserModel();
			$query = $userModel->where('user_id', $id)->first();

			$values = [
				'name' => $name,
				'password' => (strlen($password) > 1) ? Hash::make($password) : $query['password'],
				'email' => $email,
				'nim' => (strlen($nim) > 2) ? $nim : '-',
				'fakultas' => (strlen($fakultas) > 2) ? $fakultas : '-',
				'jurusan' => (strlen($jurusan) > 2) ? $jurusan : '-',
				'angkatan' => (strlen($angkatan) > 2) ? $angkatan : '-',
				'aktif' => $aktif,
				'profile_url' => $profile_url
			];
			// $values = ['ss'];
		}
		$userModel = new \App\Models\UserModel();
		// var_dump($values);
		$query = $userModel->update($id, $values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/anggota')->with('success', 'Anggota berhasil Diedit');
		}
	}

	public function delete($id)
	{
		$userModel = new \App\Models\UserModel();
		// var_dump($values);
		$query = $userModel->delete($id);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/anggota')->with('fail', 'Anggota berhasil Dihapus');
		}
	}
}
