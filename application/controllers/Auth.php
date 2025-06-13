<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
			parent::__construct();
			$params = array('server_key' => 'Mid-server-9ClAxi8I5EnX0mgrT0-nPVQr', 'production' => true);
			$this->load->library('veritrans');
			$this->veritrans->config($params);
			$this->load->helper('url');
			$this->load->model('M_user');
			$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('auth/login2', $data);
		} else {
			$email = $this->input->post('email');
			$pass = $this->input->post('password');

			$user = $this->M_user->cek_login($email)->row_array();

			if ($user) {
				if (password_verify($pass, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'status_pengguna' => $user['status_pengguna']
					];
					$this->session->set_userdata($data);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
				redirect('auth');
			}
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|regex_match[/^[a-zA-Z\s]+$/]');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[pengguna.email]',
			['is_unique' => 'Email Sudah Terdaftar']
		);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password minimal 3 karakter'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('title/header', $data);
			$this->load->view('auth/register');
			$this->load->view('title/footer');
		} else {
			$data = [
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'nama_lengkap' => $this->input->post('nama'),
				'total_saldo' => 0,
				'status_pengguna' => 1
			];
			$this->M_user->insert('pengguna', $data);
			$this->session->set_flashdata('pesan', '<div class="animation a0 alert alert-success" role="alert">Sukses! Data telah tersimpan, Silahkan login</div>');
			redirect('auth');
		}
	}

	public function notif()
	{
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, "true");


		$order_id = $result['order_id'];
		$u = $this->M_user->get_join($order_id);
		$data = [
			'status_code' => $result['status_code']
		];
		$update = [
			'status_pengguna' => 2,
			'batas_langganan' => date('Y-m-d', strtotime('+1 month'))
		];
		if ($result['status_code'] == 200) {
			$this->db->update('midtrans', $data, array('order_id' => $order_id));
			$this->db->update('pengguna', $update, array('email' => $u['email']));
		}

		//notification handler sample

		/*
		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;

		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		  if ($type == 'credit_card'){
		    if($fraud == 'challenge'){
		      // TODO set payment status in merchant's database to 'Challenge by FDS'
		      // TODO merchant should decide whether this transaction is authorized or not in MAP
		      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
		      } 
		      else {
		      // TODO set payment status in merchant's database to 'Success'
		      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
		      }
		    }
		  }
		else if ($transaction == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
		  } 
		  else if($transaction == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		  } 
		  else if ($transaction == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		}*/
	}
}
