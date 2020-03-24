<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Deskripsi : Controller Pembayaran di gunakan untuk melakukan transaksi
 * Powered by : CodeIgniter
 * Author : Sri Adi Cahyono
 * Email : 21sacah002@gmail.com
 * WA : 085655614570
 */







class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Data_model', 'Data');
    }

    public function index()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Entri Transaksi Pembayaran';
        $data['user'] = $this->db->get_where('tbl_petugas', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pembayaran/index', $data);
    }



    // menampilkan biodata siswa dengan NISN yang di cari 


    public function transaksispp()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('auth/blocked');
        }


        $data['title'] = 'Entri Transaksi Pembayaran';
        $data['user'] = $this->db->get_where('tbl_petugas', ['username' => $this->session->userdata('username')])->row_array();

        $keyword = $this->input->get('search');

        $siswa = $this->Data->search($keyword);
        $tagihan = $this->Data->transaksi($keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pembayaran/view', ['siswa' => $siswa, 'tagihan' => $tagihan]);
    }


    // menampilkan tagihan bayar dari NISN yang di cari


    public function transaksi($id)
    {
        $search = $this->db->query("SELECT `tbl_siswa`.`NISN` FROM `tbl_siswa`, `tbl_pembayaran` WHERE `tbl_pembayaran`.`NISN` = `tbl_siswa`.`NISN` AND `tbl_pembayaran`.`ID_PEMBAYARAN` = '" . $id . "'")->row_array();

        $tgl_bayar = date('Y-m-d');
        $ket = 'LUNAS';

        $data = [
            'tgl_bayar' => $tgl_bayar,
            'ket' => $ket,
            'id_petugas' => $this->session->userdata('id_petugas')
        ];

        $this->db->set($data);
        $this->db->where('id_pembayaran', $id);
        $this->db->update('tbl_pembayaran');

        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            activity_log('pembayaran', 'Menambah data transaksi pembayaran', $assign_to, $assign_type);

            $this->session->set_flashdata('success',  'Transaksi pembayaran sukses');

            redirect('pembayaran/transaksispp?search=' . $search['NISN']);
        }
    }


    // Untuk menghapus transaksi pembayaran


    public function hapus($id)
    {
        $search = $this->db->query("SELECT `tbl_siswa`.`NISN` FROM `tbl_siswa`, `tbl_pembayaran` WHERE `tbl_pembayaran`.`NISN` = `tbl_siswa`.`NISN` AND `tbl_pembayaran`.`ID_PEMBAYARAN` = '" . $id . "'")->row_array();

        $tgl_bayar = null;
        $ket = null;

        $data = [
            'tgl_bayar' => $tgl_bayar,
            'ket' => $ket
        ];

        $this->db->set($data);
        $this->db->where('id_pembayaran', $id);
        $this->db->update('tbl_pembayaran');

        if ($this->db->affected_rows() > 0) {
            $assign_to = '';
            $assign_type = '';
            activity_log('pembayaran', 'Menghapus data transaksi pembayaran', $assign_to, $assign_type);

            $this->session->set_flashdata('success',  'Transaksi pembayaran dihapus');

            redirect('pembayaran/transaksispp?search=' . $search['NISN']);
        } else {
            return false;
        }
    }




    /**
     * 
     * 
     * Halaman History
     * 
     * 
     */






    public function history()
    {
        $data['title'] = 'Lihat History Pembayaran';
        $data['user'] = $this->db->get_where('tbl_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get_where('tbl_siswa', ['nisn' => $this->session->userdata('NISN')])->row_array();
        $keyword = $this->session->userdata('NISN');
        $data['pembayaran'] = $this->Data->history_get($keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pembayaran/history', $data);
    }


    // mencari NISN siswa untuk melihat history pembayaran


    public function search_history()
    {
        $keyword = $this->input->post('keyword');
        $history = $this->Data->history_get($keyword);

        $hasil = $this->load->view('pembayaran/history_view', [
            'pembayaran' => $history
        ], true);

        $callback = [
            'Hasil' => $hasil //set array hasil dengan isi dari view.php yang diload
        ];

        echo json_encode($callback); //konversi variable $callback menjadi JSON
    }
}
