<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarikandidat extends MX_Controller {
	
	function index()
	{		
		if ($this->session->userdata('logged_in')) {
			echo "Selamat datang";
		}else
		{ 
			redirect('pencarikandidat/login', 'refresh'); 
		}
		
	}
	
	function login()
	{
		$data['judul'] = 'Login Pencari Kandidat';
		$data['konten'] = 'pencarikandidat/view_login';
		$this->template->load('depan/template_pengguna','pencarikandidat/view_login', $data);
	}
	
	function daftar()
	{
		echo "daftar";
	}
}