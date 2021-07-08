<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;


class Presensi extends Controller
{
	public function __construct()
	{
		helper(['url', 'form']);
	}
	public function index()
	{
		$userModel = new \App\Models\UserModel();
		$presensiModel = new \App\Models\PresensiModel();
		$pesertaModel = new \App\Models\PesertaModel();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$dataAcara = $presensiModel->findAll();
		$allPeserta = $pesertaModel->findAll();

		$data = [
			'page_title' => 'Presensi',
			'user_info' => $userInfo,
			'data_acara' => $dataAcara,
			'all_peserta'=> $allPeserta,

		];


		echo view('templates/header', $data);
		echo view('presensi/presensi');
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

		$data = [
			'page_title' => 'Presensi',
			'user_info' => $userInfo,
		];


		echo view('templates/header', $data);
		echo view('presensi/tambah_presensi');
		echo view('templates/footer');
	}

	public function add_save()
	{
		$validation = $this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan nama acara'
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
				'page_title' => 'Presensi',
				'user_info' => $userInfo,
				'users' => $dataUser,
			];
			echo view('templates/header', $data);
			echo view('presensi/tambah_presensi', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$tanggal = $this->request->getPost('tanggal');
			

			$values = [
				'name' => $name,
				'tanggal' => $tanggal,
			];
			// $values = ['ss'];
		}
		$presensiModel = new \App\Models\PresensiModel();
		// var_dump($values);
		$query = $presensiModel->insert($values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/presensi')->with('success', 'Acara berhasil terdaftar');
		}
	}

	public function edit($id = null)
	{
		//
		$pesertaModel = new \App\Models\PesertaModel();
		$userModel = new \App\Models\UserModel();
		$presensiModel = new \App\Models\PresensiModel();
		$query = $presensiModel->where('id', $id)->first();
		$db      = \Config\Database::connect();
		$builder = $db->table('peserta');

		
		// $builder->where('id', $peserta_id);
		// $builder->where('presensi_id', $acara_id);

		// $query2 = $builder->where(['presensi_id' => $id])->get()->getRow();
		$query2 = $pesertaModel->where('presensi_id', $id)->get()->getResult();
		// return $query2;
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$data = [
			'page_title' => 'Presensi',
			'user_info' => $userInfo,
			'acara' => $query,
			'allPeserta'=> $query2
		];
		// var_dump($query['name']);
		echo view('templates/header', $data);
		echo view('presensi/edit_presensi');
		// echo view('templates/footer');
		return view('templates/footer');
	}

	public function edit_add_peserta($id = null)
	{
		//
		$validation = $this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan nama peserta'
				]
			],
			
		]);

		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$presensiModel = new \App\Models\PresensiModel();
			$pesertaModel = new \App\Models\PesertaModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);
			$query = $presensiModel->where('id', $id)->first();
			$query2 = $pesertaModel->findAll();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);

			$data = [
				'page_title' => 'Edit Acara',
				'user_info' => $userInfo,
				'acara' => $query,
				'allPeserta' => $query2
			];
			echo view('templates/header', $data);
			echo view('presensi/edit_presensi', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$acara_id = $this->request->getPost('acara_id');
			$name = $this->request->getPost('name');
			$nim = $this->request->getPost('nim');
			
			// $userModel = new \App\Models\UserModel();
			// $query = $userModel->where('user_id', $id)->first();

			$values = [
				'presensi_id'=> $acara_id,
				'name' => $name,
				'nim' =>  (strlen($nim) > 2) ? $nim : '-',
				
			];
			// $values = ['ss'];
		}
		
		$pesertaModel = new \App\Models\PesertaModel();
		// var_dump($values);
		$query = $pesertaModel->insert($values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/presensi/edit/'.$id)->with('success', 'Peserta berhasil ditambah');
		}
	}

	public function edit_delete_peserta($acara_id, $peserta_id)
	{
		// echo "hello";
		$db      = \Config\Database::connect();
		$builder = $db->table('peserta');
		// $builder->where('id', $peserta_id);
		// $builder->where('presensi_id', $acara_id);
		$builder->delete([
			'id' => $peserta_id,
			'presensi_id' => $acara_id
		]);
		// $builder->delete();
		// $pesertaModel = new \App\Models\PesertaModel();
		// var_dump($values);
		$query = true;
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/presensi/edit/'.$acara_id)->with('fail', 'Peserta berhasil Dihapus');
		}
	}

	public function edit_save($id = null)
	{
		//
		$validation = $this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tolong masukkan nama acara'
				]
			],
		]);

		if (!$validation) {
			$userModel = new \App\Models\UserModel();
			$presensiModel = new \App\Models\PresensiModel();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);

			$query = $presensiModel->where('id', $id)->first();
			$loggedUserId = session()->get('loggedUser');
			$userInfo = $userModel->find($loggedUserId);
			$data = [
				'page_title' => 'Edit Acara',
				'user_info' => $userInfo,
				'acara' => $query,
			];
			echo view('templates/header', $data);
			echo view('presensi/edit_presensi', ['validation' => $this->validator]);
			// echo view('templates/footer');
			return view('templates/footer');
		} else {
			// echo 'form validated success';
			$name = $this->request->getPost('name');
			$tanggal = $this->request->getPost('tanggal');
			

			// $userModel = new \App\Models\UserModel();
			// $query = $userModel->where('user_id', $id)->first();

			$values = [
				'name' => $name,
				'tanggal' => $tanggal,
				
			];
			// $values = ['ss'];
		}
		$presensiModel = new \App\Models\PresensiModel();
		// var_dump($values);
		$query = $presensiModel->update($id, $values);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/presensi')->with('success', 'Acara berhasil Diedit');
		}
	}

	public function delete($id)
	{
		$presensiModel = new \App\Models\PresensiModel();
		// var_dump($values);
		$query = $presensiModel->delete($id);
		if (!$query) {
			return redirect()->back()->with('fail', 'Ada kesalahan, mohon coba lagi');
		} else {
			return redirect()->to('dashboard/presensi')->with('fail', 'Acara berhasil Dihapus');
		}
	}
}
