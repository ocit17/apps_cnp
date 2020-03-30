<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarikerja extends MX_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model('pencaker_model');
	}
	
	function index()
	{		
			if ($this->session->userdata('logged_in')) {
				echo "Selamat datang";
			}else
			{ 
				redirect('pencarikerja/login', 'refresh'); 
			}
	}
	
	function login()
	{
			$data['judul'] 	= 'Login Pencari Kerja';
			$data['konten'] = 'pencarikerja/view_login';
			$this->template->load('depan/template_pengguna','pencarikerja/view_login', $data);
	}
	
	function daftar()
	{
			$data['judul'] 	= 'Pendaftaran Kandidat';
			$data['konten'] = 'pencarikerja/view_daftar';
			$data['data']	= $this->pencaker_model->get_prodi();
			$this->template->load('depan/template_pengguna','pencarikerja/view_daftar', $data);
	}

	function proses_daftar()
	{		
			// foto upload
				$this->load->library('send_email');
		    $config = array();
		    $config['upload_path'] = './assets/depan/cnp/file/foto/';
		    $config['allowed_types'] = 'gif|jpg|png|';
		    $config['max_size'] = '100000';
		    // $config['max_width'] = '1024';
		    // $config['max_height'] = '768';
		    $this->load->library('upload', $config, 'fotoupload'); // Create custom object for foto upload
		    $this->fotoupload->initialize($config);
		    $foto = $this->fotoupload->do_upload('foto');

				// File pendukung upload
		    $config = array();
		    $config['upload_path'] = './assets/depan/cnp/file/cv/';
		    $config['allowed_types'] = 'pdf';
		    $config['max_size'] = '1000000';
		    $this->load->library('upload', $config, 'fileupload');  // Create custom object for file upload
		    $this->fileupload->initialize($config);
		    $file_pendukung = $this->fileupload->do_upload('file_pendukung');

				// CV upload
		    $config = array();
		    $config['upload_path'] = './assets/depan/cnp/file/cv/';
		    $config['allowed_types'] = 'pdf';
		    $config['max_size'] = '1000000';
		    $this->load->library('upload', $config, 'cvupload');  // Create custom object for cv upload
		    $this->cvupload->initialize($config);
		    $cv = $this->cvupload->do_upload('cv');

		    if ($foto && $cv) {
		      	$foto_data = $this->fotoupload->data();		 
						$cv_data = $this->cvupload->data();
						$file_data = $this->fileupload->data();
		      	
		      	$nim 		= $this->input->post('nim');
		        $nama1		= $this->input->post('nama_mhs');
		        $email 		= $this->input->post('email');
		        $sandi		= md5($this->input->post('sandi'));
		        $jurusan 	= $this->input->post('jurusan');
		        $telp 	 	= $this->input->post('telp');
		        $cv_mhs 	= $cv_data['file_name'];
		        $foto_mhs 	= $foto_data['file_name']; 
		        
					$result= $this->pencaker_model->proses_daftar($nim,$nama1,$email,$sandi,$jurusan,$telp,$cv_mhs,$foto_mhs);
				
					if($result)
					{
						$data = array('userName'=> 'tesss');
						$email_body = $this->load->view('pencarikerja/view_email', $data, TRUE);

						$kirim = $this->send_email->gmail($email,$email_body);
						if($kirim)
						{
							echo json_decode($result);
						}

					}		        
		    }else{
		    	echo json_encode(['error'=>'foto upload Error : ' . $this->fotoupload->display_errors() . 
				'<br/> cv upload Error : ' . $this->cvupload->display_errors() . '<br/>']);		      
		    }

			/*$config['upload_path']="./assets/cnp/file/foto";
	        $config['allowed_types']='gif|jpg|png';
	        $config['encrypt_name'] = TRUE;
	        
	        $this->load->library('upload',$config);
		    if($this->upload->do_upload("foto")){
		        $data = $this->upload->data();

		        //Resize and Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/cnp/file/foto/'.$data['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 600;
	            $config['height']= 400;
	            $config['new_image']= './assets/cnp/file/foto/'.$data['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

		        $nim= $this->input->post('nim');
		        $image= $data['file_name']; 
		        
		        $result= $this->pencaker_model->proses_daftar($nim,$image);
		        echo json_decode($result);
	        }*/
	}

	function jurusan(){
			$id=$this->input->post('id');
			$data=$this->pencaker_model->get_jurusan($id);
			echo json_encode($data);
	}

	function ceknim()
	{
		$nim = $this->input->post('nim');
		$exists = $this->pencaker_model->carinim($nim);
		$count = count($exists);
		if($count <= 0) {
			echo '1';
		}else{
			echo '2';			
		}	 	
	}

	function getnama(){
		$nim = $this->input->post('nim') ; 
		$data = $this->pencaker_model->getnama($nim);
		echo json_encode($data);
	}
	
}