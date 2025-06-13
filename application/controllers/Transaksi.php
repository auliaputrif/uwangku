<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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

        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        //$data['tgl'] = $this->db->distinct()->select('tanggal_transaksi')->where(['email' => $this->session->userdata('email')])->order_by('tanggal_transaksi','DESC')->get('transaksi')->result_array();
        //$data['transaksi'] = $this->db->get_where('transaksi', ['email' => $this->session->userdata('email')])->result_array();
        $data['transaksi'] = $this->M_user->get_transaksi($this->session->userdata('email'));
        $data['laporan'] = $this->M_user->get_laporan_t($this->session->userdata('email'), date('m'));
        $data['t_pemasukan'] = '0';
        $data['t_pengeluaran'] = '0';
        $data['tgl'] = $this->M_user->get_t_bulan($this->session->userdata('email'), date('m'));

        $data['bulan1'] = date('F/Y', strtotime('-1 month'));
        $data['bulan2'] = date('F/Y', strtotime('-2 month'));
        $data['bulan3'] = date('F/Y', strtotime('-3 month'));
        $data['bulan4'] = date('F/Y', strtotime('-4 month'));
        $data['bulan5'] = date('F/Y', strtotime('-5 month'));
        $data['bulan6'] = date('F/Y', strtotime('-6 month'));
        $data['bulan7'] = date('F/Y', strtotime('-7 month'));

        $this->load->view('title/t_header', $data);
        $this->load->view('user/transaksi', $data);
    }

    public function pemasukan()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }
        $this->form_validation->set_rules('jumlah', 'Nominal', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');

        $user = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pemasukan';
            $data['x'] = 'dashboard';
            $data['kategori'] = $this->db->get_where('kategori', ['status_kategori' => 'Pemasukan'])->result_array();

            $this->load->view('title/x_header', $data);
            $this->load->view('user/pemasukan');
        } elseif ($this->input->post('tanggal') > date('Y-m-d')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Maaf...<br>Tanggal transaksi tidak seharusnya lebih dari hari ini<br>Silahkan isikan tanggal yang sesuai<a href="#" class="modal__close">&times;</a> </div>');
            redirect('transaksi/pemasukan');
        } elseif ($user['total_saldo'] + $this->input->post('jumlah') >= 1000000000000) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Maaf...<br>Saldo maksimal hanya Rp 1.000.000.000.000<a href="#" class="modal__close">&times;</a> </div>');
            redirect('transaksi/pemasukan');
        } else {
            $data = [
                'jumlah_transaksi' => $this->input->post('jumlah'),
                'tanggal_transaksi' => $this->input->post('tanggal'),
                'catatan_transaksi' => $this->input->post('catatan'),
                'transaksi_dibuat' => time(),
                'email' => $this->session->userdata('email'),
                'id_kategori' => $this->input->post('kategori')
            ];
            $update = [
                'total_saldo' => $user['total_saldo'] + $this->input->post('jumlah')
            ];
            $this->M_user->update('pengguna', $update, 'email', $this->session->userdata('email'));
            $this->M_user->insert('transaksi', $data);
            redirect('dashboard');
        }
    }

    public function pengeluaran()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }
        $this->form_validation->set_rules('jumlah', 'Nominal', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');

        $user = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pengeluaran';
            $data['x'] = 'dashboard';
            $data['kategori'] = $this->db->get_where('kategori', ['status_kategori' => 'Pengeluaran'])->result_array();

            $this->load->view('title/x_header', $data);
            $this->load->view('user/pengeluaran');
        } elseif ($user['total_saldo'] < $this->input->post('jumlah')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Duh...<br>Saldo anda tidak cukup, silahkan ditambah terlebih dahulu <a href="#" class="modal__close">&times;</a> </div>');
            redirect('transaksi/pengeluaran');
        } elseif ($this->input->post('tanggal') > date('Y-m-d')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Maaf...<br>Tanggal transaksi tidak seharusnya lebih dari hari ini<br>Silahkan isikan tanggal yang sesuai<a href="#" class="modal__close">&times;</a> </div>');
            redirect('transaksi/pengeluaran');
        } else {
            $anggaran = $this->M_user->input_anggaran($this->session->userdata('email'), $this->input->post('kategori'))->row_array();

            if ($anggaran['id_kategori'] == $this->input->post('kategori') && $anggaran['periode_awal'] <= date('Y-m-d') && $anggaran['periode_akhir'] >= date('Y-m-d') && $user['status_pengguna'] == '2') {
                $data = [
                    'jumlah_transaksi' => $this->input->post('jumlah'),
                    'tanggal_transaksi' => $this->input->post('tanggal'),
                    'catatan_transaksi' => $this->input->post('catatan'),
                    'transaksi_dibuat' => time(),
                    'email' => $this->session->userdata('email'),
                    'id_kategori' => $this->input->post('kategori')
                ];
                $update = [
                    'total_saldo' => $user['total_saldo'] - $this->input->post('jumlah')
                ];
                $a_update = [
                    'anggaran_digunakan' => $anggaran['anggaran_digunakan'] + $this->input->post('jumlah')
                ];
                $this->M_user->update('pengguna', $update, 'email', $this->session->userdata('email'));
                $this->M_user->update('anggaran', $a_update, 'id_anggaran', $anggaran['id_anggaran']);
                $this->M_user->insert('transaksi', $data);
                redirect('dashboard');
            } else {
                $data = [
                    'jumlah_transaksi' => $this->input->post('jumlah'),
                    'tanggal_transaksi' => $this->input->post('tanggal'),
                    'catatan_transaksi' => $this->input->post('catatan'),
                    'transaksi_dibuat' => time(),
                    'email' => $this->session->userdata('email'),
                    'id_kategori' => $this->input->post('kategori')
                ];
                $update = [
                    'total_saldo' => $user['total_saldo'] - $this->input->post('jumlah')
                ];
                $this->M_user->update('pengguna', $update, 'email', $this->session->userdata('email'));
                $this->M_user->insert('transaksi', $data);
                redirect('dashboard');
            }
        }
    }

    public function edit_pemasukan($id)
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }
        $data['pemasukan'] = $this->M_user->get_by_id('transaksi', 'id_transaksi', $id)->row_array();
        $data['title'] = 'Pemasukan';
        $data['x'] = 'dashboard';
        $data['kategori'] = $this->db->get_where('kategori', ['status_kategori' => 'Pemasukan'])->result_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/edit_pemasukan');
    }

    public function aksi_edit_pemasukan($id)
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $user = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $pemasukan = $this->M_user->get_by_id('transaksi', 'id_transaksi', $id)->row_array();

        if ($this->input->post('tanggal') > date('Y-m-d')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Maaf...<br>Tanggal transaksi tidak seharusnya lebih dari hari ini<br>Silahkan isikan tanggal yang sesuai </div>');
            redirect('transaksi/edit_pemasukan/' . $id);
        } elseif ($user['total_saldo'] + $this->input->post('jumlah') >= 1000000000000) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Maaf...<br>Saldo maksimal hanya Rp 1.000.000.000.000<a href="#" class="modal__close">&times;</a> </div>');
            redirect('transaksi/edit_pemasukan/' . $id);
        } else {
            $data = [
                'jumlah_transaksi' => $this->input->post('jumlah'),
                'tanggal_transaksi' => $this->input->post('tanggal'),
                'catatan_transaksi' => $this->input->post('catatan'),
                'transaksi_dibuat' => time(),
                'email' => $this->session->userdata('email'),
                'id_kategori' => $this->input->post('kategori')
            ];
            $update = [
                'total_saldo' => $user['total_saldo'] - $pemasukan['jumlah_transaksi'] + $this->input->post('jumlah')
            ];
            $this->M_user->update('pengguna', $update, 'email', $this->session->userdata('email'));
            $this->M_user->update('transaksi', $data, 'id_transaksi', $id);
            redirect('dashboard');
        }
    }

    public function edit_pengeluaran($id)
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['pengeluaran'] = $this->M_user->get_by_id('transaksi', 'id_transaksi', $id)->row_array();

        $data['title'] = 'Pengeluaran';
        $data['x'] = 'dashboard';
        $data['kategori'] = $this->db->get_where('kategori', ['status_kategori' => 'Pengeluaran'])->result_array();

        $this->load->view('title/x_header', $data);
        $this->load->view('user/edit_pengeluaran');
    }

    public function aksi_edit_pengeluaran($id)
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $user = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $pengeluaran = $this->M_user->get_by_id('transaksi', 'id_transaksi', $id)->row_array();

        if ($user['total_saldo'] < $this->input->post('jumlah')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Duh...<br>Saldo anda tidak cukup, silahkan ditambah terlebih dahulu </div>');
            redirect('transaksi/edit_pengeluaran/' . $id);
        } elseif ($this->input->post('tanggal') > date('Y-m-d')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Maaf...<br>Tanggal transaksi tidak seharusnya lebih dari hari ini<br>Silahkan isikan tanggal yang sesuai<a href="#" class="modal__close">&times;</a> </div>');
            redirect('transaksi/edit_pengeluaran/' . $id);
        } else {
            $anggaran = $this->M_user->input_anggaran($this->session->userdata('email'), $this->input->post('kategori'))->row_array();

            if ($anggaran['id_kategori'] == $this->input->post('kategori') && $anggaran['periode_awal'] <= date('Y-m-d') && $anggaran['periode_akhir'] >= date('Y-m-d') && $user['status_pengguna'] == '2') {
                $data = [
                    'jumlah_transaksi' => $this->input->post('jumlah'),
                    'tanggal_transaksi' => $this->input->post('tanggal'),
                    'catatan_transaksi' => $this->input->post('catatan'),
                    'transaksi_dibuat' => time(),
                    'email' => $this->session->userdata('email'),
                    'id_kategori' => $this->input->post('kategori')
                ];
                $update = [
                    'total_saldo' => $user['total_saldo'] + $pengeluaran['jumlah_transaksi'] - $this->input->post('jumlah')
                ];
                $a_update = [
                    'anggaran_digunakan' => $anggaran['anggaran_digunakan'] + $this->input->post('jumlah')
                ];
                $this->M_user->update('pengguna', $update, 'email', $this->session->userdata('email'));
                $this->M_user->update('anggaran', $a_update, 'id_anggaran', $anggaran['id_anggaran']);
                $this->M_user->update('transaksi', $data, 'id_transaksi', $id);
                redirect('dashboard');
            } else {
                $data = [
                    'jumlah_transaksi' => $this->input->post('jumlah'),
                    'tanggal_transaksi' => $this->input->post('tanggal'),
                    'catatan_transaksi' => $this->input->post('catatan'),
                    'transaksi_dibuat' => time(),
                    'email' => $this->session->userdata('email'),
                    'id_kategori' => $this->input->post('kategori')
                ];
                $update = [
                    'total_saldo' => $user['total_saldo'] + $pengeluaran['jumlah_transaksi'] - $this->input->post('jumlah')
                ];
                $this->M_user->update('pengguna', $update, 'email', $this->session->userdata('email'));
                $this->M_user->update('transaksi', $data, 'id_transaksi', $id);
                redirect('dashboard');
            }
        }
    }

    public function hapus_pemasukan($id)
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $user = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $pemasukan = $this->M_user->get_by_id('transaksi', 'id_transaksi', $id)->row_array();

        if ($user['total_saldo'] - $pemasukan['jumlah_transaksi'] < 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Duh...<br>Saldo anda tidak cukup, silahkan dicek kembali apakah ada yang salah</div>');
            redirect('transaksi/edit_pemasukan/' . $id);
        }

        $update = [
            'total_saldo' => $user['total_saldo'] - $pemasukan['jumlah_transaksi']
        ];

        $this->M_user->update('pengguna', $update, 'email', $this->session->userdata('email'));
        $this->M_user->delete('transaksi', 'id_transaksi', $id);

        redirect('dashboard');
    }

    public function hapus_pengeluaran($id)
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $user = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $pengeluaran = $this->M_user->get_by_id('transaksi', 'id_transaksi', $id)->row_array();

        $update = [
            'total_saldo' => $user['total_saldo'] + $pengeluaran['jumlah_transaksi']
        ];

        $this->M_user->update('pengguna', $update, 'email', $this->session->userdata('email'));
        $this->M_user->delete('transaksi', 'id_transaksi', $id);

        redirect('dashboard');
    }

    public function bulan1()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Transaksi ' . date('M', strtotime('-1 month'));
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        //$data['tgl'] = $this->db->distinct()->select('tanggal_transaksi')->where(['email' => $this->session->userdata('email')])->order_by('tanggal_transaksi','DESC')->get('transaksi')->result_array();
        //$data['transaksi'] = $this->db->get_where('transaksi', ['email' => $this->session->userdata('email')])->result_array();
        $data['transaksi'] = $this->M_user->get_transaksi($this->session->userdata('email'));
        $data['laporan'] = $this->M_user->get_laporan_t($this->session->userdata('email'), date('m', strtotime('-1 month')));
        $data['t_pemasukan'] = '0';
        $data['t_pengeluaran'] = '0';

        $data['tgl'] = $this->M_user->get_t_bulan($this->session->userdata('email'), date('m', strtotime('-1 month')));
        $data['bulan1'] = date('F/Y', strtotime('-1 month'));
        $data['bulan2'] = date('F/Y', strtotime('-2 month'));
        $data['bulan3'] = date('F/Y', strtotime('-3 month'));
        $data['bulan4'] = date('F/Y', strtotime('-4 month'));
        $data['bulan5'] = date('F/Y', strtotime('-5 month'));
        $data['bulan6'] = date('F/Y', strtotime('-6 month'));
        $data['bulan7'] = date('F/Y', strtotime('-7 month'));

        $this->load->view('title/t_header', $data);
        $this->load->view('user/transaksi1', $data);
    }

    public function bulan2()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Transaksi ' . date('M', strtotime('-2 month'));
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        //$data['tgl'] = $this->db->distinct()->select('tanggal_transaksi')->where(['email' => $this->session->userdata('email')])->order_by('tanggal_transaksi','DESC')->get('transaksi')->result_array();
        //$data['transaksi'] = $this->db->get_where('transaksi', ['email' => $this->session->userdata('email')])->result_array();
        $data['transaksi'] = $this->M_user->get_transaksi($this->session->userdata('email'));
        $data['laporan'] = $this->M_user->get_laporan_t($this->session->userdata('email'), date('m', strtotime('-2 month')));
        $data['t_pemasukan'] = '0';
        $data['t_pengeluaran'] = '0';

        $data['tgl'] = $this->M_user->get_t_bulan($this->session->userdata('email'), date('m', strtotime('-2 month')));
        $data['bulan1'] = date('F/Y', strtotime('-1 month'));
        $data['bulan2'] = date('F/Y', strtotime('-2 month'));
        $data['bulan3'] = date('F/Y', strtotime('-3 month'));
        $data['bulan4'] = date('F/Y', strtotime('-4 month'));
        $data['bulan5'] = date('F/Y', strtotime('-5 month'));
        $data['bulan6'] = date('F/Y', strtotime('-6 month'));
        $data['bulan7'] = date('F/Y', strtotime('-7 month'));

        $this->load->view('title/t_header', $data);
        $this->load->view('user/transaksi2', $data);
    }

    public function bulan3()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Transaksi ' . date('M', strtotime('-3 month'));
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        //$data['tgl'] = $this->db->distinct()->select('tanggal_transaksi')->where(['email' => $this->session->userdata('email')])->order_by('tanggal_transaksi','DESC')->get('transaksi')->result_array();
        //$data['transaksi'] = $this->db->get_where('transaksi', ['email' => $this->session->userdata('email')])->result_array();
        $data['transaksi'] = $this->M_user->get_transaksi($this->session->userdata('email'));
        $data['laporan'] = $this->M_user->get_laporan_t($this->session->userdata('email'), date('m', strtotime('-3 month')));
        $data['t_pemasukan'] = '0';
        $data['t_pengeluaran'] = '0';

        $data['tgl'] = $this->M_user->get_t_bulan($this->session->userdata('email'), date('m', strtotime('-3 month')));
        $data['bulan1'] = date('F/Y', strtotime('-1 month'));
        $data['bulan2'] = date('F/Y', strtotime('-2 month'));
        $data['bulan3'] = date('F/Y', strtotime('-3 month'));
        $data['bulan4'] = date('F/Y', strtotime('-4 month'));
        $data['bulan5'] = date('F/Y', strtotime('-5 month'));
        $data['bulan6'] = date('F/Y', strtotime('-6 month'));
        $data['bulan7'] = date('F/Y', strtotime('-7 month'));

        $this->load->view('title/t_header', $data);
        $this->load->view('user/transaksi3', $data);
    }

    public function bulan4()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Transaksi ' . date('M', strtotime('-4 month'));
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        //$data['tgl'] = $this->db->distinct()->select('tanggal_transaksi')->where(['email' => $this->session->userdata('email')])->order_by('tanggal_transaksi','DESC')->get('transaksi')->result_array();
        //$data['transaksi'] = $this->db->get_where('transaksi', ['email' => $this->session->userdata('email')])->result_array();
        $data['transaksi'] = $this->M_user->get_transaksi($this->session->userdata('email'));
        $data['laporan'] = $this->M_user->get_laporan_t($this->session->userdata('email'), date('m', strtotime('-4 month')));
        $data['t_pemasukan'] = '0';
        $data['t_pengeluaran'] = '0';

        $data['tgl'] = $this->M_user->get_t_bulan($this->session->userdata('email'), date('m', strtotime('-4 month')));
        $data['bulan1'] = date('F/Y', strtotime('-1 month'));
        $data['bulan2'] = date('F/Y', strtotime('-2 month'));
        $data['bulan3'] = date('F/Y', strtotime('-3 month'));
        $data['bulan4'] = date('F/Y', strtotime('-4 month'));
        $data['bulan5'] = date('F/Y', strtotime('-5 month'));
        $data['bulan6'] = date('F/Y', strtotime('-6 month'));
        $data['bulan7'] = date('F/Y', strtotime('-7 month'));

        $this->load->view('title/t_header', $data);
        $this->load->view('user/transaksi4', $data);
    }

    public function bulan5()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Transaksi ' . date('M', strtotime('-5 month'));
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        //$data['tgl'] = $this->db->distinct()->select('tanggal_transaksi')->where(['email' => $this->session->userdata('email')])->order_by('tanggal_transaksi','DESC')->get('transaksi')->result_array();
        //$data['transaksi'] = $this->db->get_where('transaksi', ['email' => $this->session->userdata('email')])->result_array();
        $data['transaksi'] = $this->M_user->get_transaksi($this->session->userdata('email'));
        $data['laporan'] = $this->M_user->get_laporan_t($this->session->userdata('email'), date('m', strtotime('-5 month')));
        $data['t_pemasukan'] = '0';
        $data['t_pengeluaran'] = '0';

        $data['tgl'] = $this->M_user->get_t_bulan($this->session->userdata('email'), date('m', strtotime('-5 month')));
        $data['bulan1'] = date('F/Y', strtotime('-1 month'));
        $data['bulan2'] = date('F/Y', strtotime('-2 month'));
        $data['bulan3'] = date('F/Y', strtotime('-3 month'));
        $data['bulan4'] = date('F/Y', strtotime('-4 month'));
        $data['bulan5'] = date('F/Y', strtotime('-5 month'));
        $data['bulan6'] = date('F/Y', strtotime('-6 month'));
        $data['bulan7'] = date('F/Y', strtotime('-7 month'));

        $this->load->view('title/t_header', $data);
        $this->load->view('user/transaksi5', $data);
    }

    public function bulan6()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Transaksi ' . date('M', strtotime('-6 month'));
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        //$data['tgl'] = $this->db->distinct()->select('tanggal_transaksi')->where(['email' => $this->session->userdata('email')])->order_by('tanggal_transaksi','DESC')->get('transaksi')->result_array();
        //$data['transaksi'] = $this->db->get_where('transaksi', ['email' => $this->session->userdata('email')])->result_array();
        $data['transaksi'] = $this->M_user->get_transaksi($this->session->userdata('email'));
        $data['laporan'] = $this->M_user->get_laporan_t($this->session->userdata('email'), date('m', strtotime('-6 month')));
        $data['t_pemasukan'] = '0';
        $data['t_pengeluaran'] = '0';

        $data['tgl'] = $this->M_user->get_t_bulan($this->session->userdata('email'), date('m', strtotime('-6 month')));
        $data['bulan1'] = date('F/Y', strtotime('-1 month'));
        $data['bulan2'] = date('F/Y', strtotime('-2 month'));
        $data['bulan3'] = date('F/Y', strtotime('-3 month'));
        $data['bulan4'] = date('F/Y', strtotime('-4 month'));
        $data['bulan5'] = date('F/Y', strtotime('-5 month'));
        $data['bulan6'] = date('F/Y', strtotime('-6 month'));
        $data['bulan7'] = date('F/Y', strtotime('-7 month'));

        $this->load->view('title/t_header', $data);
        $this->load->view('user/transaksi6', $data);
    }

    public function bulan7()
    {
        if (empty($this->session->userdata('email'))) {
            redirect('auth');
        }

        $data['title'] = 'Transaksi ' . date('M', strtotime('-7 month'));
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        //$data['tgl'] = $this->db->distinct()->select('tanggal_transaksi')->where(['email' => $this->session->userdata('email')])->order_by('tanggal_transaksi','DESC')->get('transaksi')->result_array();
        //$data['transaksi'] = $this->db->get_where('transaksi', ['email' => $this->session->userdata('email')])->result_array();
        $data['transaksi'] = $this->M_user->get_transaksi($this->session->userdata('email'));
        $data['laporan'] = $this->M_user->get_laporan_t($this->session->userdata('email'), date('m', strtotime('-7 month')));
        $data['t_pemasukan'] = '0';
        $data['t_pengeluaran'] = '0';

        $data['tgl'] = $this->M_user->get_t_bulan($this->session->userdata('email'), date('m', strtotime('-7 month')));
        $data['bulan1'] = date('F/Y', strtotime('-1 month'));
        $data['bulan2'] = date('F/Y', strtotime('-2 month'));
        $data['bulan3'] = date('F/Y', strtotime('-3 month'));
        $data['bulan4'] = date('F/Y', strtotime('-4 month'));
        $data['bulan5'] = date('F/Y', strtotime('-5 month'));
        $data['bulan6'] = date('F/Y', strtotime('-6 month'));
        $data['bulan7'] = date('F/Y', strtotime('-7 month'));

        $this->load->view('title/t_header', $data);
        $this->load->view('user/transaksi7', $data);
    }
}
