<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
	public function index()
	{
		return view('login');
	}

	public function register()
	{
		return view('register');
	}
}
