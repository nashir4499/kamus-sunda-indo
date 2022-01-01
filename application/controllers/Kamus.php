<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kamus_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'kamus/index/';
        $config['total_rows'] = $this->Kamus_model->jmlData();
        $config['per_page'] = 30;

        $from = $this->uri->segment(3);

        $this->pagination->initialize($config);
        $data['kamus'] = $this->Kamus_model->getData($config['per_page'], $from);
        //end paging
        $cari = (isset($_GET["cari"]) ? $_GET["cari"] : '');
        // switch ($cari) {
        //     case '':
        //         $data['cari'] = $this->Kamus_model->cariKlik();
        //         break;
        //     default:
        //         $data['cari'] = $this->Kamus_model->cari();
        // }
        if (!empty($cari)) {
            $data['cari'] = $this->Kamus_model->cariKlik($_GET["cari"]);
            $data['katacari'] = $this->input->get('cari');
        } else {
            $data['cari'] = $this->Kamus_model->cari();
            $data['katacari'] = $this->input->get('search');
        }
        $data['singkatan'] = $this->Kamus_model->singkatan();
        $this->load->view('templates/kamus_header', $data);
        $this->load->view('kamus/home', $data);
        $this->load->view('templates/kamus_footer');
    }
    public function daftarKata()
    {
        $data['title'] = 'Daftar Kata';
        // $this->load->library('pagination');
        // $config['base_url'] = base_url() . 'kamus/index/';
        // $config['total_rows'] = $this->Kamus_model->jmlData();
        // $config['per_page'] = 25;

        // $from = $this->uri->segment(3);
        // $this->pagination->initialize($config);

        $data['kamus'] = $this->db->get('vocabulary')->result_array();
        $this->load->view('templates/kamus_header', $data);
        $this->load->view('kamus/daftar_kata', $data);
        $this->load->view('templates/kamus_footer');
    }
    public function tentang()
    {
        $data['title'] = 'Tentang';
        // $this->load->library('pagination');
        // $config['base_url'] = base_url() . 'kamus/index/';
        // $config['total_rows'] = $this->Kamus_model->jmlData();
        // $config['per_page'] = 25;

        // $from = $this->uri->segment(3);
        // $this->pagination->initialize($config);

        $this->load->view('templates/kamus_header', $data);
        $this->load->view('kamus/tentang', $data);
        $this->load->view('templates/kamus_footer');
    }
}
