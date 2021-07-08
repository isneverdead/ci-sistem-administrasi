<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Informasi extends Controller
{
	public function __construct()
	{
		helper(['url', 'form']);
	}
	public function index()
	{
		$userModel = new \App\Models\UserModel();
		$informasiModel = new \App\Models\InformasiModel();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$query = $informasiModel->findAll();
		$data = [
			'page_title' => 'Informasi',
			'user_info' => $userInfo,
			'informasi' => $query
		];


		echo view('templates/header', $data);
		echo view('informasi/informasi');
		echo view('templates/footer');
	}
	public function test()
	{
		//
	}

	public function add()
	{
		$userModel = new \App\Models\UserModel();
		$informasiModel = new \App\Models\InformasiModel();

		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$query = $informasiModel->findAll();

		$data = [
			'page_title' => 'Informasi',
			'user_info' => $userInfo,
			'informasi' => $query

		];


		echo view('templates/header', $data);
		echo view('informasi/tambah_informasi');
		echo view('templates/footer');
	}

	public function add_save()
	{
		$validation = $this->validate([
			'title' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan judul'
				]
			],
			'description' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan berita',
					
				]
			],
			'tag' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan tag, (contoh: penting)',
				]
			],
			
		]);
		// var_dump($this->validator->hasError('name'));
		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$informasiModel = new \App\Models\InformasiModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);
			$query = $informasiModel->findAll();
			$data = [
				'page_title' => 'Informasi',
				'user_info' => $userInfo,
				'informasi' => $query,
			];
			echo view('templates/header', $data);
			echo view('informasi/tambah_informasi', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$title = $this->request->getPost('title');
			$description = $this->request->getPost('description');
			$creator = $this->request->getPost('creator');
			$tag =  $this->request->getPost('tag');
			$created_at = null;

			$values = [
				'title' => $title,
				'description' => $description,
				'creator' => $creator,
				'tag' => $tag,
			
			];
		}
		$informasiModel = new \App\Models\InformasiModel();
		// var_dump($values);
		$query = $informasiModel->insert($values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/informasi')->with('success', 'Berita berhasil ditambahkan');
		}
	}

	public function edit($id = null)
	{
		//
		$userModel = new \App\Models\UserModel();
		$informasiModel = new \App\Models\InformasiModel();
		$query = $informasiModel->where('id', $id)->first();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$data = [
			'page_title' => 'Informasi',
			'user_info' => $userInfo,
			'berita' => $query,
		];
		// var_dump($query['name']);
		echo view('templates/header', $data);
		echo view('informasi/edit_informasi');
		// echo view('templates/footer');
		return view('templates/footer');
	}

	public function edit_save($id = null)
	{
		//
		$validation = $this->validate([
			'title' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong judul'
				]
			],
			'description' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan berita',
					
				]
			],
			'tag' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan tag, (contoh: penting)',
				]
			],
		]);

		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$informasiModel = new \App\Models\InformasiModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);

			$query = $informasiModel->where('id', $id)->first();
			$data = [
				'page_title' => 'Informasi',
				'user_info' => $userInfo,
				'berita' => $query,
			];
			echo view('templates/header', $data);
			echo view('informasi/edit_informasi', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$title = $this->request->getPost('title');
			$description = $this->request->getPost('description');
			$creator = $this->request->getPost('creator');
			$tag =  $this->request->getPost('tag');
			$created_at = null;

			$values = [
				'title' => $title,
				'description' => $description,
				'creator' => $creator,
				'tag' => $tag,
			
			];
			// $values = ['ss'];
		}
		$informasiModel = new \App\Models\InformasiModel();
		// var_dump($values);
		$query = $informasiModel->update($id, $values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/informasi')->with('success', 'Berita berhasil diedit');
		}
	}

	public function delete($id)
	{
		$informasiModel = new \App\Models\InformasiModel();
		// var_dump($values);
		$query = $informasiModel->delete($id);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/informasi')->with('fail', 'Berita berhasil Dihapus');
		}
	}
}
