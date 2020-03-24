<div class="transaksi" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
<div class="error_transaksi" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark"><?= $title ?></h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-3 p-0 col-lg-12">
                        <div class="card-body">
                            <form action="<?= base_url('pembayaran/transaksispp') ?>" method="get">
                                <div class="form-group p-2 d-flex">
                                    <label for="NISN" class="mt-2 mr-3">NISN</label>
                                    <input type="text" class="form-control col-md-6 mr-3" id="search" name="search" placeholder="Cari NISN siswa contoh : 002079910" value="<?= $this->input->get('search') ?>">
                                    <button type="submit" class="btn button-cari btn-success col-md-2 mt-n1">Cari</button>
                                    <?= form_error('NISN', '<small class="text-danger ml-2">', '</small>'); ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <?php if ($this->input->get('search') != '') : ?>

                        <div class="card card-primary mb-5">
                            <?php if (!empty($siswa)) : ?>
                                <div class="card-header">
                                    <h3 class="card-title text-bold">Biodata Siswa</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-condensed table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="40%">
                                                    NISN
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->NISN ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">
                                                    NIS
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->NIS ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">
                                                    Nama Lengkap
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->NAMA ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">
                                                    Kelas
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->nama_kelas ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">
                                                    Kompetensi Keahlian
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->jurusan ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">
                                                    Tahun Ajaran
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->TAHUN ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- /.card-body -->
                            <?php else : ?>
                                <div class="card-body">
                                    <p>NISN tidak ditemukan.</p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card card-success">
                            <?php if (!empty($tagihan)) : ?>
                                <div class="card-header">
                                    <h3 class="card-title text-bold">Tagihan Bayar</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Pembayaran Bulan</td>
                                                <td>Tanggal Bayar</td>
                                                <td>Harga Spp</td>
                                                <td class="text-center">Keterangan</td>
                                                <td class="text-center">Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($tagihan as $pem) : ?>
                                                <input type="hidden" value="<?= $pem->ID_PEMBAYARAN ?>">

                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $pem->BULAN_DIBAYAR ?></td>
                                                    <td><?= $pem->TGL_BAYAR ?></td>
                                                    <td>Rp.<?= number_format($pem->NOMINAL, 0, ",", ".") ?></td>
                                                    <?php if ($pem->KET == null) : ?>
                                                        <td class="text-center text-danger">---</td>
                                                    <?php else : ?>
                                                        <td class="text-center text-success"><i class="fas fa-check"></i> <?= $pem->KET ?></td>
                                                    <?php endif; ?>
                                                    <td class="text-center">
                                                        <?php if ($pem->KET == 'LUNAS') : ?>
                                                            <a href="<?= site_url('pembayaran/hapus/') . $pem->ID_PEMBAYARAN; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                                            <a href="<?= site_url('user/cetakStruk/') . $pem->ID_PEMBAYARAN; ?>" target="_blank" class="btn btn-default"><i class="fas fa-download"></i> Cetak</a>
                                                        <?php else : ?>
                                                            <a href="<?= site_url('pembayaran/transaksi/') . $pem->ID_PEMBAYARAN; ?>" class="btn btn-primary">Bayar</a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php else : ?>
                        <div class="card">
                            <div class="card-body">
                                <p>NISN tidak ditemukan</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->


</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y') ?> Created by <a href="https://www.instagram.com/sriadi_07/">Sri Adi Cahyono</a>.</strong>
    All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables/jquery.dataTables.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/adminlte/') ?>dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="<?= base_url('assets/js/Mysweetalert.js') ?>"></script>
<!-- Data table -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<!-- <script src="<?= base_url('assets/') ?>js/config.js"></script> -->

<script>
    // SweetAlert untuk transaksi

    const success_transaksi = $('.transaksi').data('flashdata');

    if (success_transaksi) {
        Swal.fire({
            title: success_transaksi,
            // text: 'Sudah ditambahkan',
            type: 'success'
        });
    }

    const error_transaksi = $('.error_transaksi').data('flashdata');

    if (error_transaksi) {
        Swal.fire({
            title: error_transaksi,
            // text: 'Sudah ditambahkan',
            type: 'success'
        });
    }
</script>

</body>

</html>