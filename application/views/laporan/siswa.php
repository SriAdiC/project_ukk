<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="<?= $_SERVER['DOCUMENT_ROOT'] ?>/spp/assets/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        header img {
            position: absolute;
            top: 10px;
        }

        header h2 {
            position: absolute;
            top: -15px;
            left: 50px;
            font-size: 18px;
            line-height: 25px;
            text-transform: uppercase;
        }

        header h2 span {
            font-size: 12px;
            font-style: regular;
            line-height: 15px;
            text-transform: capitalize;
        }

        section#konten {
            position: absolute;
            top: 125px;
        }

        span.email {
            text-transform: lowercase;
        }

        .hr1 {
            margin-top: 15px;
            border-color: grey;
        }


        .hr2 {
            border: 1px solid black;
            margin-top: -15px;
        }

        .ttd p {
            position: relative;
            left: 70%;
        }
    </style>
</head>

<body>
    <header class="p-0">
        <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>/spp/assets/img/logo_smk.png" class="img-fluid" alt="" width="90">
        <h2 class="ml-5 text-center">Pemerintah Provinsi Jawa Timur<br>Dinas Pendididkan<br>Sekolah Menengah Kejuruan Negeri 8 Jember<br><span>Kelompok : Teknologi & Pertanian<br>Program Keahlian : Teknik Otomotif, Teknik Komputer & Informatika dan Agribisnis Produksi Tanaman<br>Jl.Pelita No. 27, Sidomekar - Semboro - Jember Telp./Fax : (0336) 444112 <br><span class="email"><b>email</b> : jembersmkn8@yahoo.com</span></span></h2>
    </header><br><br>

    <section id="konten">
        <hr class="hr1">
        <hr class="hr2">
        <h3 class="text-center mb-2">Data Siswa</h3>

        <table class="table table-bordered">
            <thead class="table table-primary">
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tahun Ajaran</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($siswa as $p) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->NISN ?></td>
                        <td><?= $p->NAMA ?></td>
                        <td><?= $p->nama_kelas ?></td>
                        <td><?= $p->tahun ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="ttd">
            <p>Jember, <?= date('d F, Y') ?><br>Administrator</p>
            <br>
            <br>
            <p>______________________</p>
        </div>
    </section>
</body>

</html>