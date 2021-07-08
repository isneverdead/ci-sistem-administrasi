<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Inventaris extends Controller
{
	public function __construct()
	{
		helper(['url', 'form']);
	}
	public function index()
	{
		$userModel = new \App\Models\UserModel();
		$inventarisModel = new \App\Models\InventarisModel();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$query = $inventarisModel->findAll();
		$data = [
			'page_title' => 'Inventaris',
			'user_info' => $userInfo,
			'inventaris' => $query
		];


		echo view('templates/header', $data);
		echo view('inventaris/inventaris');
		echo view('templates/footer');
	}
	public function test()
	{
		//
	}

	public function add()
	{
		$userModel = new \App\Models\UserModel();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$data = [
			'page_title' => 'Inventaris',
			'user_info' => $userInfo,
		];


		echo view('templates/header', $data);
		echo view('inventaris/tambah_inventaris');
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
			'jumlah' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan jumlah barang',
					
				]
			],
			'status' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Masukkan status, dipinjam / tersedia / rusak',
				]
			],
			
		]);
		// var_dump($this->validator->hasError('name'));
		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$inventarisModel = new \App\Models\InventarisModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);
			$query = $inventarisModel->findAll();
			$data = [
				'page_title' => 'Inventaris',
				'user_info' => $userInfo,
				'inventaris' => $query,
			];
			echo view('templates/header', $data);
			echo view('inventaris/tambah_inventaris', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$jumlah = $this->request->getPost('jumlah');
			$status = $this->request->getPost('status');
			$dipinjam_oleh =  $this->request->getPost('dipinjam_oleh');
			

			$values = [
				'name' => $name,
				'jumlah' => $jumlah,
				'status' => $status,
				'dipinjam_oleh' => (strlen($dipinjam_oleh) > 2) ? $dipinjam_oleh : '-',
			
			];
		}
		$inventarisModel = new \App\Models\InventarisModel();
		// var_dump($values);
		$query = $inventarisModel->insert($values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/inventaris')->with('success', 'Barang berhasil ditambahkan');
		}
	}

	public function edit($id = null)
	{
		//
		$userModel = new \App\Models\UserModel();
		$inventarisModel = new \App\Models\InventarisModel();
		$query = $inventarisModel->where('id', $id)->first();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$data = [
			'page_title' => 'Edit anggota',
			'user_info' => $userInfo,
			'barang' => $query,
		];
		// var_dump($query['name']);
		echo view('templates/header', $data);
		echo view('inventaris/edit_inventaris');
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
			'jumlah' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan jumlah barang',
					
				]
			],
			'status' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Masukkan status, dipinjam / tersedia / rusak',
				]
			],
		]);

		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$inventarisModel = new \App\Models\InventarisModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);

			$query = $inventarisModel->where('id', $id)->first();
			$data = [
				'page_title' => 'Edit anggota',
				'user_info' => $userInfo,
				'barang' => $query,
			];
			echo view('templates/header', $data);
			echo view('inventaris/edit_inventaris', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$jumlah = $this->request->getPost('jumlah');
			$status = $this->request->getPost('status');
			$dipinjam_oleh =  $this->request->getPost('dipinjam_oleh');
			

			$values = [
				'name' => $name,
				'jumlah' => $jumlah,
				'status' => $status,
				'dipinjam_oleh' => (strlen($dipinjam_oleh) > 2) ? $dipinjam_oleh : '-',
			
			];
			// $values = ['ss'];
		}
		$inventarisModel = new \App\Models\InventarisModel();
		// var_dump($values);
		$query = $inventarisModel->update($id, $values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/inventaris')->with('success', 'Barang berhasil diedit');
		}
	}

	public function delete($id)
	{
		$inventarisModel = new \App\Models\InventarisModel();
		// var_dump($values);
		$query = $inventarisModel->delete($id);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/inventaris')->with('fail', 'Barang berhasil Dihapus');
		}
	}
}
