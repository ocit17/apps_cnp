<?php

function chek_session()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login');
    if($session!='oke')
    {
        redirect('belakang/login');
    }
}


function chek_session_login()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login');
    if($session=='oke')
    {
        redirect('belakang');
    }
}


function chek_session_screening()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_screening');
    if($session!='masuk')
    {
        redirect('screening');
    }
}

function chek_session_login_screening()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_screening');
    if($session=='masuk')
    {
        redirect('screening/screeningtes');
    }
}

?>
