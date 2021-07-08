<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{

	public function index()
	{
		$userModel = new \App\Models\UserModel();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$data = [
			'page_title' => 'Dashboard',
			'user_info' => $userInfo,
		];
		echo view('templates/header', $data);
		echo view('dashboard');
		echo view('templates/footer');
		// var_dump($this);
	}

	public function daftar_anggota()
	{
		$data = [
			'page_title' => 'Daftar anggota'
		];
		echo view('templates/header', $data);
		echo view('daftar_anggota');
		echo view('templates/footer');
		// var_dump($this);
	}

	public function tambah_anggota()
	{
		$data = [
			'page_title' => 'Tambah anggota'
		];
		echo view('templates/header', $data);
		echo view('tambah_anggota');
		echo view('templates/footer');
		// var_dump($this);
	}

	public function mahasiswa_aktif()
	{
		$data = [
			'page_title' => 'Mahasiswa aktif'
		];
		echo view('templates/header', $data);
		echo view('mahasiswa_aktif');
		echo view('templates/footer');
		// var_dump($this);
	}

	public function inventaris()
	{
		$data = [
			'page_title' => 'Inventaris'
		];
		echo view('templates/header', $data);
		echo view('inventaris');
		echo view('templates/footer');
		// var_dump($this);
	}

	public function informasi()
	{
		$data = [
			'page_title' => 'Informasi'
		];
		echo view('templates/header', $data);
		echo view('informasi');
		echo view('templates/footer');
		// var_dump($this);
	}

	public function presensi()
	{
		$data = [
			'page_title' => 'Presensi'
		];
		echo view('templates/header', $data);
		echo view('presensi');
		echo view('templates/footer');
		// var_dump($this);
	}

	public function keuangan()
	{
		$data = [
			'page_title' => 'Keuangan'
		];
		echo view('templates/header', $data);
		echo view('keuangan');
		echo view('templates/footer');
		// var_dump($this);
	}

	public function dashboard2()
	{
		return view('dashboard2');
	}
}
