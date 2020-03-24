<div class="siswa" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
<div class="error_siswa" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Data Siswa</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Master Data</li>
                        <li class="breadcrumb-item active">Data Siswa</li>
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
                <div class="col-lg">
                    <div class="card mt-3 mb-3">
                        <div class="card-title mt-3 ml-2">
                            <a href="<?= site_url('masterdata/add_siswa') ?>" class="btn btn-primary">Tambah Data Siswa</a>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered table-hover" width="100%" id="dataTable">
                                    <thead class="table table-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama Lengkap</th>
                                            <th style="width: 100px;">Kelas</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Alamat</th>
                                            <th>No. Telp</th>
                                            <th style="width: 150px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at <?php $zone = 3600 * +7;
                                                                                        $date = gmdate("l, d F Y H:i a", time() + $zone);
                                                                                        echo "$date"; ?> </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">

                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <?php foreach ($siswa as $s) : ?>
        <div class="modal fade" id="modalEdit<?= $s->NISN ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url('masterdata/siswa_edit') ?>">
                        <input type="hidden" name="id" value="<?= $s->NISN ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="NISN">NISN</label>
                                <input type="text" class="form-control" id="NISN" name="NISN" value="<?= $s->NISN ?>">
                                <span class="text-secondary ml-2">NISN harus 10 digit.</span> <br>
                                <?= form_error('NISN', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="NIS">NIS</label>
                                <input type="text" class="form-control" id="NIS" name="NIS" value="<?= $s->NIS ?>">
                                <span class="text-secondary ml-2">NIS harus 8 digit.</span> <br>
                                <?= form_error('NIS', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $s->NAMA ?>">
                                <?= form_error('nama', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select class="form-control" id="kelas_id" name="kelas_id">
                                    <option value="<?= $s->ID_KELAS ?>"><?= $s->nama_kelas ?></option>
                                    <?php foreach ($kelas as $row) : ?>
                                        <option value="<?= $row->ID_KELAS ?>"><?= $row->NAMA_KELAS ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('kelas_id', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="spp">Tahun Ajaran</label>
                                <select class="form-control" id="spp_id" name="spp_id">
                                    <option value="<?= $s->ID_SPP ?>"><?= $s->tahun ?></option>
                                    <?php foreach ($spp as $row) : ?>
                                        <option value="<?= $row->ID_SPP ?>"><?= $row->TAHUN ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('spp_id', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $s->ALAMAT ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No.Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $s->NO_TELP ?>">
                                <span class="text-secondary ml-2">Nomor Telepon maksimal 13 digit.</span> <br>
                                <?= form_error('no_telp', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal">Tutup</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>

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
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
    show_data();

    function show_data() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('masterdata/list_siswa') ?>',
            async: true,
            dataType: 'html',
            success: function(data) {
                $('#show_data').html(data);
                $('#dataTable').DataTable({
                    "ordering": false,
                    'language': {
                        "url": "<?= base_url('assets/indonesia.json') ?>",
                        'sEmptyTable': "Tidak Ada Data"
                    }
                });
            }
        });
    }
</script>

</body>

</html>