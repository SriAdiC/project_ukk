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
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
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
            <?php if ($this->session->userdata('level') == "Admin" || $this->session->userdata('level') == "Petugas") : ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card p-0 col-lg-12">
                            <div class="card-body">
                                <div class="form-group p-2 d-flex">
                                    <label for="NISN" class="mt-2 mr-3">NISN :</label>
                                    <input type="text" class="form-control col-md-6 mr-3" id="keyword" name="keyword" placeholder="Cari NISN siswa contoh : 0020179059">
                                    <button type="button" id="btn-search" class="btn btn-success col-md-2 mt-n1">Cari</button>
                                    <?= form_error('NISN', '<small class="text-danger ml-2">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div id="view">
                            <?php $this->load->view('pembayaran/history_view', ['pembayaran' => $history]); ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title text-bold">History Pembayaran</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <td>#</td>
                                            <td>Pembayaran Bulan</td>
                                            <td>Tanggal Bayar</td>
                                            <td>Harga Spp</td>
                                            <td class="text-center">Keterangan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pembayaran as $pem) : ?>
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
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
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
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/adminlte/') ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/adminlte/') ?>dist/js/demo.js"></script>
<!-- Data table -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
    function search() {

        $.ajax({
            url: '<?= base_url('pembayaran/search_history') ?>', // File Tujuan nya
            type: 'POST', //Tentukan Tipe nya POST
            data: {
                keyword: $("#keyword").val()
            }, //set data keyword yang akan dikirim
            dataType: "json",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function(result) {
                $('#btn-search').html("Cari").removeAttr("disabled");
                $('#view').html(result.Hasil);
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText); // munculkan alert
            }
        });

    };

    $('#view').html('');


    $('#btn-search').click(function() {
        $search = $('#keyword').val();
        if ($search != '') {
            $('#btn-search').html("Mencari...").attr("disabled", "disabled");
            search();
        } else {
            $('#view').html(`<div class="card">
                                    <div class="card-body text-center">
                                        <h3 class="text-danger">Isi kolom pencarian.</h3>
                                    </div>
                                </div>`);
        }
    });

    $('#keyword').on('keyup', function(e) {
        if (e.keyCode === 13) {
            $search = $(this).val();
            if ($search != '') {
                $('#btn-search').html("Mencari...").attr("disabled", "disabled");
                search();
            } else {
                $('#view').html(`<div class="card">
                                    <div class="card-body text-center">
                                        <h3 class="text-danger">Isi kolom pencarian.</h3>
                                    </div>
                                </div>`);
            }
        }
    });
</script>

</body>

</html>