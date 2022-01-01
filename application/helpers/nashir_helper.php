<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    }
}

function cek_login_auth()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        redirect('menu');
    }
}
