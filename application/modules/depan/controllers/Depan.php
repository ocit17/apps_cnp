<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depan extends MX_Controller {
	
	function index()
	{		
		$data['title'] = 'Penempatan & Kerjasama LP3I Cileungsi';
		$data['konten'] = 'beranda/beranda';
		$this->template->load('depan/template_depan','beranda/beranda', $data);
	}
	
}