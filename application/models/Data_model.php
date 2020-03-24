<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Deskripsi :
 *  Berisi tentang query untuk CRUD data.
 *           Data :
 *               1.Data Petugas.
 *               2.Data Siswa.
 *               3.Data Spp.
 *               4.Data Kelas.
 *               5.Entri Transaksi Pembayaran.
 *               6.History Pembayaran.
 * 
 * Powered by : CodeIgniter
 * Author : Sri Adi Cahyono
 * Email : 21sacah002@gmail.com
 * WA : 085655614570
 */




class Data_model extends CI_Model
{
    public function get_id_spp()
    {
        $query = "SELECT * FROM `tbl_spp` WHERE `id_spp` = " . $this->input->post('spp_id');
        return $this->db->query($query)->result();
    }



    //--------------------------------------------
    // ----------Model data untuk entri transaksi---------
    //--------------------------------------------


    public function get_siswa()
    {
        $query = "SELECT `tbl_siswa`.*, `tbl_spp`.`TAHUN`, `tbl_spp`.`NOMINAL`, `tbl_kelas`.`nama_kelas`, `tbl_jurusan`.`jurusan`
        FROM `tbl_siswa`,`tbl_spp`,`tbl_kelas`,`tbl_jurusan` WHERE `tbl_siswa`.`id_kelas` = `tbl_kelas`.`id_kelas` AND `tbl_siswa`.`id_spp` = `tbl_spp`.`id_spp` AND `tbl_kelas`.`id_jurusan` = `tbl_jurusan`.`id_jurusan` AND `tbl_siswa`.`NISN` = '" . $this->session->userdata('NISN') . "'";

        return $this->db->query($query)->row_array();
    }



    public function search($keyword)
    {
        $query = "SELECT `tbl_siswa`.*, `tbl_spp`.`TAHUN`, `tbl_spp`.`NOMINAL`, `tbl_kelas`.`nama_kelas`, `tbl_jurusan`.`jurusan`
        FROM `tbl_siswa`,`tbl_spp`,`tbl_kelas`,`tbl_jurusan` WHERE `tbl_siswa`.`id_kelas` = `tbl_kelas`.`id_kelas` AND `tbl_siswa`.`id_spp` = `tbl_spp`.`id_spp` AND `tbl_kelas`.`id_jurusan` = `tbl_jurusan`.`id_jurusan` AND `tbl_siswa`.`nisn` LIKE '%" . $keyword . "%'
        ";

        return $this->db->query($query)->row();
    }

    public function transaksi($keyword)
    {
        $query = "SELECT `tbl_pembayaran`.*, `tbl_siswa`.*, `tbl_spp`.`TAHUN`, `tbl_spp`.`NOMINAL`, `tbl_kelas`.`nama_kelas`, `tbl_jurusan`.`jurusan`
        FROM `tbl_pembayaran`, `tbl_siswa`,`tbl_spp`,`tbl_kelas`,`tbl_jurusan` WHERE `tbl_pembayaran`.`NISN` = `tbl_siswa`.`NISN` AND `tbl_siswa`.`id_kelas` = `tbl_kelas`.`id_kelas` AND `tbl_siswa`.`id_spp` = `tbl_spp`.`id_spp` AND `tbl_kelas`.`id_jurusan` = `tbl_jurusan`.`id_jurusan` AND `tbl_siswa`.`nisn` LIKE '%" . $keyword . "%'
        ";

        return $this->db->query($query)->result();
    }






    //--------------------------------------------
    // ----------Model data untuk Dashboard---------
    //--------------------------------------------







