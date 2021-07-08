<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\IncomingRequest;
use App\Libraries\Hash;

class Auth extends Controller
{
	public function __construct()
	{
		helper(['url', 'form']);
	}
	public function index()
	{
		return view('auth/login');
	}

	public function register()
	{
		return view('auth/register');
	}

	public function add_user()
	{
		// echo "add user";
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
			'password' => [
				'rules' => 'required|min_length[5]|max_length[12]',
				'errors' => [
					'required' => 'Tolong masukkan password anda',
					'min_length' => 'Panjang password minimal 5 karakter',
					'max_length' => 'Panjang password maximal 12 karakter'
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
		if (!$validation) {
			return view('auth/register', ['validation' => $this->validator]);
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$nim = null;
			$jurusan = null;
			$fakultas = null;
			$angkatan = null;
			$aktif = null;
			$profile_url = null;

			$values = [
				'name' => $name,
				'password' => Hash::make($password),
				'email' => $email,
				'nim' => $nim,
				'fakultas' => $fakultas,
				'jurusan' => $jurusan,
				'angkatan' => $angkatan,
				'aktif' => $aktif,
				'profile_url' => $profile_url
			];
		}
		$userModel = new \App\Models\UserModel();
		$query = $userModel->insert($values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('auth/login')->with('success', 'Anda berhasil terdaftar');
		}
	}
	public function check_user()
	{
		// echo 'checking user...........';
		$validation = $this->validate([

			'email' => [
				'rules' => 'required|valid_email|is_not_unique[users.email]',
				'errors' => [
					'required' => 'Tolong masukkan email anda',
					'valid_email' => 'Email tidak valid',
					'is_not_unique' => 'Email ini tidak terdaftar'
				]
			],
			'password' => [
				'rules' => 'required|min_length[5]|max_length[12]',
				'errors' => [
					'required' => 'Tolong masukkan password anda',
					'min_length' => 'Panjang password minimal 5 karakter',
					'max_length' => 'Panjang password maximal 12 karakter'
				]
			],

		]);
		if (!$validation) {
			// return redirect()->to('auth/login')->with('success', 'Anda berhasil terdaftar');
			return view('auth/login', ['validation' => $this->validator]);
		} else {
			echo 'berhasil....';
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$userModel = new \App\Models\UserModel();

			$user_info = $userModel->where('email', $email)->first();
			$check_password = Hash::check($password, $user_info['password']);

			if (!$check_password) {
				session()->setFlashData('fail', 'Password salah');
				return redirect()->to('/auth/login')->withInput();
			} else {
				$user_id = $user_info['user_id'];
				session()->set('loggedUser', $user_id);
				return redirect()->to('/dashboard');
			}
		}
	}
	public function logout_user()
	{
		if (session()->has('loggedUser')) {
			session()->remove('loggedUser');
			return redirect()->to('/auth/login?access=out')->with('fail', 'Anda telah berhasil Logout!');
		}
	}
	public function is_login() {
		$loggedUserId = session()->get('loggedUser');
		if(!session()->has('loggedUser')) {
			return redirect()->to('/auth/login?access=out')->with('fail', 'Anda harus login terlebih dahulu!');
		}
	}
}
