<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;


class Pelajar extends BaseController
{
	public function __construct()
	{
		helper(['url', 'form']);
	}
	public function index()
	{
		$userModel = new \App\Models\UserModel();
		$pelajarModel = new \App\Models\PelajarModel();
		$db      = \Config\Database::connect();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		// $dataUser = $userModel->notLike('aktif', '-')->get();
		$query = $pelajarModel->findAll();
		// $builder = $db->table('users');
		// $query = $builder->getWhere(
		// 	['aktif !='=>'-'],

		// );
		$data = [
			'page_title' => 'Siswa',
			'user_info' => $userInfo,
			'users' => $query,
		];
		// foreach($dataUser->getResult() as $key=>$row) {
		// 	echo $row->name;
		// }
		// return $dataUser;
		
		// var_dump($query);

		// var_dump($dataUser);
		echo view('templates/header', $data);
		echo view('pelajar/pelajar');
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
			'page_title' => 'Siswa',
			'user_info' => $userInfo,
			'users' => $dataUser,
		];


		echo view('templates/header', $data);
		echo view('pelajar/tambah_pelajar');
		echo view('templates/footer');
	}

	public function add_save()
	{
		$validation = $this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan nama siswa'
				]
			],
			'tingkat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan tingkat siswa'
				]
			],
			
		]);
		// var_dump($this->validator->hasError('name'));
		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);
			$data = [
				'page_title' => 'Siswa',
				'user_info' => $userInfo,
			];
			echo view('templates/header', $data);
			echo view('pelajar/tambah_pelajar', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$tingkat = $this->request->getPost('tingkat');

			$values = [
				'nama' => $name,
				'tingkat' => $tingkat,
			];

		}
		$pelajarModel = new \App\Models\PelajarModel();
		// var_dump($values);
		$query = $pelajarModel->insert($values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/pelajar')->with('success', 'Siswa berhasil terdaftar');
		}
	}

	public function edit($id = null)
	{
		//
		$userModel = new \App\Models\UserModel();
		$pelajarModel = new \App\Models\PelajarModel();
		$query = $pelajarModel->where('id', $id)->first();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$data = [
			'page_title' => 'Siswa',
			'user_info' => $userInfo,
			'siswa' => $query,
		];
		// var_dump($query['name']);
		echo view('templates/header', $data);
		echo view('pelajar/edit_pelajar');
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
					'required' => 'Tolong masukkan nama siswa'
				]
			],
			'tingkat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan tingkat siswa'
				]
			],
		]);

		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$pelajarModel = new \App\Models\PelajarModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);

			$query = $pelajarModel->where('id', $id)->first();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);
			$data = [
				'page_title' => 'Siswa',
				'user_info' => $userInfo,
				'siswa' => $query,
			];
			echo view('templates/header', $data);
			echo view('pelajar/edit_pelajar', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$tingkat = $this->request->getPost('tingkat');

			$values = [
				'nama' => $name,
				'tingkat' => $tingkat,
			];

		}
		$pelajarModel = new \App\Models\PelajarModel();
		// var_dump($values);
		$query = $pelajarModel->update($id, $values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/pelajar')->with('success', 'Pelajar berhasil diedit');
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
			return redirect()->to('dashboard/pelajar/add')->with('fail', 'Anggota berhasil Dihapus');
		}
	}
}
