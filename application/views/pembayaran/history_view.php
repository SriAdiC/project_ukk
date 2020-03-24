<div class="card card-success">
    <?php if (!empty($pembayaran)) : ?>
        <div class="card-header">
            <h3 class="card-title text-bold">Tagihan Bayar</h3>
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
    <?php else : ?>
        <div class="card-body">
            <p>Siswa ini belum membayar spp sama sekali.</p>
        </div>
    <?php endif; ?>
</div>