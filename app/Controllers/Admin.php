<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
	public function index()
	{
		return view('dashboard');
	}

	public function dashboard2()
	{
		return view('dashboard2');
	}
}