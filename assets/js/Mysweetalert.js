// SweetAlert Untuk Petugas

const success = $('.petugas').data('flashdata');

if (success) {
    Swal.fire({
        title: 'Data Petugas',
        text: 'Berhasil ' + success,
        type: 'success'
    });
}

const error = $('.error').data('flashdata');

if (error) {
    Swal.fire({
        title: 'Data Petugas',
        text: 'Gagal ' + error,
        type: 'error'
    });
}


// SweetAlert Untuk siswa

const success_siswa = $('.siswa').data('flashdata');

if (success_siswa) {
    Swal.fire({
        title: 'Data Siswa',
        text: 'Berhasil ' + success_siswa,
        type: 'success'
    });
}

const error_siswa = $('.error_siswa').data('flashdata');

if (error_siswa) {
    Swal.fire({
        title: 'Data Siswa',
        text: 'Gagal ' + error_siswa,
        type: 'error'
    });
}

// SweetAlert Untuk SPP

const success_spp = $('.spp').data('flashdata');

if (success_spp) {
    Swal.fire({
        title: 'Data SPP',
        text: 'Berhasil ' + success_spp,
        type: 'success'
    });
}

const error_spp = $('.error_spp').data('flashdata');

if (error_spp) {
    Swal.fire({
        title: 'Data SPP',
        text: 'Gagal ' + error_spp,
        type: 'error'
    });
}


// SweetAlert Untuk kelas

const success_kelas = $('.kelas').data('flashdata');

if (success_kelas) {
    Swal.fire({
        title: 'Data Kelas',
        text: 'Berhasil ' + success_kelas,
        type: 'success'
    });
}

const error_kelas = $('.error_kelas').data('flashdata');

if (error_kelas) {
    Swal.fire({
        title: 'Data Kelas',
        text: 'Gagal ' + error_kelas,
        type: 'error'
    });
}


// SweetAlert Untuk jurusan

const success_jurusan = $('.jurusan').data('flashdata');

if (success_jurusan) {
    Swal.fire({
        title: 'Data jurusan',
        text: 'Berhasil ' + success_jurusan,
        type: 'success'
    });
}

const error_jurusan = $('.error_jurusan').data('flashdata');

if (error_jurusan) {
    Swal.fire({
        title: 'Data jurusan',
        text: 'Gagal ' + error_jurusan,
        type: 'error'
    });
}






