<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('user') ?>" class="brand-link">
        <i class="fab fa-shirtsinbulk fa-2x mr-2 ml-2"></i>
        <span class="brand-text font-weight-bold" style="position: relative; top: -8px; ">Aplikasi Spp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/') ?>img/avatars/default.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <?php if ($this->session->userdata('level') == 'Admin' || $this->session->userdata('level')  == 'Petugas') : ?>
                    <a href="#" class="d-block"><?= $user['NAMA_PETUGAS'] ?></a>
                <?php else : ?>
                    <a href="#" class="d-block"><?= $siswa['NISN'] ?></a>
                <?php endif ?>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">Dashboard</li>
                <?php if ($title == 'Home') : ?>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('user') ?>" class="nav-link active">
                        <?php else : ?>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('user') ?>" class="nav-link">
                        <?php endif ?>
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                        </a>
                    </li>
                    <?php if ($this->session->userdata('level') ==  'Admin') : ?>
                        <?php if ($title == 'Data Petugas' || $title == 'Data Siswa' || $title == 'Data SPP' || $title == 'Data Kelas' || $title == 'Data Jurusan') : ?>
                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                <?php else : ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                <?php endif; ?>
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Master Data
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">5</span>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php if ($title == 'Data Petugas') : ?>
                                        <li class="nav-item has-treeview menu-open">
                                            <a href="<?= site_url('masterdata/petugas') ?>" class="nav-link active">
                                                <i class="fas fa-circle nav-icon"></i>
                                            <?php else : ?>
                                        <li class="nav-item">
                                            <a href="<?= site_url('masterdata/petugas') ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                            <?php endif; ?>
                                            <p>Data Petugas</p>
                                            </a>
                                        </li>
                                        <?php if ($title == 'Data Siswa') : ?>
                                            <li class="nav-item has-treeview menu-open">
                                                <a href="<?= site_url('masterdata/siswa') ?>" class="nav-link active">
                                                    <i class="fas fa-circle nav-icon"></i>
                                                <?php else : ?>
                                            <li class="nav-item">
                                                <a href="<?= site_url('masterdata/siswa') ?>" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                <?php endif; ?>
                                                <p>Data Siswa</p>
                                                </a>
                                            </li>
                                            <?php if ($title == 'Data SPP') : ?>
                                                <li class="nav-item has-treeview menu-open">
                                                    <a href="<?= site_url('masterdata/spp') ?>" class="nav-link active">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                    <?php else : ?>
                                                <li class="nav-item">
                                                    <a href="<?= site_url('masterdata/spp') ?>" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                    <?php endif; ?>
                                                    <p>Data SPP</p>
                                                    </a>
                                                </li>
                                                <?php if ($title == 'Data Kelas') : ?>
                                                    <li class="nav-item has-treeview menu-open">
                                                        <a href="<?= site_url('masterdata/kelas') ?>" class="nav-link active">
                                                            <i class="fas fa-circle nav-icon"></i>
                                                        <?php else : ?>
                                                    <li class="nav-item">
                                                        <a href="<?= site_url('masterdata/kelas') ?>" class="nav-link">
                                                            <i class="far fa-circle nav-icon"></i>
                                                        <?php endif ?>
                                                        <p>Data Kelas</p>
                                                        </a>
                                                    </li>
                                                    <?php if ($title == 'Data Jurusan') : ?>
                                                        <li class="nav-item has-treeview menu-open">
                                                            <a href="<?= site_url('masterdata/jurusan') ?>" class="nav-link active">
                                                                <i class="fas fa-circle nav-icon"></i>
                                                            <?php else : ?>
                                                        <li class="nav-item">
                                                            <a href="<?= site_url('masterdata/jurusan') ?>" class="nav-link">
                                                                <i class="far fa-circle nav-icon"></i>
                                                            <?php endif ?>
                                                            <p>Data Jurusan</p>
                                                            </a>
                                                        </li>

                                </ul>
                            </li>
                            <li class="nav-header p-2">Transaksi</li>
                            <?php if ($title == 'Entri Transaksi Pembayaran') : ?>
                                <li class="nav-item menu-open">
                                    <a href="<?= base_url('pembayaran') ?>" class="nav-link active">
                                    <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pembayaran') ?>" class="nav-link">
                                    <?php endif ?>
                                    <i class="nav-icon far fa-money-bill-alt"></i>
                                    <p>
                                        Entri Transaksi Pembayaran
                                    </p>
                                    </a>
                                </li>
                                <?php if ($title == 'Lihat History Pembayaran') : ?>
                                    <li class="nav-item menu-open">
                                        <a href="<?= base_url('pembayaran/history') ?>" class="nav-link active">
                                        <?php else : ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url('pembayaran/history') ?>" class="nav-link">
                                        <?php endif ?>
                                        <i class="nav-icon fas fa-history"></i>
                                        <p>
                                            Lihat History Pembayaran
                                        </p>
                                        </a>
                                    </li>
                                    <li class="nav-header p-2">Laporan</li>
                                    <?php if ($title == 'Generate Laporan') : ?>
                                        <li class="nav-item menu-open">
                                            <a href="<?= base_url('user/laporan') ?>" class="nav-link active">
                                            <?php else : ?>
                                        <li class="nav-item">
                                            <a href="<?= base_url('user/laporan') ?>" class="nav-link">
                                            <?php endif ?>
                                            <i class="nav-icon fas fa-download"></i>
                                            <p>
                                                Generate Laporan
                                            </p>
                                            </a>
                                        </li>
                                    <?php elseif ($this->session->userdata('level') == 'Petugas') : ?>
                                        <li class="nav-header p-2">Transaksi</li>
                                        <?php if ($title == 'Entri Transaksi Pembayaran') : ?>
                                            <li class="nav-item menu-open">
                                                <a href="<?= base_url('pembayaran') ?>" class="nav-link active">
                                                <?php else : ?>
                                            <li class="nav-item">
                                                <a href="<?= base_url('pembayaran') ?>" class="nav-link">
                                                <?php endif ?>
                                                <i class="nav-icon far fa-money-bill-alt"></i>
                                                <p>
                                                    Entri Transaksi Pembayaran
                                                </p>
                                                </a>
                                            </li>
                                            <?php if ($title == 'Lihat History Pembayaran') : ?>
                                                <li class="nav-item menu-open">
                                                    <a href="<?= base_url('pembayaran/history') ?>" class="nav-link active">
                                                    <?php else : ?>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('pembayaran/history') ?>" class="nav-link">
                                                    <?php endif ?>
                                                    <i class="nav-icon fas fa-history"></i>
                                                    <p>
                                                        Lihat History Pembayaran
                                                    </p>
                                                    </a>
                                                </li>
                                            <?php else : ?>
                                                <li class="nav-header p-2">Transaksi</li>
                                                <?php if ($title == 'Lihat History Pembayaran') : ?>
                                                    <li class="nav-item menu-open">
                                                        <a href="<?= base_url('pembayaran/history') ?>" class="nav-link active">
                                                        <?php else : ?>
                                                    <li class="nav-item">
                                                        <a href="<?= base_url('pembayaran/history') ?>" class="nav-link">
                                                        <?php endif; ?>
                                                        <i class="nav-icon fas fa-history"></i>
                                                        <p>
                                                            Lihat History Pembayaran
                                                        </p>
                                                        </a>
                                                    </li>
                                                <?php endif ?>
                                                <li class="nav-header p-2"></li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('auth/logout') ?>" class="nav-link logout">
                                                        <i class="fas fa-sign-out-alt nav-icon"></i>
                                                        <p>Logout</p>
                                                    </a>
                                                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>