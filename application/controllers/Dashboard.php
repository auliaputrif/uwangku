<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['terkini'] = $this->M_user->get_transaksi_terkini($this->session->userdata('email'));
        $data['total'] = '0';
        $u = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Get current month and year
        //$current_month = date('m', strtotime('-1 month'));

        $awal = date('Y-m-d', strtotime('last Sunday'));
        $akhir = date('Y-m-d', strtotime('this Saturday'));

        $data['data1'] = $this->M_user->get_data_by_minggu_ini($awal, $akhir, $this->session->userdata('email'));
        $data['data2'] = $this->M_user->get_data_by_minggu_ini_5($awal, $akhir, $this->session->userdata('email'));

        if ($u['batas_langganan'] < date('Y-m-d')) {
            $update = [
                'batas_langganan' => null,
                'status_pengguna' => 1
            ];
            $this->M_user->update('pengguna', $update, 'email', $this->session->userdata('email'));
        }

        $this->load->view('title/header1', $data);
        $this->load->view('user/home', $data);
    }

    public function bulan()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['terkini'] = $this->M_user->get_transaksi_terkini($this->session->userdata('email')); 
        $data['total'] = '0';
        
        $current_month = date('m');
        $data['data1'] = $this->M_user->get_data_by_bulan_ini($current_month, $this->session->userdata('email'));
        $data['data2'] = $this->M_user->get_data_by_bulan_ini_5($current_month, $this->session->userdata('email'));

        $this->load->view('title/header1', $data);
        $this->load->view('user/home_bulan', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('landing');
    }
}
