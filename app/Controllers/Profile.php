<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;


class Profile extends Controller
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
		$data = [
			'page_title' => 'Profile',
			'user_info' => $userInfo,

		];

		echo view('templates/header', $data);
		echo view('profile/profile');
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
				'page_title' => 'Profile',
				'user_info' => $userInfo,
				
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
			return redirect()->to('dashboard/profile')->with('success', 'Profil anda berhasil diperbarui');
		}
	}

   public function store()
   {  
 
     	helper(['form', 'url']);
         
     	$db      = \Config\Database::connect();
	 
         $builder = $db->table('file');
 
        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);
 
        $msg = 'Please select a valid file';
  
        if ($validated) {
            $avatar = $this->request->getFile('file');
            $avatar->move(WRITEPATH . 'uploads');
 
          $data = [
 
            'name' =>  $avatar->getClientName(),
            'type'  => $avatar->getClientMimeType()
          ];
 
          $save = $builder->insert($data);
          $msg = 'File has been uploaded';
        }
 
       return redirect()->to( base_url('public/index.php/form') )->with('msg', $msg);
 
    }
}
