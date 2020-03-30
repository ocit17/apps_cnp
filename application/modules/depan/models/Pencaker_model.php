<?php
class Pencaker_model extends CI_Model {

        function carinim($nim)
        {
                $this->db->select('*'); 
                $this->db->from('m_mhs');
                $this->db->where('nim', $nim);
                $query = $this->db->get();
                $result = $query->result_array();
                return $result;
        }

        function getnama($nim){
			$hsl=$this->db->query("SELECT * FROM m_mhs WHERE nim='$nim'");
			if($hsl->num_rows()>0){
				foreach ($hsl->result() as $data) {
					$hasil=array(
						'nim' => $data->nim,
						'nama' => $data->nama,
						);
				}
			}
			return $hasil;
		}

        function get_prodi(){
                $hasil=$this->db->query("SELECT * FROM tbl_prodi");
                return $hasil;
        }

        function get_jurusan($id){
                $hasil=$this->db->query("SELECT * FROM tbl_jurusan WHERE prodi='$id'");
                return $hasil->result();
        }

        /* function proses_daftar($nim,$nama1,$email,$sandi,$jurusan,$telp,$cv_mhs,$foto_mhs)
        {               
                $this->db->set('nama_depan', $nama1);
                $this->db->set('email', $email);
                $this->db->set('kata_sandi', $sandi);
                $this->db->set('kd_jurusan', $jurusan);
                $this->db->set('no_telp', $telp);
                $this->db->set('cv_mhs', $cv_mhs);
                $this->db->set('foto', $foto_mhs);
                $this->db->where('nim', $nim);
                $result=$this->db->update('tbl_mhs');
                return $result;
        } */

        function proses_daftar($nim,$nama1,$email,$sandi,$jurusan,$telp,$cv_mhs,$foto_mhs){
                $data=array(
                        'nim'=> $nim,
                        'nama_mhs'=> $nama1,
                        'email'=> $email,
                        'kata_sandi'=> $sandi,
                        'kd_jurusan'=> $jurusan,
                        'no_telp'=> $telp,
                        'cv_mhs'=> $cv_mhs,
                        'foto'=> $foto_mhs
                        );
                $this->db->insert('tbl_mhs',$data);
        }
}