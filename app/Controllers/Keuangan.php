<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Keuangan extends Controller
{
	public function __construct()
	{
		helper(['url', 'form']);
	}
	public function index()
	{
		$userModel = new \App\Models\UserModel();
		$transaksiModel = new \App\Models\TransaksiModel();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$query = $transaksiModel->findAll();
		$data = [
			'page_title' => 'Keuangan',
			'user_info' => $userInfo,
			'allTransaksi' => $query
		];


		echo view('templates/header', $data);
		echo view('keuangan/keuangan');
		echo view('templates/footer');
	}
	public function test()
	{
		//
	}

	public function add()
	{
		$userModel = new \App\Models\UserModel();
		$transaksiModel = new \App\Models\TransaksiModel();

		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$query = $transaksiModel->findAll();

		$data = [
			'page_title' => 'Keuangan',
			'user_info' => $userInfo,
			'allTransaksi' => $query

		];


		echo view('templates/header', $data);
		echo view('keuangan/tambah_keuangan');
		echo view('templates/footer');
	}

	public function add_save()
	{
		$validation = $this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan nama'
				]
			],
			'type' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan type',
					
				]
			],
			'saldo' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan nominal',
				]
			],
			
			
		]);
		// var_dump($this->validator->hasError('name'));
		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$transaksiModel = new \App\Models\TransaksiModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);
			$query = $transaksiModel->findAll();
			$data = [
				'page_title' => 'Keuangan',
				'user_info' => $userInfo,
				'allTransaksi' => $query,
			];
			echo view('templates/header', $data);
			echo view('keuangan/tambah_keuangan', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$type = $this->request->getPost('type');
			$saldo = $this->request->getPost('saldo');

			$current_saldo =  1;
		

			$values = [
				'name' => $name,
				'type' => $type,
				'saldo' => $saldo,
				'current_saldo' => $current_saldo,
			];
		}
		$transaksiModel = new \App\Models\TransaksiModel();
		// var_dump($values);
		$query = $transaksiModel->insert($values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/keuangan')->with('success', 'Transaksi berhasil ditambahkan');
		}
	}

	public function edit($id = null)
	{
		//
		$userModel = new \App\Models\UserModel();
		$transaksiModel = new \App\Models\TransaksiModel();
		$query = $transaksiModel->where('id', $id)->first();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$data = [
			'page_title' => 'Keuangan',
			'user_info' => $userInfo,
			'transaksi' => $query,
		];
		// var_dump($query['name']);
		echo view('templates/header', $data);
		echo view('keuangan/edit_keuangan');
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
					'required' => 'Tolong masukkan nama'
				]
			],
			'type' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan tipe',
					
				]
			],
			'saldo' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan nominal',
				]
			],
		]);

		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$transaksiModel = new \App\Models\TransaksiModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);

			$query = $transaksiModel->where('id', $id)->first();
			$data = [
				'page_title' => 'Keuangan',
				'user_info' => $userInfo,
				'transaksi' => $query,
			];
			echo view('templates/header', $data);
			echo view('keuangan/edit_keuangan', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$type = $this->request->getPost('type');
			$saldo = $this->request->getPost('saldo');

			$current_saldo =  1;
		

			$values = [
				'name' => $name,
				'type' => $type,
				'saldo' => $saldo,
				'current_saldo' => $current_saldo,
			];
			// $values = ['ss'];
		}
		$transaksiModel = new \App\Models\TransaksiModel();
		// var_dump($values);
		$query = $transaksiModel->update($id, $values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/keuangan')->with('success', 'Transaksi berhasil diedit');
		}
	}

	public function delete($id)
	{
		$transaksiModel = new \App\Models\TransaksiModel();
		// var_dump($values);
		$query = $transaksiModel->delete($id);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/keuangan')->with('fail', 'Transaksi berhasil Dihapus');
		}
	}
}