    public function count_petugas()
    {
        $query = $this->db->get_where('tbl_petugas', 'id_level = 2');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function count_siswa()
    {
        $query = $this->db->get('tbl_siswa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function count_transaksi()
    {
        $query = $this->db->get('tbl_pembayaran');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }





    //--------------------------------------------
    // ----------Model data untuk Petugas---------
    //--------------------------------------------




    public function petugas_get()
    {
        $query = $this->db->get_where('tbl_petugas', 'id_level = 2');
        return $query->result();
    }

    public function petugas_add()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password_petugas' => md5($this->input->post('password1')),
            'nama_petugas' => $this->input->post('nama'),
            'id_level' => 2,
            'deskripsi' => $this->input->post('password1')
        ];

        $this->db->insert('tbl_petugas', $data);
    }

    public function petugas_del($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('tbl_petugas');
    }

    public function petugas_edit()
    {
        $data = [
            'username' => $this->input->post('username'),
            'nama_petugas' => $this->input->post('nama')
        ];

        $this->db->set($data);
        $this->db->where('id_petugas', $this->input->post('id_petugas'));
        $this->db->update('tbl_petugas');
    }




    //--------------------------------------------
    // ----------Model data untuk Siswa----------- 
    //--------------------------------------------



    public function siswa_get()
    {
        $query = $this->db->query("call get_siswa()");
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }



    public function jatuhTempo($id)
    {
        $query = "SELECT * FROM tbl_pembayaran WHERE id_spp = '$id'";
        return $this->db->query($query)->result();
    }

    public function siswa_add($nominal)
    {

        $awalTempo = $this->input->post('tempo');
        $bulanData = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $data = [
            'NISN' => $this->input->post('NISN'),
            'NIS' => $this->input->post('NIS'),
            'nama' => $this->input->post('nama'),
            'id_kelas' => $this->input->post('kelas_id'),
            'id_spp' => $this->input->post('spp_id'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat')
        ];

        $simpan = $this->db->insert('tbl_siswa', $data);

        if (!$simpan) {
            echo "Gagal cuy";
        } else {
            $n = $this->db->query("SELECT NISN FROM tbl_siswa ORDER BY NISN DESC LIMIT 1")->row_array();

            $nisn = $n['NISN'];

            for ($i = 0; $i < 12; $i++) {
                // membuat tanggal jatuh tempo nya setiap tanggal 20
                $jatuhTempo = date('Y-m-d', strtotime("+$i month", strtotime($awalTempo)));

                $bulan = $bulanData[date('m', strtotime($jatuhTempo))];
                $tahun = date('Y', strtotime($jatuhTempo));

                $data = [
                    'id_petugas' => $this->session->userdata('id_petugas'),
                    'nisn' => $nisn,
                    'jatuh_tempo' => $jatuhTempo,
                    'bulan_dibayar' => $bulan,
                    'tahun_dibayar' => $tahun,
                    'id_spp' => $this->input->post('spp_id'),
                    'jumlah_bayar' => $nominal
                ];

                $this->db->insert('tbl_pembayaran', $data);
            }
        }
    }

    public function siswa_del($id)
    {
        $this->db->where('NISN', $id);
        $this->db->delete('tbl_siswa');
    }

    public function siswa_edit()
    {
        $data = [
            'NISN' => $this->input->post('NISN'),
            'NIS' => $this->input->post('NIS'),
            'nama' => $this->input->post('nama'),
            'id_kelas' => $this->input->post('kelas_id'),
            'id_spp' => $this->input->post('spp_id'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
        ];

        $this->db->set($data);
        $this->db->where('NISN', $this->input->post('id'));
        $this->db->update('tbl_siswa');
    }




    //--------------------------------------------
    // ----------Model data untuk SPP----------- 
    //--------------------------------------------




    public function spp_edit()
    {
        $data = [
            'tahun' => $this->input->post('tahun_awal'),
            'nominal' => $this->input->post('nominal')
        ];

        $this->db->set($data);
        $this->db->where('id_spp', $this->input->post('id_spp'));
        $this->db->update('tbl_spp');
    }



    //--------------------------------------------
    // ----------Model data untuk Kelas----------- 
    //--------------------------------------------




    // public function kelas_get()
    // {
    //     $query = "SELECT `tbl_kelas`.*, `tbl_jurusan`.`jurusan` FROM `tbl_kelas` JOIN `tbl_jurusan` ON `tbl_kelas`.`id_jurusan` = `tbl_jurusan`.`id_jurusan` ORDER BY `tbl_kelas`.`id_jurusan` ASC";

    //     return $this->db->query($query)->result();
    // }

    public function kelas_get()
    {
        $query = $this->db->query("call kelas_get()");
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }

    public function kelas_add()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_jurusan' => $this->input->post('jurusan')
        ];

        $this->db->insert('tbl_kelas', $data);
    }

    public function kelas_edit()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_jurusan' => $this->input->post('jurusan'),
        ];

