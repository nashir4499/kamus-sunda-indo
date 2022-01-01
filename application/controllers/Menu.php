<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login(); //letaknya di helper ->nashit_helper
        $this->load->model('Menu_model');
        $this->load->model('Kamus_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/menu_header', $data);
        $this->load->view('templates/menu_sidebar', $data);
        $this->load->view('templates/menu_topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/menu_footer');
    }

    public function tambahData()
    {
        // $this->load->model('Menu_model');
        if ($this->Menu_model->tambahDataKamus($_POST) > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat! Data berhasil di tambah</div>');
            redirect('menu/edit');
            exit;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal! Data gagal di tambah pesan error <?= $this->db->error(); 
            ?></div>');
            redirect('menu/edit');
            exit;
        }
    }

    public function edit()
    {
        $data['title'] = 'Menu Edit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kamus'] = $this->db->get('vocabulary')->result_array();
        if (isset($_POST["cari"])) {
            $data['kamus'] = $this->Menu_model->kamusCari();
            $data['cari'] = $this->input->post('search');
        }

        $this->load->view('templates/menu_header', $data);
        $this->load->view('templates/menu_sidebar', $data);
        $this->load->view('templates/menu_topbar', $data);
        $this->load->view('menu/edit', $data);
        $this->load->view('templates/menu_footer');
    }

    public function detail_ubah()
    {
        // $data['title'] = 'Detail Ubah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $this->load->model('Menu_model');
        echo json_encode($this->Menu_model->getDataKamusById($_POST['id_vocab']));

        // $this->load->view('templates/menu_header', $data);
        // $this->load->view('templates/menu_sidebar', $data);
        // $this->load->view('templates/menu_topbar', $data);
        // $this->load->view('menu/detail_ubah', $data);
        // $this->load->view('templates/menu_footer');
    }
    public function ubahData()
    {
        // $this->load->model('Menu_model');
        if ($this->Menu_model->ubahDataKamus($_POST) > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat! Data berhasil di Ubah</div>');
            redirect('menu/edit');
            exit;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal! Data gagal di ubah pesan error <?= $this->db->error(); 
            ?></div>');
            redirect('menu/edit');
            exit;
        }
    }

    public function users()
    {
        $data['title'] = 'User List';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->get('user')->result_array();

        $this->load->view('templates/menu_header', $data);
        $this->load->view('templates/menu_sidebar', $data);
        $this->load->view('templates/menu_topbar', $data);
        $this->load->view('menu/users', $data);
        $this->load->view('templates/menu_footer');
    }
    public function hapusData($id)
    {
        if ($this->Menu_model->hapusDatakamus($id) > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat! Data berhasil dihapus</div>');
            redirect('menu/edit');
            exit;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal! Data gagal dihapus pesan error <?= $this->db->error(); 
            ?></div>');
            redirect('menu/edit');
            exit;
        }
    }

    public function profil()
    {
        $data['title'] = 'Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/menu_header', $data);
        $this->load->view('templates/menu_sidebar', $data);
        $this->load->view('templates/menu_topbar', $data);
        $this->load->view('menu/profil', $data);
        $this->load->view('templates/menu_footer');
    }

    public function ubahFotoProfil()
    {
        // $this->load->model('Menu_model');
        if ($this->Menu_model->ubahFotoProfil($_POST) > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat! Data berhasil di Ubah</div>');
            redirect('menu/profil');
            exit;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal! Data gagal di ubah pesan error <?= error_log; ?></div>');
            redirect('menu/profil');
            exit;
        }
    }
    public function ubahProfil()
    {
        $ubah = (isset($_GET["ubah"]) ? $_GET["ubah"] : '');
        switch ($ubah) {
            case 'nama':
                if ($this->Menu_model->ubahProfil($_POST) > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Selamat! Data berhasil di Ubah</div>');
                    redirect('menu/profil');
                    exit;
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Gagal! Data gagal di ubah pesan error <?= error_log; ?></div>');
                    redirect('menu/profil');
                    exit;
                }
                break;
            case 'password':

                $cekpass = $this->Menu_model->cekPass();
                if ($cekpass == false) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password lama salah atau Password lama dan baru sama atau Password tidak baru tidak sama!</div>');
                    redirect('menu/profil');
                } else {
                    if ($this->Menu_model->ubahPassProfil($_POST) > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                    Selamat! Data berhasil di Ubah</div>');
                        redirect('menu/profil');
                        exit;
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                Gagal! Data gagal di ubah pesan error <?= error_log; ?></div>');
                        redirect('menu/profil');
                        exit;
                    }
                }
                break;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda telah logout!</div>');
        redirect('auth');
    }
}
