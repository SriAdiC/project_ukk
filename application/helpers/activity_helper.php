<?php


function activity_log($tipe, $aksi, $assign_to, $assign_type)
{
    $ci = get_instance();

    $param['log_user'] = $ci->session->userdata('nama');
    $param['log_tipe'] = $tipe; // aktivitas
    $param['log_aksi'] = $aksi; // menambah, mengedit, menghapus, mencetak
    $param['log_assign_to'] = $assign_to; // target
    $param['log_assign_type'] = $assign_type; // target

    // load model log nya

    $ci->load->model('Log_model', 'Log');

    // simpan ke database

    $ci->Log->save_log($param);
}