        $this->db->set($data);
        $this->db->where('id_kelas', $this->input->post('id_kelas'));
        $this->db->update('tbl_kelas');
    }




    //---------------------------------------------------------
    // ----------Model data untuk History Pembayaran----------- 
    //---------------------------------------------------------




    public function history_get($keyword)
    {
        $query = "SELECT `tbl_pembayaran`.*, `tbl_siswa`.* , `tbl_spp`.`TAHUN`, `tbl_spp`.`NOMINAL`, `tbl_kelas`.`nama_kelas`, `tbl_jurusan`.`jurusan`
        FROM `tbl_pembayaran`,`tbl_siswa`,`tbl_spp`,`tbl_kelas`,`tbl_jurusan` WHERE
        `tbl_pembayaran`.`nisn` = `tbl_siswa`.`nisn` AND `tbl_siswa`.`id_kelas` = `tbl_kelas`.`id_kelas` AND `tbl_siswa`.`id_spp` = `tbl_spp`.`id_spp` AND `tbl_kelas`.`id_jurusan` = `tbl_jurusan`.`id_jurusan` AND `tbl_pembayaran`.`KET` = 'LUNAS' AND `tbl_siswa`.`NISN` LIKE '%" . $keyword . "%' 
        ORDER BY `tbl_pembayaran`.`id_pembayaran` ASC
        ";

        return $this->db->query($query)->result();
    }




    //---------------------------------------------------------
    // ----------Model data untuk transaksi----------- 
    //---------------------------------------------------------


    public function cetakTransaksi($tgl_mulai, $tgl_sampai)
    {
        $query = "SELECT `tbl_pembayaran`.*, `tbl_siswa`.* , `tbl_petugas`.`nama_petugas`, `tbl_spp`.`TAHUN`, `tbl_spp`.`NOMINAL`, `tbl_kelas`.`nama_kelas`, `tbl_jurusan`.`jurusan`
        FROM `tbl_pembayaran`,`tbl_siswa`,`tbl_petugas`,`tbl_spp`,`tbl_kelas`,`tbl_jurusan` WHERE
        `tbl_pembayaran`.`nisn` = `tbl_siswa`.`nisn` AND `tbl_siswa`.`id_kelas` = `tbl_kelas`.`id_kelas` AND `tbl_siswa`.`id_spp` = `tbl_spp`.`id_spp` AND `tbl_kelas`.`id_jurusan` = `tbl_jurusan`.`id_jurusan`AND `tbl_pembayaran`.`id_petugas` = `tbl_petugas`.`id_petugas` AND `tbl_pembayaran`.`KET` = 'LUNAS' AND `tbl_pembayaran`.`TGL_BAYAR` BETWEEN '" . $tgl_mulai . "' AND '" . $tgl_sampai . "' 
        ORDER BY `tbl_pembayaran`.`TGL_BAYAR` ASC
        ";

        return $this->db->query($query)->result();
    }


    public function cetakStruk($id)
    {
        $query = "SELECT `tbl_pembayaran`.*, `tbl_siswa`.* , `tbl_petugas`.`nama_petugas`, `tbl_spp`.`TAHUN`, `tbl_spp`.`NOMINAL`, `tbl_kelas`.`nama_kelas`, `tbl_jurusan`.`jurusan`
        FROM `tbl_pembayaran`,`tbl_siswa`,`tbl_petugas`,`tbl_spp`,`tbl_kelas`,`tbl_jurusan` WHERE
        `tbl_pembayaran`.`nisn` = `tbl_siswa`.`nisn` AND `tbl_siswa`.`id_kelas` = `tbl_kelas`.`id_kelas` AND `tbl_siswa`.`id_spp` = `tbl_spp`.`id_spp` AND `tbl_kelas`.`id_jurusan` = `tbl_jurusan`.`id_jurusan`AND `tbl_pembayaran`.`id_petugas` = `tbl_petugas`.`id_petugas` AND `tbl_pembayaran`.`KET` = 'LUNAS' AND `tbl_pembayaran`.`id_pembayaran` = '" . $id . "'
        ORDER BY `tbl_pembayaran`.`TGL_BAYAR` ASC
        ";

        return $this->db->query($query)->row_array();
    }
}
