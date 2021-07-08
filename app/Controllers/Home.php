<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$userModel = new \App\Models\UserModel();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$data = [
			'page_title' => 'Home',
			'user_info' => $userInfo,
		];
		return view('home_page', $data);
	}
	public function news()
	{
		$userModel = new \App\Models\UserModel();
		$informasiModel = new \App\Models\InformasiModel();
		$loggedUserId = session()->get('loggedUser');
		$userInfo = $userModel->find($loggedUserId);
		$allNews = $informasiModel->orderBy('created_at', 'desc')->findAll();
		$allUser = $userModel->findAll();
		$data = [
			'page_title' => 'Berita',
			'user_info' => $userInfo,
			'allNews'=> $allNews,
			'allUser'=> $allUser
		];
		return view('news_page', $data);
		// var_dump($allNews);
	}
	public function news2()
	{
		return view('news_page2');
	}
}
