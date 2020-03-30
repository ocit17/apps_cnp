<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipsperusahaan extends MX_Controller {
	
	function index()
	{		
		$data['konten'] = 'tipsperusahaan/tipsperusahaan';
		$data['title'] = 'depan/title';
		$this->template->load('depan/template_halaman','tipsperusahaan/tipsperusahaan', $data);
	}
	
}