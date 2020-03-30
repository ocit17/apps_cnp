<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends MX_Controller {
	
	function index()
	{		
		$data['judul'] = 'Kandidat';
		$data['konten'] = 'kandidat/kandidat';
		$data['title'] = 'depan/title';
		$this->template->load('depan/template_halaman','kandidat/kandidat', $data);
	}
	
}