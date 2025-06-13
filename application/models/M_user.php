<?php

class M_user extends CI_Model
{

    public function cek_login($u)
    {
        $q = $this->db->get_where('pengguna', array('email' => $u));
        return $q;
    }

    public function get_all_data($tabel)
    {
        $q = $this->db->get($tabel);
        return $q;
    }

    public function get_transaksi_terkini($email)
    {
        return $this->db->from('transaksi')
            ->join('kategori', 'kategori.id_kategori=transaksi.id_kategori')
            ->where('email', $email)
            ->order_by('transaksi_dibuat', 'DESC')
            ->limit('5')
            ->get()
            ->result_array();
    }

    public function get_transaksi($email)
    {
        return $this->db->from('transaksi')
            ->join('kategori', 'kategori.id_kategori=transaksi.id_kategori')
            ->where('email', $email)
            ->order_by('transaksi_dibuat', 'DESC')
            ->get()
            ->result_array();
    }

    public function get_anggaran($email)
    {
        return $this->db->from('anggaran')
            ->join('kategori', 'kategori.id_kategori=anggaran.id_kategori')
            ->where('email', $email)
            ->get()
            ->result_array();
    }

    public function get_data_by_bulan_ini($bulan, $user)
    {
        return $this->db->from('transaksi')
            ->join('kategori', 'kategori.id_kategori=transaksi.id_kategori')
            ->where('MONTH(tanggal_transaksi)', $bulan)
            ->where('email', $user)
            ->where('status_kategori', 'Pengeluaran')
            ->order_by('jumlah_transaksi', 'DESC')
            ->get()
            ->result_array();
    }

    public function get_data_by_bulan_ini_5($bulan, $user)
    {
        return $this->db->from('transaksi')
            ->join('kategori', 'kategori.id_kategori=transaksi.id_kategori')
            ->where('MONTH(tanggal_transaksi)', $bulan)
            ->where('email', $user)
            ->where('status_kategori', 'Pengeluaran')
            ->order_by('jumlah_transaksi', 'DESC')
            ->limit('5')
            ->get()
            ->result_array();
    }

    public function get_data_by_minggu_ini($awal, $akhir, $user)
    {
        return $this->db->from('transaksi')
            ->join('kategori', 'kategori.id_kategori=transaksi.id_kategori')
            ->where("tanggal_transaksi BETWEEN '$awal' AND '$akhir'")
            ->where('email', $user)
            ->where('status_kategori', 'Pengeluaran')
            ->order_by('jumlah_transaksi', 'DESC')
            ->get()
            ->result_array();
    }

    public function get_data_by_minggu_ini_5($awal, $akhir, $user)
    {
        return $this->db->from('transaksi')
            ->join('kategori', 'kategori.id_kategori=transaksi.id_kategori')
            ->where("tanggal_transaksi BETWEEN '$awal' AND '$akhir'")
            ->where('email', $user)
            ->where('status_kategori', 'Pengeluaran')
            ->order_by('jumlah_transaksi', 'DESC')
            ->limit('5')
            ->get()
            ->result_array();
    }

    public function get_t_bulan($email, $bulan)
    {
        $this->db->distinct();
        $this->db->select('tanggal_transaksi');
        $this->db->where('email', $email);
        // Filter tanggal pada bulan ini
        $this->db->where('MONTH(tanggal_transaksi)', $bulan);
        $this->db->order_by('tanggal_transaksi', 'DESC');
        $query = $this->db->get('transaksi');
        return $query->result_array();
    }

    public function get_laporan_t($email, $bulan)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('MONTH(tanggal_transaksi)', $bulan);
        $this->db->join('kategori', 'kategori.id_kategori=transaksi.id_kategori');
        $query = $this->db->get('transaksi');
        return $query->result_array();
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }

    public function delete($tabel, $id, $val)
    {
        $this->db->delete($tabel, array($id => $val));
    }

    public function get_by_id($tabel, $pk, $id)
    {
        return $this->db->get_where($tabel, [$pk => $id]);
    }

    public function get_join($id)
    {
        return $this->db->from('midtrans')
            ->join('pengguna', 'pengguna.email=midtrans.email')
            ->where('order_id', $id)
            ->get()
            ->row_array();
    }

    public function get_pemasukan()
    {
        $this->db->select('*');
        $this->db->like('status_kategori', 'Pemasukan');
        $this->db->order_by('nama_kategori', 'ASC');
        $q = $this->db->get('kategori');
        return $q;
    }

    public function get_pengeluaran()
    {
        $this->db->select('*');
        $this->db->like('status_kategori', 'Pengeluaran');
        $this->db->order_by('nama_kategori', 'ASC');
        $q = $this->db->get('kategori');
        return $q;
    }

    public function input_anggaran($id, $input)
    {
        $this->db->select('*');
        $this->db->where('email', $id);
        $this->db->where('id_kategori', $input);
        $q = $this->db->get('anggaran');
        return $q;
    }
}
