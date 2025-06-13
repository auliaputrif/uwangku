<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'Mid-server-9ClAxi8I5EnX0mgrT0-nPVQr', 'production' => true);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Profil';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $midtrans = $this->M_user->get_all_data('midtrans')->result_array();
        
        foreach ($midtrans as $key) {
            if ($key['email'] == $this->session->userdata('email') && $key['status_code'] == '200') {
                $update = [
                    'status_pengguna' => 2,
                    'batas_langganan' => date('Y-m-d', strtotime('+1 month'))
                ];
                $this->M_user->update('pengguna', $update, 'email', $key['email']);
                $this->M_user->delete('midtrans', 'order_id', $key['order_id']);
            }
        }

        $this->load->view('user/profil', $data);
    }

    public function profil()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Profil';
        $data['x'] = 'profil';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/profil/profil-profil');
    }

    public function aksi_ubah_pw()
    {
        $awal = $this->input->post('awal');
        $baru = $this->input->post('baru');
        $email = $this->input->post('email');
        $user = $this->M_user->cek_login($email)->row_array();

        if (password_verify($awal, $user['password'])) {
            $data = [
                'password' => password_hash($baru, PASSWORD_DEFAULT)
            ];
            $this->M_user->update('pengguna', $data, 'email', $email);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Sukses!<br>Kata sandi telah diperbarui</div>');
            redirect('profil/profil');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal!<br>Kata sandi lama tidak sesuai!</div>');
            redirect('profil/profil');
        }
    }

    public function aksi_no_tlp()
    {
        $data = [
            'no_tlp' => $this->input->post('no')
        ];
        $this->M_user->update('pengguna', $data, 'email', $this->input->post('email'));

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Sukses! No Telepon telah ditambahkan</div>');
        redirect('profil/profil');
    }

    public function aksi_ubah_no_tlp()
    {
        $data = [
            'no_tlp' => $this->input->post('no')
        ];
        $this->M_user->update('pengguna', $data, 'email', $this->input->post('email'));

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Sukses! No Telepon berhasil diubah</div>');
        redirect('profil/profil');
    }

    public function bantuan()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Profil - Bantuan';
        $data['x'] = 'profil';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/profil/bantuan');
    }

    public function info_aplikasi()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Bantuan - Info Aplikasi';
        $data['x'] = 'profil/bantuan';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/profil/info_aplikasi');
    }

    public function status_akun()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Bantuan - Status Akun';
        $data['x'] = 'profil/bantuan';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/profil/status_akun');
    }

    public function tentang()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Profil - Tentang';
        $data['x'] = 'profil';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/profil/tentang');
    }

    public function tentang_akun()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Tentang - Tentang Akun';
        $data['x'] = 'profil/tentang';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/profil/tentang_akun');
    }

    public function k_pemasukan()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Kategori - Pemasukan';
        $data['x'] = 'profil/tentang';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemasukan'] = $this->M_user->get_pemasukan()->result_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/profil/k_pemasukan');
    }

    public function k_pengeluaran()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Kategori - Pengeluaran';
        $data['x'] = 'profil/tentang';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengeluaran'] = $this->M_user->get_pengeluaran()->result_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/profil/k_pengeluaran');
    }

    public function token()
    {
        $user = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 14900, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 14900,
            'quantity' => 1,
            'name' => "Berlanggan 1 Bulan"
        );

        // Optional
        // $item2_details = array(
        //   'id' => 'a2',
        //   'price' => 20000,
        //   'quantity' => 2,
        //   'name' => "Orange"
        // );

        // Optional
        $item_details = array($item1_details);

        // // Optional
        // $billing_address = array(
        //   'first_name'    => "Andri",
        //   'last_name'     => "Litani",
        //   'address'       => "Mangga 20",
        //   'city'          => "Jakarta",
        //   'postal_code'   => "16602",
        //   'phone'         => "081122334455",
        //   'country_code'  => 'IDN'
        // );

        // // Optional
        // $shipping_address = array(
        //   'first_name'    => "Obet",
        //   'last_name'     => "Supriadi",
        //   'address'       => "Manggis 90",
        //   'city'          => "Jakarta",
        //   'postal_code'   => "16601",
        //   'phone'         => "08113366345",
        //   'country_code'  => 'IDN'
        // );

        // Optional
        // $customer_details = array(
        //   'first_name'    => "Andri",
        //   'email'         => "andri@litani.com",
        //   'phone'         => "081122334455",
        //   'billing_address'  => $billing_address,
        //   'shipping_address' => $shipping_address
        // );

        $customer_details = array(
            'first_name'    => $user['nama_lengkap'],
            'email'         => $user['email'],
            'phone'         => $user['no_tlp']
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 1
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
        $user = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $result = json_decode($this->input->post('result_data'), true);

        $data = [
            'order_id' => $result['order_id'],
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'status_code' => $result['status_code'],
            'email' => $user['email']
        ];
        $this->M_user->insert('midtrans', $data);
        redirect('profil');
    }
}
