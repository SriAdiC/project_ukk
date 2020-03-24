<!-- Content Header (Page header) -->
<div class="petugas" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
<div class="error" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Data Petugas</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Master Data</li>
                        <li class="breadcrumb-item active">Data Petugas</li>
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
                            <a href="<?= site_url('masterdata/add_petugas') ?>" class="btn btn-primary">Tambah Data Petugas</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" cellspacing="0" width="100%" id="dataTable">
                                <thead class="table table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nama Petugas</th>
                                        <th>Aksi</th>
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
    <?php foreach ($petugas as $p) : ?>
        <div class="modal fade" id="modalEdit<?= $p->ID_PETUGAS ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Petugas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url('masterdata/petugas_edit') ?>">
                        <input type="hidden" name="id_petugas" value="<?= $p->ID_PETUGAS ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $p->USERNAME ?>">
                                <?= form_error('username', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Petugas</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $p->NAMA_PETUGAS ?>">
                                <?= form_error('nama', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-dismiss="modal" data-target="#modalPassword<?= $p->ID_PETUGAS ?>"><i class="fas fa-key"></i> Ubah Kata Sandi?</a>
                            <button type="submit" class="btn btn-primary">Edit <i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <?php foreach ($petugas as $p) : ?>
        <div class="modal fade" id="modalPassword<?= $p->ID_PETUGAS ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Kata Sandi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url('masterdata/petugas_pass') ?>">
                        <input type="hidden" name="id_petugas" value="<?= $p->ID_PETUGAS ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="password1">Password</label>
                                <input type="password" class="form-control" id="password1" name="password1">
                                <small class="text-secondary">Password harus 8 digit.</small>
                                <?= form_error('password1', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <label for="password2">Ulangi Password</label>
                                <input type="password" class="form-control" id="password2" name="password2">
                                <?= form_error('password2', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                        </div>
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-dismiss="modal" data-target="#modalEdit<?= $p->ID_PETUGAS ?>"><i class="fas fa-arrow-left"></i> Kembali?</a>
                            <button type="submit" class="btn btn-primary">Edit <i class="fas fa-pencil-alt"></i></button>
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
<!-- Data table -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables-responsive/js/dataTables.responsive.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/') ?>dist/js/adminlte.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="<?= base_url('assets/js/Mysweetalert.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/adminlte/') ?>dist/js/demo.js"></script>

<script type="text/javascript">
    show_data();

    function show_data() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('masterdata/list_petugas') ?>',
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