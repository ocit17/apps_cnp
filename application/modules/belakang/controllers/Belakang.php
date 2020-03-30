<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belakang extends MX_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->model('mhs_model');
        $this->load->library('excel');
        $this->load->library('Pdf');
	}
	

	function logout()
    {
        $this->session->sess_destroy();
        redirect('belakang/login');
    }

    function get_aspek_nilai($aspk,$range){
		$test = explode(';', $aspk);
		foreach ($test as $key) {
			$hasil[] = explode(':', substr($key,$range));			
		}			
		
		$elements = array();
		foreach($hasil as $parent){
			foreach($parent as $sub){				
				$elements[] = $sub;
			}
		}
		return $elements;
	}
    
    function contoh($nim){
        $interviewer = "";
        $list_aspek_umum = "";
        $list_jwb_aspek_umum = "";
        $list_aspek_keahlian = "";
        $list_jwb_aspek_keahlian = "";
        $list_pumum  = "";
        $list_jwb_pumum  = "";
        $list_pjurusan = "";
        $list_jwb_pjurusan = "";
        $nilai = "";
        $print = "";
        $dt_pribadi = $this->mhs_model->show_dt_diri($nim);
        foreach($dt_pribadi->result_array() as $i):  
            $nama                       = $i['nama'];
            $nm_jurusan                 = $i['nm_jurusan'];        
            $interviewer                = $i['interviewer'];
            $kd_jurusan                 = $i['kd_jurusan'];
            $list_aspek_umum            = $i['list_aspek_umum'];
            $list_jwb_aspek_umum        = $i['list_jwb_aspek_umum'];
            $list_aspek_keahlian        = $i['list_aspek_keahlian'];
            $list_jwb_aspek_keahlian    = $i['list_jwb_aspek_keahlian'];
            $list_pumum                 = $i['list_pumum'];
            $list_jwb_pumum             = $i['list_jwb_pumum'];
            $list_pjurusan              = $i['list_pjurusan'];
            $list_jwb_pjurusan          = $i['list_jwb_pjurusan'];
            $ipk                        = $i['ipk'];
            $ujikom                     = $i['ujikom'];
            $nilai                      = $i['nilai'];
            $tgl                        = $i['tgl'];
            $print                      = $i['print'];
        endforeach;         
        
        if($print == 1){
            redirect(base_url()."belakang/print_screening/".$nim);          
        }else{
            /*=======================Aspek Umum==============================*/
            $kdumum = explode(',',$list_aspek_umum);
            $jawabanumum = $this->get_aspek_nilai($list_jwb_aspek_umum,4);
            $insert_aspek_umum = 'insert_aspek_umum';
            $umum = $this->simpan_dt_screening($kdumum,$jawabanumum,$nim,$insert_aspek_umum);
            /*=======================Aspek Umum==============================*/
            
            /*=======================Aspek Jurusan==============================*/
            $kdjrs = explode(',',$list_aspek_keahlian);
            $jawabanjrs = $this->get_aspek_nilai($list_jwb_aspek_keahlian,4);
            $insert_aspek_jurusan = 'insert_aspek_jurusan';
            $jurusan = $this->simpan_dt_screening($kdjrs,$jawabanjrs,$nim,$insert_aspek_jurusan);
            /*=======================Aspek Jurusan==============================*/

            /*=======================Pertanyaan Umum==============================*/
            $kdpu = explode(',',$list_pumum);
            $jawabanpu = $this->get_aspek_nilai($list_jwb_pumum,4);
            $insert_p_umum = 'insert_p_umum';
            $pumum = $this->simpan_dt_screening($kdpu,$jawabanpu,$nim,$insert_p_umum);
            /*=======================Pertanyaan Jurusan==============================*/

            /*=======================Pertanyaan Jurusan==============================*/
            $kdpj = explode(',',$list_pjurusan);
            $jawabanpj = $this->get_aspek_nilai($list_jwb_pjurusan,5);
            $insert_p_jurusan = 'insert_p_jurusan';
            $pjurusan = $this->simpan_dt_screening($kdpj,$jawabanpj,$nim,$insert_p_jurusan);
            /*=======================Pertanyaan Jurusan==============================*/
            $this->update_print($nim); 
            redirect(base_url()."belakang/print_screening/".$nim); 
        }
            
    }

    function update_print($nim){
        /* $update = $this->mhs_model->edit($nim);
        if($update){
            echo "Udeh Keupdate";
        } */
        return $this->mhs_model->edit($nim);
    }

    function simpan_dt_screening($var_kode,$var_jwb,$nim,$fungsi){
        $kode = array();
        foreach($var_kode as $kd){
            $kode[] = $kd;
        }
        $jwb = array();
        foreach($var_jwb as $j){
            $jwb[] = $j;
        }        

        $inserted	= 0;
        $no_array	= 0;
        foreach($var_kode as $k)
        {
            if( ! empty($k))
            {
                $kd 	= $kode[$no_array];
                $jw     = $jwb[$no_array];								
                $simpan	= $this->mhs_model->$fungsi($nim, $kd, $jw);
                if($simpan)
                {
                    $inserted++;								
                }
            }

            $no_array++;
        }
        /* if($inserted > 0)
        {												
            echo "Berhasil";
        } */
        return $inserted;
    }

    function print_screening($nim)
    {
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Bang Ocit');
        $pdf->SetTitle('Hasil Screening Tes');
        $pdf->SetSubject('Hasil Screening Tes');
        $pdf->SetKeywords('Hasil Screening Tes');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // add a page        
        $pdf->AddPage('L', 'A4');
        $th1 = date('Y');
        $th2 = date('Y', strtotime('+2 years', strtotime('Y')));
        //$tahun_angkatan = $th1." / ".$th2;
        $tahun_angkatan = "2017/2018";
        // Title
        $pdf->SetFont('helvetica','B',12); 
        $pdf->Cell(0, 15, 'Hasil Screening Tes', 0, false, 'C', 0, '', 0, false, 'M', 'M');          
        $pdf->Ln(5);  
        $pdf->Cell(0, 15, 'Persiapan Penempatan Kerja', 0, false, 'C', 0, '', 0, false, 'M', 'M');      
        $pdf->Ln(5);  
        $pdf->Cell(0, 15, 'Mahasiswa Angkatan '.$tahun_angkatan , 0, false, 'C', 0, '', 0, false, 'M', 'M');    
        $pdf->Ln(5);   
        $garis = '
            <hr>
        ';
        $pdf->writeHTML($garis, true, false, false, false, '');
        $pdf->SetFont('helvetica', '', 8);
        $pdf->Ln(-10);
        /* ============================================================= */
        $nama = "";
        $nm_jurusan = "";
        $interviewer = "";
        $list_aspek_umum = "";
        $list_jwb_aspek_umum = "";
        $nilai = "";
        $dt_pribadi = $this->mhs_model->show_dt_diri($nim);
        foreach($dt_pribadi->result_array() as $i):  
            $nama                       = $i['nama'];
            $nm_jurusan                 = $i['nm_jurusan'];        
            $interviewer                = $i['interviewer'];
            $kd_jurusan                 = $i['kd_jurusan'];
            $list_aspek_umum            = $i['list_aspek_umum'];
            $list_jwb_aspek_umum        = $i['list_jwb_aspek_umum'];
            $list_aspek_keahlian        = $i['list_aspek_keahlian'];
            $list_jwb_aspek_keahlian    = $i['list_jwb_aspek_keahlian'];
            $list_pumum                 = $i['list_pumum'];
            $list_jwb_pumum             = $i['list_jwb_pumum'];
            $list_pjurusan              = $i['list_pjurusan'];
            $list_jwb_pjurusan          = $i['list_jwb_pjurusan'];
            $ipk                        = $i['ipk'];
            $ujikom                     = $i['ujikom'];
            $nilai                      = $i['nilai'];
            $tgl                        = $i['tgl'];

            $keterangan_diri = '
                <table cellpadding="2">
                    <tr><td width="100px">Nama Peserta</td><td width="10px">:</td><td>'.$nama.'</td></tr>
                    <tr><td width="100px">Prodi/Jurusan</td><td width="10px">:</td><td>'.$nm_jurusan.'</td></tr>  
                    <tr><td width="100px">Hari Tanggal</td><td width="10px">:</td><td>'.$tgl.'</td></tr>  
                    <tr><td width="100px">Prestasi Akademik</td><td width="10px">:</td>
                        <td>
                            <table cellspacing="0" cellpadding="5" border="1" width="500px">
                                <tr>
                                    <th>IPK</th>
                                    <th>Hasil Ujikom I,II,III</th>
                                    <th>Hasil Screening Test</th>
                                    <th>TOEIC</th>
                                </tr>
                                <tr>
                                    <td>'.$ipk.'</td>
                                    <td>'.$ujikom.'</td>
                                    <td>'.$nilai.'</td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                    </tr>              
                </table>
            ';
            $pdf->writeHTML($keterangan_diri, true, false, false, false, '');
        endforeach;
        /* ============================================================= */            
        $aspek = ' 
            <table cellspacing="0" cellpadding="5" border="0">           
                <tr>
                    <th style="border: 1px solid black;text-align:center" width="30px">NO</th>
                    <th style="border: 1px solid black;" width="200px">ASPEK UMUM</th>
                    <th style="border: 1px solid black;" width="490px">URAIAN</th>
                    <th style="border: 1px solid black;" width="60px">PENILAIAN</th>
                </tr>'; 
        $um = $this->mhs_model->aspek_umum($nim);
        $no = 1;
        foreach($um->result_array() as $ai => $ii): 
            $umm = $ii['aspek'];                                       
        $aspek .='<tr>
                    <td style="border: 1px solid black;text-align:center">'.$no.'</td>
                    <td style="border: 1px solid black;">'.$umm.'</td>
                    <td style="border: 1px solid black;">'.$ii['uraian'].'</td>
                    <td style="border: 1px solid black;">'.$ii['jawaban'].'</td>
                </tr>                      
        ';
        $no ++;
        endforeach;
        $aspek .='</table>';
        $pdf->writeHTML($aspek, true, false, false, false, '');        
        /* ============================================================= */

        $aspek_jurusan = ' 
            <table cellspacing="0" cellpadding="5" border="0">           
                <tr>
                    <th style="border: 1px solid black;text-align:center" width="30px">NO</th>
                    <th style="border: 1px solid black;" width="200px">ASPEK KEAHLIAN</th>
                    <th style="border: 1px solid black;" width="490px">URAIAN</th>
                    <th style="border: 1px solid black;" width="60px">PENILAIAN</th>
                </tr>'; 
        $um = $this->mhs_model->aspek_keahlian($nim);
        $no = 1;
        foreach($um->result_array() as $ai => $ii): 
            $umm = $ii['aspek'];                                       
        $aspek_jurusan .='<tr>
                    <td style="border: 1px solid black;text-align:center">'.$no.'</td>
                    <td style="border: 1px solid black;">'.$umm.'</td>
                    <td style="border: 1px solid black;">'.$ii['uraian'].'</td>
                    <td style="border: 1px solid black;">'.$ii['jawaban'].'</td>
                </tr>                      
        ';
        $no ++;
        endforeach;
        $aspek_jurusan .='</table>';
        $pdf->writeHTML($aspek_jurusan, true, false, false, false, ''); 

        /* ============================================================= */
        $ks = $nilai;
        $kerja = "";
        $magang = "";
        $tidak = "";
        if($ks=='90'){
            $kerja = "V";
        }
        if($ks=='75'){
            $magang = "V";
        }
        if($ks=='50'){
            $tidak = "V";
        }
        $kesimpulan = '
            <table cellspacing="0" cellpadding="5" border="1" width="150px">           
                <tr><th colspan="2"><strong>KESIMPULAN:</strong></th></tr>         
                <tr>
                    <td width="120px">Siap Magang/Kerja</td>
                    <td width="30px" style="text-align:center">'.$kerja.'</td>
                </tr>
                <tr>
                    <td>Belum Siap Magang/Kerja</td>
                    <td style="text-align:center">'.$magang.'</td>
                </tr>
                <tr>
                    <td>Tidak Siap Magang/Kerja</td>
                    <td style="text-align:center">'.$tidak.'</td>
                </tr>
            </table>      
        ';
        $pdf->writeHTML($kesimpulan, true, false, false, false, '');

        /* ============================================================= */

        $interview = '            
            <table>
                <tr><td></td><td></td><td style="text-align:center">Interviewer</td></tr>
                <tr><td></td><td></td><td></td></tr>
                <tr><td></td><td></td><td></td></tr>
                <tr><td></td><td></td><td></td></tr>
                <tr><td></td><td></td><td></td></tr>
                <tr><td></td><td></td><td style="text-align:center">'.$interviewer.'</td></tr>                         
            </table>
        ';
        $pdf->writeHTML($interview, true, false, false, false, '');

        /* ============================================================= */

        $pdf->AddPage('P', 'A4');
        $th1 = date('Y');
        $th2 = date('Y', strtotime('+2 years', strtotime('Y')));
        /* $tahun_angkatan = $th1." / ".$th2; */
        $tahun_angkatan = "2017/2018";
        // Title
        $pdf->SetFont('helvetica','B',12); 
        $pdf->Cell(0, 15, 'Screening Minat dan Kompetensi', 0, false, 'C', 0, '', 0, false, 'M', 'M');          
        $pdf->Ln(5);  
        $pdf->Cell(0, 15, 'Persiapan Penempatan Magang/Kerja', 0, false, 'C', 0, '', 0, false, 'M', 'M');      
        $pdf->Ln(5);  
        $pdf->Cell(0, 15, 'Mahasiswa Angkatan '.$tahun_angkatan , 0, false, 'C', 0, '', 0, false, 'M', 'M');    
        $pdf->Ln(5);   
        $garis = '
            <hr>
        ';
        $pdf->writeHTML($garis, true, false, false, false, '');
        $pdf->SetFont('helvetica', '', 8);
        $pdf->Ln(-10);
        /* ============================================================= */

        $dt_peserta = '
            <table cellpadding="2">
                <tr><td width="100px">Nama Peserta</td><td width="10px">:</td><td>'.$nama.'</td></tr>
                <tr><td width="100px">Prodi/Jurusan</td><td width="10px">:</td><td>'.$nm_jurusan.'</td></tr> 
            </table>
        ';
        $pdf->writeHTML($dt_peserta, true, false, false, false, '');

        $keterangan_diri = '
            <p><strong>Pertanyaan:</strong></p>
            <ol>';
        $um = $this->mhs_model->pumum($nim);
        foreach($um->result_array() as $ai => $ii):
        $keterangan_diri .= '    
            <li><p>'.$ii['pertanyaan'].'</p>'.$ii['jwb_p_umum'].'</li>';
        endforeach;

        $jrs = $this->mhs_model->pjurusan($nim);
        foreach($jrs->result_array() as $ai => $ii):
        $keterangan_diri .= '    
            <li><p>'.$ii['j_pertanyaan'].'</p>'.$ii['jwb_p_jurusan'].'</li>';
        endforeach;
        $tahun = date('Y');
        $keterangan_diri .= '</ol>
            <p style="text-align: justify;"></p>  <p style="text-align: justify;"></p>       
            <table>
                <tr><td>Cileungsi, &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. '.$tahun.'</td><td style="text-align:center">Interviewer</td></tr>
                <tr><td></td><td></td></tr>
                <tr><td></td><td></td></tr>
                <tr><td></td><td></td></tr>
                <tr><td></td><td></td></tr>
                <tr><td></td><td style="text-align:center">'.$interviewer.'</td></tr>                         
            </table>
        ';
        $pdf->writeHTML($keterangan_diri, true, false, false, false, '');

        //ob_end_clean();
        //Close and output PDF document
        $pdf->Output('Hasil_Screening_'.$nama.'.pdf', 'I');

    }
	
	function login()
    {
        if(isset($_POST['submit'])){            
            // proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            $hasil=  $this->mhs_model->login($username,$password);
            if($hasil==1)
            {
                // update last login
                $this->db->where('username',$username);
                $this->db->update('operator',array('last_login'=>date('Y-m-d')));
                $this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
                redirect('belakang');
            }
            else{
                redirect('belakang/login');
            }
        }
        else{
            //$this->load->view('form_login2');
            chek_session_login();
            $this->template->load('admin/template_login','auth/form_login');
        }
    }

	function index()
	{		
		chek_session();
		$data['title'] = 'Dashboard C&P';
		$data['konten'] = 'beranda/beranda';
		$this->template->load('admin/template_admin','beranda/beranda', $data);
    }
    
    function data_screening(){
		chek_session();
		$this->load->helper('download');
		$data['title'] = 'Data Screening';
		$data['konten'] = 'data/view_data_sc';
		$data['screening']=$this->mhs_model->show_screening();
		$this->template->load('admin/template_admin','data/view_data_sc', $data);
    }
	
	function data_mahasiswa(){
		chek_session();
		$this->load->helper('download');
		$data['title'] = 'Dashboard C&P';
		$data['konten'] = 'data/view_data_mhs';
		$data['mhs']=$this->mhs_model->show_mhs();
		$this->template->load('admin/template_admin','data/view_data_mhs', $data);
    }
    
    function import_nim()
	{
		chek_session();
		$data['title'] = 'Dashboard C&P';
        $data['konten'] = 'data/view_mhs';
        $data['mhs']=$this->mhs_model->select_mhs();
		$this->template->load('admin/template_admin','data/view_mhs', $data);
    }
    
    function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$nim = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$data[] = array(
						'nim'		=>	$nim,
						'nama'		=>	$nama
					);
				}
			}
			$this->mhs_model->insert($data);
			echo 'Mahasiswa';
		}	
    }
    
    function import_dtmhs()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$nim = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $kd_kelas = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $ipk = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$ujikom = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$data[] = array(
						'nim'		    =>$nim,
                        'nama'		    =>$nama,
                        'kd_kelas'	    =>$kd_kelas,
                        'ipk'		    =>$ipk,
						'ujikom'		=>$ujikom
					);
				}
			}
			$this->mhs_model->insert_dtmhs($data);
			echo 'Mahasiswa';
		}	
	}
	
	function download($id){
		chek_session();
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');            
            //get file info from database
            $fileInfo = $this->mhs_model->getRows(array('nim' => $id));            
            //file path
            $file = 'assets/cnp/file/cv/'.$fileInfo['cv_mhs'];            
            //download file from directory
            force_download($file, NULL);
        }
    }

    function email()
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.kampuscileungsi.id',
            'smtp_port' => 587,
            'smtp_user' => 'student@kampuscileungsi.id',
            'smtp_pass' => 'ICTFORT2',
            'smtp_timeout' => '7', 
            'mailtype'  => 'html', 
            'crlf'      => '\r\n', 
            'newline'   => '\r\n', 
            'charset'   => 'iso-8859-1',
            'validation' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n"); 

        $this->email->from('student@kampuscileungsi.id', 'student@kampuscileungsi.id');
        $this->email->to('setiawantribagus2@gmail.com');
        $this->email->cc('fajarchaerul.h@gmail.com');
        $this->email->bcc('abdulrosid228@gmail.com ');

        $this->email->subject('Email Test K&P');
        $this->email->message('<html>
                                <head>
                                <style>
                                table {
                                  font-family: arial, sans-serif;
                                  border-collapse: collapse;
                                  width: 100%;
                                }
                                
                                td, th {
                                  border: 1px solid #dddddd;
                                  text-align: left;
                                  padding: 8px;
                                }
                                
                                tr:nth-child(even) {
                                  background-color: #dddddd;
                                }
                                </style>
                                </head>
                                <body>
                                
                                <h2>HTML Table</h2>
                                
                                <table>
                                  <tr>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Country</th>
                                  </tr>
                                  <tr>
                                    <td>Alfreds Futterkiste</td>
                                    <td>Maria Anders</td>
                                    <td>Germany</td>
                                  </tr>
                                  <tr>
                                    <td>Centro comercial Moctezuma</td>
                                    <td>Francisco Chang</td>
                                    <td>Mexico</td>
                                  </tr>
                                  <tr>
                                    <td>Ernst Handel</td>
                                    <td>Roland Mendel</td>
                                    <td>Austria</td>
                                  </tr>
                                  <tr>
                                    <td>Island Trading</td>
                                    <td>Helen Bennett</td>
                                    <td>UK</td>
                                  </tr>
                                  <tr>
                                    <td>Laughing Bacchus Winecellars</td>
                                    <td>Yoshi Tannamuri</td>
                                    <td>Canada</td>
                                  </tr>
                                  <tr>
                                    <td>Magazzini Alimentari Riuniti</td>
                                    <td>Giovanni Rovelli</td>
                                    <td>Italy</td>
                                  </tr>
                                </table>
                                
                                </body>
                                </html>');

        $result = $this->email->send();
        // Tampilkan pesan sukses atau error
        if ($result) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.</br>'.$this->email->print_debugger();
        }
    }

    function tes_gmail(){
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        switch ($_SERVER['HTTP_HOST'])
        {
            case 'career.kampuscileungsi.id':
                $uname = 'ict.2019.cileungsi@gmail.com';
                $pwd   = 'zrlgvwbltlyozotf';
            break;
            default:
                switch ($_SERVER['SERVER_ADMIN'])
                {
                    case 'admin@vmware.localdomain':
                        $uname = 'kp.cipicung.11@gmail.com';
                        $pwd   = 'lubffwjztqaweefm';
                    break;
                    default:
                        $uname = 'kp.cipicung.11@gmail.com';
                        $pwd   = 'lubffwjztqaweefm';
                    break;
                }
            break;
        }
        $config['smtp_user'] =  $uname;
        $config['smtp_pass'] =  $pwd;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $ci->email->initialize($config);

        $data = array(
            'userName'=> 'tesss'
        );

        $email_body = $this->load->view('data/view_email', $data, TRUE);
        
        $ci->email->from('pnk@gmail.com', 'Penempatan & Kerjasama Cileungsi');
        $list = array('ict.2019.cileungsi@gmail.com','fajarchaerul.h@gmail.com','setiawantribagus2@gmail.com');
        $ci->email->to($list);
        $this->email->reply_to('pnk@gmail.com', 'Penempatan & Kerjasama Cileungsi');
        $ci->email->subject('This is an email test');
        $ci->email->message($email_body);
        
        if($ci->email->send()) {
            echo 'Sukses! email berhasil dikirim.';       
        } else {
            echo 'Error! email tidak dapat dikirim.</br>'.$this->email->print_debugger();
        } 
    }
}