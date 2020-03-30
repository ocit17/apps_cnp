<?php
class Mhs_model extends CI_Model {

    function show_mhs(){

        $this->db->select('*');
        $this->db->from('tbl_mhs');
        $this->db->join('tbl_jurusan', 'tbl_jurusan.kd_jurusan = tbl_mhs.kd_jurusan');
        $query = $this->db->get();

        return $query;
    } 
    
    function select_mhs()
	{
		$this->db->order_by('nim', 'ASC');
		$query = $this->db->get('m_mhs');
		return $query;
    }

    function show_screening(){
        return $this->db->query("SELECT a.nim,b.nama,a.interviewer,a.kd_jurusan,c.nm_jurusan,a.list_aspek_umum,a.list_jwb_aspek_umum,a.list_aspek_keahlian,
        a.list_jwb_aspek_keahlian,a.list_pumum,a.list_jwb_pumum,a.list_pjurusan,a.list_jwb_pjurusan,a.nilai
        FROM tr_ikut_screening a
        LEFT JOIN m_mhs b on a.nim=b.nim
        LEFT JOIN tbl_jurusan c on a.kd_jurusan=c.kd_jurusan");
    }

    function show_dt_diri($nim){
        return $this->db->query(" SELECT a.nim,b.nama,a.interviewer,a.kd_jurusan,c.nm_jurusan,a.list_aspek_umum,a.list_jwb_aspek_umum,a.list_aspek_keahlian,
        a.list_jwb_aspek_keahlian,a.list_pumum,a.list_jwb_pumum,a.list_pjurusan,a.list_jwb_pjurusan,b.ipk,b.ujikom,a.nilai,a.print,
        CONCAT(
            CASE DAYOFWEEK(created_datetime)
                WHEN 1 THEN 'Minggu'
                WHEN 2 THEN 'Senin'
                WHEN 3 THEN 'Selasa'
                WHEN 4 THEN 'Rabu'
                WHEN 5 THEN 'Kamis'
                WHEN 6 THEN 'Jumat'
                WHEN 7 THEN 'Sabtu'
            END,', ',
            DAY(created_datetime),' ',
            CASE MONTH(created_datetime)
                WHEN 1 THEN 'Januari' 
                WHEN 2 THEN 'Februari'
                WHEN 3 THEN 'Maret'
                WHEN 4 THEN 'April' 
                WHEN 5 THEN 'Mei'
                WHEN 6 THEN 'Juni'
                WHEN 7 THEN 'Juli' 
                WHEN 8 THEN 'Agustus'
                WHEN 9 THEN 'September'
                WHEN 10 THEN 'Oktober' 
                WHEN 11 THEN 'November'
                WHEN 12 THEN 'Desember'
            END,' ',
            YEAR(created_datetime)
        ) AS tgl
        FROM tr_ikut_screening a
        LEFT JOIN dt_mhs b on a.nim=b.nim
        LEFT JOIN tbl_jurusan c on a.kd_jurusan=c.kd_jurusan
        WHERE a.nim = '$nim' ");
    }
    
    function aspek_umum($nim){       
        return $this->db->query("SELECT a.*,b.aspek,b.uraian FROM tbl_jwb_aspek_umum a
        LEFT JOIN tbl_aspek_umum b ON a.kd_aspek_umum=b.kode_umum where a.nim_mhs='$nim'");
    }

    function aspek_keahlian($nim){       
        return $this->db->query("SELECT b.uraian,b.aspek,a.* FROM tbl_jwb_aspek_jurusan a
        LEFT JOIN aspek_keahlian b ON a.kd_aspek_jurusan=b.kode_keahlian where a.nim_mhs='$nim'");
    }

    function pumum($nim){       
        return $this->db->query("SELECT b.pertanyaan,a.* FROM tbl_jwb_p_umum a
        LEFT JOIN tbl_pumum b ON a.kd_p_umum=b.kdpu where nim_mhs='$nim'");
    }

    function pjurusan($nim){       
        return $this->db->query("SELECT b.j_pertanyaan,a.* FROM tbl_jwb_p_jurusan a
        LEFT JOIN tbl_pjurusan b ON a.kd_p_jurusan=b.kd_pjurusan where a.nim_mhs='$nim'");
    }
    
    function insert($data){
		$this->db->insert_batch('m_mhs', $data);
    }
    
    function insert_dtmhs($data){
		$this->db->insert_batch('dt_mhs', $data);
	}

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('tbl_mhs');
        $this->db->where('status','1');
        if(array_key_exists('nim',$params) && !empty($params['nim'])){
            $this->db->where('nim',$params['nim']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }

    function login($username,$password)
    {
        $chek=  $this->db->get_where('operator',array('username'=>$username,'password'=>  md5($password)));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }

    function buat_kode(){
        $this->db->select('RIGHT(tbl_master_screening.kd_screening,3) as kode', FALSE);
        $this->db->order_by('kd_screening','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tbl_master_screening');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
         //jika kode ternyata sudah ada.      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
        $kodejadi = "SC-CNP-".$kodemax;    // hasilnya FR-SDM-001 dst.
        return $kodejadi;  
    }

    function insert_aspek_umum($nim, $kd, $jwb){
        $dt = array(
            'nim_mhs'       => $nim,
            'kd_aspek_umum '=> $kd,
            'jawaban'       => $jwb
        );

        return $this->db->insert('tbl_jwb_aspek_umum', $dt);
    }

    function insert_aspek_jurusan($nim, $kd, $jwb){
        $dt = array(
            'nim_mhs'           => $nim,
            'kd_aspek_jurusan'  => $kd,
            'jawaban'           => $jwb
        );

        return $this->db->insert('tbl_jwb_aspek_jurusan', $dt);
    }

    function insert_p_umum($nim, $kd, $jwb){
        $dt = array(
            'nim_mhs'     => $nim,
            'kd_p_umum'   => $kd,
            'jwb_p_umum'  => $jwb
        );

        return $this->db->insert('tbl_jwb_p_umum', $dt);
    }

    function insert_p_jurusan($nim, $kd, $jwb){
        $dt = array(
            'nim_mhs'       => $nim,
            'kd_p_jurusan'  => $kd,
            'jwb_p_jurusan' => $jwb
        );

        return $this->db->insert('tbl_jwb_p_jurusan', $dt);
    }

    function edit($nim)
    {
        /* $this->db->where('nim',$nim);
        $this->db->update('tr_ikut_screening',$data); */
        return $this->db->query("update tr_ikut_screening set print=1 where nim ='$nim'");
    }

}