<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamus_model extends CI_Model
{
    public function getData($limit, $start)
    {
        return $this->db->get('vocabulary', $limit, $start)->result_array();
    }
    public function jmlData()
    {
        return $this->db->get('vocabulary')->num_rows();
    }
    public function singkatan()
    {
        return $this->db->get('singkatan')->result_array();
    }
    public function cari()
    {
        $kata = $this->input->get('search');
        $query = $this->db->like('words', $kata)->or_like('arti_bahasa', $kata)->get('vocabulary');
        $data = $query->result_array();
        return $data;
    }
    public function cariKlik($words)
    {


        // $kata = $this->db->get_where('vocabulary', ['words' => $words])->row_array();
        // $query = $this->db->like('words', $kata)->or_like('arti_bahasa', $kata)->get('vocabulary');
        $query = $this->db->like('words', $words)->get('vocabulary');
        $data = $query->result_array();
        return $data;
    }
}
