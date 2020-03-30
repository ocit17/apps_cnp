<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipskarir extends MX_Controller {
	
	function index()
	{		
		$data['judul'] = 'Tips Karir';
		$data['konten'] = 'tipskerja/tipskerja';
		$data['title'] = 'depan/title';
		$this->template->load('depan/template_halaman','tipskerja/tipskerja', $data);
	}
	
}