<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getKamus()
    {
        $data['kamus'] = $this->db->get('vocabulary');
        return $data['kamus']->result_array();
    }

    public function kamusCari()
    {
        $kata = $this->input->post('search');
        $query = $this->db->like('words', $kata)->or_like('arti_bahasa', $kata)->get('vocabulary');
        $data = $query->result_array();
        return $data;
    }

    public function getDataKamusById($id_vocab)
    {
        // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $data['kamus'] = $this->db->get_where('vocabulary', ['id_vocab' => $id_vocab]);
        return $data['kamus']->row_array();
    }

    public function tambahDataKamus()
    {
        $this->db->query("ALTER TABLE vocabulary AUTO_INCREMENT 1");
        $data = [
            'words' => htmlspecialchars($this->input->post('words')),
            'arti_bahasa' => $this->input->post('arti')
        ];
        $this->db->insert('vocabulary', $data);
        return $this->db->affected_rows();
    }
    public function ubahDataKamus()
    {
        $id_vocab = $this->input->post('id_vocab');

        $data = [
            'words' => htmlspecialchars($this->input->post('words')),
            'arti_bahasa' => $this->input->post('arti'),
        ];

        $this->db->where('id_vocab', $id_vocab);
        $this->db->update('vocabulary', $data);

        return $this->db->affected_rows();
    }

    public function hapusDataKamus($id_vocab)
    {
        $this->db->where('id_vocab', $id_vocab);
        $this->db->delete('vocabulary');

        return $this->db->affected_rows();
    }

    // bagian profil

    public function ubahFotoProfil()
    {
        $id_vocab = $this->input->post('id_vocab');

        if (!empty($_FILES['myFile']['name'])) {
            $mantanProfil = $this->input->post('profil_lama'); //hapus gambar sebelumnya dari folder
            unlink(FCPATH . 'assets/img/profil/' . $mantanProfil);
            $fotoProfil = $this->_uploadImageProfil();
        } else {
            $fotoProfil = $this->input->post('profil_lama');
        }

        $this->db->set('gambar', $fotoProfil);

        $this->db->where('id_vocab', $id_vocab);
        $this->db->update('user');

        return $this->db->affected_rows();
    }

    public function ubahProfil()
    {
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
        ];

        $this->db->where('id', $id);
        $this->db->update('user', $data);

        return $this->db->affected_rows();
    }

    public function ubahPassProfil()
    {
        $id = $this->input->post('id');

        $data = [
            'password' => password_hash($this->input->post('passbaru'), PASSWORD_DEFAULT),
        ];

        $this->db->where('id', $id);
        $this->db->update('user', $data);

        return $this->db->affected_rows();
    }

    public function cekPass()
    {

        $passlama = $this->input->post('passlama');
        $passbaru = $this->input->post('passbaru');
        $passbaru2 = $this->input->post('passbaru2');
        $cek = $this->db->get('user')->row_array();
        if (!password_verify($passlama, $cek['password'])) {
            return false;
        } else {
            if ($passbaru2 != $passbaru) {
                return false;
            } elseif ($passbaru == $passlama) {
                return false;
            } else {
                return true;
            }
        }
    }

    private function _uploadImageProfil()
    {
        $config['upload_path']          = './assets/img/profil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config); // Load Konfigueasi uploadnya
        if ($this->upload->do_upload('myFile')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            return $this->upload->data('file_name');
        } else {
            // Jika gagal :
            print_r($this->upload->display_errors());
            return 'default.jpg';
        }
    }
}
