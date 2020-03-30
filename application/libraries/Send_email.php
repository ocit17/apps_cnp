<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send_email{

	function gmail($tujuan,$pesan){
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
            
            $ci->email->from('pnk@gmail.com', 'Penempatan & Kerjasama Cileungsi');
            $list = array($tujuan);
            $ci->email->to($list);
            $ci->email->reply_to('pnk@gmail.com', 'Penempatan & Kerjasama Cileungsi');
            $ci->email->subject('Pemberitahuan PNK');
            $ci->email->message($pesan);
            
            if($ci->email->send()) {
                echo 'Sukses! email berhasil dikirim.';       
            } else {
                echo 'Error! email tidak dapat dikirim.</br>'.$this->email->print_debugger();
            } 
    }
    
}