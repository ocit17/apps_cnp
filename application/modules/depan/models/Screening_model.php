<?php
    class Screening_model extends CI_Model {
        function get_kategori_aspek(){
            return $this->db->query("select * from tbl_aspek_umum");
        }

        function get_aspek_keahlian($jurusan){
            return $this->db->query("SELECT * FROM aspek_keahlian where kd_jurusan='$jurusan'");
        }

        function get_p_umum(){
            return $this->db->query("SELECT * FROM tbl_pumum");
        }

        function get_p_jurusan($jurusan){
            return $this->db->query("SELECT * FROM tbl_pjurusan where kd_jurusan='$jurusan'");
        }

        function get_jurusan(){
            $query = $this->db->get('tbl_jurusan');
            return $query;  
        }

        function search_mhs($searchTerm=""){
            $fetched_records = $this->db->query("SELECT * FROM dt_mhs where nim not in (select nim from tr_ikut_screening) and nama like '%".$searchTerm."%'");
            $users = $fetched_records->result_array();
    
            $data = array();
            foreach($users as $user){
               $data[] = array("id"=>$user['nim'], "text"=>$user['nama']);
            }
            return $data;
        }

        function login_screening($mahasiswa){
            $chek= $this->db->query("select * from m_mhs where nim ='$mahasiswa'");
            if($chek->num_rows()>0){
                return 1;
            }
            else{
                return 0;
            }
        }

        function proses_data_screening($data){
            return $this->db->insert('tr_ikut_screening',$data);
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

        function insert_aspek_umum($last_id, $pendidikan, $pendidikan_institusi, $pendidikan_tahun, $pendidikan_ijazah){
            $dt = array(
                'id_karyawan'    => $last_id,
                'jenjang_pddk'   => $pendidikan,
                'nama_institusi' => $pendidikan_institusi,
                'tahun_lulus'    => $pendidikan_tahun,
                'berijazah'      => $pendidikan_ijazah
            );
    
            return $this->db->insert('employe_register_riwayat_pddk', $dt);
        }

    }