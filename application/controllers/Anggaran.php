<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_user');
    }

    public function index()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Anggaran';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggaran'] = $this->M_user->get_anggaran($this->session->userdata('email'));
        $a = $this->M_user->get_anggaran($this->session->userdata('email'));

        foreach ($a as $key) {
            if ($key['periode_akhir'] < date('Y-m-d')) {
                $this->M_user->delete('anggaran', 'id_anggaran', $key['id_anggaran']);
            }
        }

        $this->load->view('title/a_header', $data);
        $this->load->view('user/anggaran', $data);
    }

    public function tambah()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }
        $user = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        if ($user['status_pengguna'] == 1) {
            redirect('anggaran');
        }

        $this->form_validation->set_rules('jumlah', 'Nominal', 'required');
        $this->form_validation->set_rules(
            'kategori',
            'Kategori',
            'required|is_unique[anggaran.id_kategori]',
            ['is_unique' => 'Kategori ini sudah dibuat']
        );
        $this->form_validation->set_rules('awal', 'Periode awal', 'required');
        $this->form_validation->set_rules('akhir', 'Periode akhir', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Anggaran';
            $data['x'] = 'anggaran';
            $data['kategori'] = $this->db->get_where('kategori', ['status_kategori' => 'Pengeluaran'])->result_array();

            $this->load->view('title/x_header', $data);
            $this->load->view('user/tambah_anggaran', $data);
        } elseif ($this->input->post('akhir') <= $this->input->post('awal')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tanggal periode berakhir tidak bisa kurang dari tanggal mulai<a href="#" class="modal__close">&times;</a> </div>');
            redirect('anggaran/tambah');
        } else {
            $data = [
                'jumlah_anggaran' => $this->input->post('jumlah'),
                'periode_awal' => $this->input->post('awal'),
                'periode_akhir' => $this->input->post('akhir'),
                'catatan_anggaran' => $this->input->post('catatan'),
                'anggaran_digunakan' => '0',
                'email' => $this->session->userdata('email'),
                'id_kategori' => $this->input->post('kategori')
            ];
            $this->M_user->insert('anggaran', $data);
            redirect('anggaran');
        }
    }

    public function edit_anggaran($id)
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }
        $user = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        if ($user['status_pengguna'] == 1) {
            redirect('anggaran');
        }

        $data['title'] = 'Edit Anggaran';
        $data['x'] = 'anggaran';
        $data['kategori'] = $this->db->get_where('kategori', ['status_kategori' => 'Pengeluaran'])->result_array();
        $data['anggaran'] = $this->M_user->get_by_id('anggaran', 'id_anggaran', $id)->row_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/edit_anggaran', $data);
    }

    public function aksi_edit_anggaran($id)
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        if ($this->input->post('akhir') <= $this->input->post('awal')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tanggal periode berakhir tidak bisa kurang dari tanggal mulai<a href="#" class="modal__close">&times;</a> </div>');
            redirect('anggaran/edit_anggaran/' . $id);
        } else {
            $data = [
                'jumlah_anggaran' => $this->input->post('jumlah'),
                'periode_awal' => $this->input->post('awal'),
                'periode_akhir' => $this->input->post('akhir'),
                'catatan_anggaran' => $this->input->post('catatan'),
                'anggaran_digunakan' => '0',
                'email' => $this->session->userdata('email'),
                'id_kategori' => $this->input->post('kategori')
            ];
            $this->M_user->update('anggaran', $data, 'id_anggaran', $id);
            redirect('anggaran');
        }
    }

    public function hapus_anggaran($id)
    {
        $this->M_user->delete('anggaran', 'id_anggaran', $id);
        redirect('anggaran');
    }
}
