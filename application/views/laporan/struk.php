<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/img/favicon/icon.png">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;

        }

        header p {
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 20px;
        }

        header p span {
            font-size: 14px;
            font-style: normal;
            text-transform: capitalize;
        }


        .hr1 {
            margin-top: 15px;
            border-color: grey;
            margin-top: -13px;
        }


        .hr2 {
            border: 1px solid black;
            margin-top: -15px;
        }

        #content {
            margin-top: 15px;
        }

        .title {
            border: 2px solid black;
            width: 320px;
            height: 50px;
            margin: -10px auto;
        }

        .title p {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            padding: 8px;
        }

        .data {
            margin-top: 25px;
            margin-left: 15px;
        }

        .data p {
            font-size: 18px;
            font-weight: 600;
        }

        .data p span {
            position: relative;
            left: 10px;
            text-transform: uppercase;
        }

        .data p span.jumlah {
            position: relative;
            left: 17px;
        }

        .data p span.bln {
            position: relative;
            left: 20px;
        }

        .data p span::after {
            content: '';
            position: absolute;
            bottom: -5px;
            width: 600px;
            left: 0;
            height: 2px;
            background-color: black;
        }


        .ttd p {
            position: absolute;
            left: 800px;
            top: 300px;
            font-size: 18px;
            font-weight: 600;
        }

        .ttd p.garis {
            position: absolute;
            top: 450px;
            border: 1px solid black;
            width: 170px;
        }

        @media print {
            .print {
                display: none;
            }
        }
    </style>
</head>

<body>


    <header>
        <p>Sekolah Menengah Kejuruan Negeri 8 Jember<br><span>Jl.Pelita No. 27 <br> Sidomekar - Semboro - Jember <br> Telp./Fax : (0336) 444112</span></p>
    </header>
    <hr class="hr1">
    <hr class="hr2">

    <div id="content">
        <div class="title">
            <p>Tanda Bukti Pembayaran SPP</p>
        </div>
        <div class="data">
            <p>Telah Diterima Dari : <span><?= $transaksi['NAMA']; ?></span></p>
            <p>Uang Sejumlah : Rp.<span class="jumlah"><?= $transaksi['JUMLAH_BAYAR'] ?></span></p>
            <p>Pembayaran Bulan: <span class="bln"><?= $transaksi['BULAN_DIBAYAR']; ?></span></p>
        </div>
        <div class="ttd">
            <p>Jember, <?= date('d-M-Y', strtotime($transaksi['TGL_BAYAR'])) ?><br><?= $transaksi['nama_petugas'] ?></p>
            <br>
            <br>
            <p class="garis"></p>
        </div>
    </div>

    <button type="button" class="print mt-3 mb-3 ml-2" onclick="window.print();">Print</button>



    <script src="<?= base_url() ?>/assets/js/jquery.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/fontawesome/js/all.min.js"></script>

</body>

</html>