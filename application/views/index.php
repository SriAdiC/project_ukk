<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/favicon/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/MyStyle.css">
    <title>Home ~ Pembayaran SPP Online</title>
</head>

<body>

    <section id="header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
                <div class="container">
                    <a href="<?= base_url() ?>" class="navbar-brand">
                        <img src="<?= base_url('assets/') ?>img/logo.png" alt="">
                    </a>
                </div>
            </nav>
        </div>
    </section>

    <section class="main" id="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Aplikasi Pembayaran SPP</h2>
                    <p class="lead">Aplikasi ini dibuat untuk memenuhi Uji Kompetensi Keahlian paket 1 mengenai aplikasi pembayaran spp. Jika ada kritik dan saran bisa menghubungi Email : <a href="mailto:21sacah002@gmail.com" class="email" target="_blank">21sacah002@gmail.com</a></p>
                </div>
                <div class="col-sm-6 right">
                    <div class="card m-n1">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-2">Selamat Datang,</h5>
                            <h6 class="card-subtitle text-center mb-3 text-muted">Silahkan login menggunakan nisn dan nis yang sudah anda miliki.</h6>
                            <?= $this->session->flashdata('error') ?>
                            <form class="user" method="post" action="<?= base_url('auth') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan Username Anda" value="<?= set_value('username'); ?>" autocomplete="off">
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-login">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container mt-5">
            <div class="row text-center">
                <div class="col-md">
                    <ul class="nav mb-3">
                        <li class="nav-item"><a href="https://web.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li class="nav-item"><a href="https://www.instagram.com/sriadi_07/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li class="nav-item"><a href=""><i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                    <p class="lead">Copyright &copy; <?= date('Y') ?>, Design & Developer By Sri Adi Cahyono</p>
                    <p class="lead powered">Powered By Bootstrap 4 & CodeIgniter.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('assets/') ?>js/jquery.js"></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>fontawesome/js/all.min.js"></script>
</body>

</html>