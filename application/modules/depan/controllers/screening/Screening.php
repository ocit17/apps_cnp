<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screening extends MX_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('screening_model');
		//$this->load->helper('cookie');
		$this->load->library('session');
	}
	
	function index()
	{
		$output = array('error' => false);
		if($_POST){  
			$mahasiswa = $this->input->post('mhs');
			$nm_dosen = $this->input->post('nm_dosen');							
			$hasil=  $this->screening_model->login_screening($mahasiswa);
            if($hasil==1)
            { 
				$mhsi 	= $this->db->query("select * from dt_mhs where nim ='$mahasiswa'");
				$mhs    = $mhsi->row();
				$jrsn 	= $this->db->query("select * from tbl_jurusan where kd_jurusan ='$mhs->kd_kelas'");
                $jrsan  = $jrsn->row();
				$this->session->set_userdata(array('status_screening'=>'masuk','kd_jurusan'=>$jrsan->kd_jurusan,'jurusan'=>$jrsan->nm_jurusan,'nim_mhs'=>$mahasiswa,'nama_mhs'=>$mhs->nama,'nm_dosen'=>$nm_dosen));
				$output['message'] = 'Proses Masuk ...';
			}
			echo json_encode($output); 
		}else{
			chek_session_login_screening();
			$data['jurusan']=  $this->screening_model->get_jurusan()->result();
			$this->template->load('depan/template_screening','screening/view_login', $data);
		}
	}

	function group_by($array, $key) {
		$return = array();
		foreach($array as $val) {
			$return[$val[$key]][] = $val;
		}
		return $return;
	}

	function get_aspek_nilai($aspk){
		$test = explode(';', $aspk);
		foreach ($test as $key) {
			$hasil[] = explode(':', substr($key,4));			
		}			
		
		$elements = array();
		foreach($hasil as $parent){
			foreach($parent as $sub){				
				$elements[] = $sub;
			}
		}
		return $elements;
		/* $kode_umum = implode(',', $elements);

		return $kode_umum; */
	}

	function simpan_screening_percobaan(){
		if($_POST){
			$nim 		= $this->session->nim_mhs;
			$dosen 		= $this->session->nm_dosen;
			$kdjurusan 	= $this->session->kd_jurusan;
			$aspek_umum 	= $this->input->post('aspek_umum');
			$aspek_keahlian = $this->input->post('aspek_keahlian');		
			$isipumum 		= $this->input->post('isipumum');
			$isipjurusan 	= $this->input->post('isipjurusan');
			
			$kdum 	= $this->get_aspek_kode($aspek_umum,3); 
			$kdj  	= $this->get_aspek_kode($aspek_keahlian,3);
			$kdpu   = $this->get_aspek_kode($isipumum,3);
			$kdpj   = $this->get_aspek_kode($isipjurusan,4);

			
			$a = $this->get_aspek_nilai($aspek_umum);
			/* $b = $this->get_aspek_nilai($aspek_keahlian);			
			$c = array_merge($a, $b);
			
			$occurences = array_count_values($c);	
			$baik = ! empty($occurences['Baik']) ? $occurences['Baik'] : 0;
			$cukup = ! empty($occurences['Cukup']) ? $occurences['Cukup'] : 0;
			$kurang = ! empty($occurences['Kurang']) ? $occurences['Kurang'] : 0;

			$nilai_screening = 0;
			if($baik > $cukup){
				$nilai_screening = 90;
			}elseif($cukup > $baik){
				$nilai_screening = 75;
			}elseif($kurang > $cukup){
				$nilai_screening = 50;
			}elseif($kurang > $baik){
				$nilai_screening = 50;
			} */
			
			//var_dump($a);
			/* $idx = array("Baik","Cukup","Kurang");					
			$arr = array($idx,$a);				
			print_r($arr); */

			$baik = "";
			$cukup = "";
			$kurang = "";
			foreach( $a as $key => $value) {  				
				echo "Index: " .$key. " Value: " .$value. "\n";  				
			} 
			
			/* $ht = array_count_values($a);
			$inserted	= 0;	
			$no_array = 1; */
			/* foreach($a as $k){
				if( ! empty($k))
				{
					$pendidikan 		  = $_POST['pendidikan'][$no_array];
					$pendidikan_institusi = $_POST['pendidikan_institusi'][$no_array];	
					$pendidikan_tahun	  = $_POST['pendidikan_tahun'][$no_array];
					$pendidikan_ijazah	  = $_POST['pendidikan_ijazah'][$no_array];								
					$insert_apek_umum	= $this->screening_model->insert_aspek_umum($this->screening_model->buat_kode(), $pendidikan, $pendidikan_institusi, $pendidikan_tahun, $pendidikan_ijazah);
					if($insert_apek_umum)
					{
						$inserted++;								
					}
				}

				$no_array++;
			} */
		}
			
	}

	function simpan_screening(){
		if($_POST){
			$nim 		= $this->session->nim_mhs;
			$dosen 		= $this->session->nm_dosen;
			$kdjurusan 	= $this->session->kd_jurusan;
			$aspek_umum 	= $this->input->post('aspek_umum');
			$aspek_keahlian = $this->input->post('aspek_keahlian');		
			$isipumum 		= $this->input->post('isipumum');
			$isipjurusan 	= $this->input->post('isipjurusan');
			
			$kdum 	= $this->get_aspek_kode($aspek_umum,3); 
			$kdj  	= $this->get_aspek_kode($aspek_keahlian,3);
			$kdpu   = $this->get_aspek_kode($isipumum,3);
			$kdpj   = $this->get_aspek_kode($isipjurusan,4);

			
			$a = $this->get_aspek_nilai($aspek_umum);
			$b = $this->get_aspek_nilai($aspek_keahlian);			
			$c = array_merge($a, $b);
			
			$occurences = array_count_values($c);			
			/* $kurang = $occurences['Kurang']; */
			$baik = ! empty($occurences['Baik']) ? $occurences['Baik'] : 0;
			$cukup = ! empty($occurences['Cukup']) ? $occurences['Cukup'] : 0;
			$kurang = ! empty($occurences['Kurang']) ? $occurences['Kurang'] : 0;

			$nilai_screening = 0;
			if($baik > $cukup){
				$nilai_screening = 90;
			}elseif($cukup > $baik){
				$nilai_screening = 75;
			}elseif($kurang > $cukup){
				$nilai_screening = 50;
			}elseif($kurang > $baik){
				$nilai_screening = 50;
			}

			$data = array(
                'nim'=> $nim,
                'interviewer'=> $dosen,
                'kd_jurusan'=> $kdjurusan,
				'list_aspek_umum'=> $kdum,
				'list_jwb_aspek_umum'=> $aspek_umum,
				'list_aspek_keahlian'=> $kdj,
				'list_jwb_aspek_keahlian'=> $aspek_keahlian,
				'list_pumum'=> $kdpu,
				'list_jwb_pumum'=> $isipumum,
				'list_pjurusan'=> $kdpj,
				'list_jwb_pjurusan'=> $isipjurusan,
				'nilai'=> $nilai_screening,
				'created_datetime'=> date("Y-m-d")						
			);

            $simpan = $this->screening_model->proses_data_screening($data);
            
            if($simpan){
                echo json_encode(array('status' => 1, 'pesan' => "Anda sudah menyelesaikan screening ini"));
            }else{
                echo json_encode(array('status' => 0, 'pesan' => "Terjadi Kesalahan !"));
            }								
              
        }
		
	}

	function get_aspek_kode($aspek,$range){
		$aspk_umum = explode(';', $aspek);
		foreach ($aspk_umum as $key) {
			$hasil[] = explode(':', substr($key,0,$range));			
		}		
		$elements = array();
		foreach($hasil as $parent){
			foreach($parent as $sub){				
				$elements[] = $sub;
			}
		}
		$kode_umum = implode(',', $elements);

		return $kode_umum;
	}

	function logout(){
		$this->session->sess_destroy();  
		redirect('screening');      
    }
	
	function screeningtes(){
		chek_session_screening();
		$jurusan = $this->session->kd_jurusan;
		$data['title'] = 'Screening Test Online';
		$data['konten'] = 'screening/view_login';
		$data['kategori_aspek']=$this->screening_model->get_kategori_aspek();
		$data['aspek_keahlian']=$this->screening_model->get_aspek_keahlian($jurusan);
		$data['p_umum']=$this->screening_model->get_p_umum();
		$data['p_jurusan']=$this->screening_model->get_p_jurusan($jurusan);
		$this->template->load('depan/template_screening','screening/view_screening', $data);
	}	

	function get_autocomplete(){       
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->screening_model->search_mhs($searchTerm);
		echo json_encode($response);
	}
	
	/* function post_data(){
		if(isset($_POST['submit'])){  
			$jurusan = $this->input->post('jurusan');
			$mahasiswa = $this->input->post('mhs');
			$interviewer = $this->input->post('nm_dosen');
			$cookie = array(
				'jurusan'   => $mahasiswa,
				'nm_mhs'  => $jurusan,
				'nm_intrvewr' => $interviewer,
				'path'   => '/'
			);
			if($this->input->set_cookie($cookie))
			{
				redirect('Screening/coba');
			}
		}
	} */

	function coba(){
		
		echo $this->session->jurusan."<br>";
		echo $this->session->nama_mhs."<br>";
		echo $this->session->nm_dosen;
	}

}
