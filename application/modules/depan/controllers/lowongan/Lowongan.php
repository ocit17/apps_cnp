<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends MX_Controller {
	
	function index()
	{		
		$data['judul'] = 'Lowongan Kerja';
		$data['konten'] = 'lowongan/lowongan';
		$data['title'] = 'depan/title';
		$this->template->load('depan/template_halaman','lowongan/lowongan', $data);
	}
	
}