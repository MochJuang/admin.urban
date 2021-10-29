<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from colorlib.com//polygon/adminty/default/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Sep 2020 17:42:51 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <title>Adminty - Premium Admin Template by Colorlib </title>
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bower_components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/icon/feather/css/feather.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/css/jquery.mCustomScrollbar.css">
    <style>
        td {
            font-size: 10px;
            padding: 1px;
        }

        th {
            font-size: 10px;
            padding: 1px !important;
            height: 10px !important;
        }
        *{
            font-family: Arial;
        }
    </style>
</head>

<body style="background-color: white;">
    <div class="pcoded-content">
        <div class="">
            <div class="">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="">
                            <div>
                                <div class="">
                                    <div class="row invoice-contact" style="padding-top: -58px;padding-left: -50px;padding-right: -50px;">
                                        <div class="col-sm-12">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img style="width: 150px;" src="<?= base_url() ?>assets/assets/icon/URBAN&CO_LOGO-01black.png" class="m-b-10" alt="">
                                                            <br>
                                                            <p style="font-size: 5px;">
                                                                Urban&CO <br>
                                                                Jl. Mahkota Pirus No.88, <br>
                                                                Babakan Madang, <br>
                                                                Kec. Babakan Madang, Bogor, Jawa Barat <br>
                                                                <a style="font-size: 5px;" href="#" target="_top">urbanco.promosi@gmail.com</a> <br>
                                                                (021) 87964451
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p style="text-align: right;font-size:5px">Non Tunai</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-block" style="padding-top: -32px;padding-left: -40px;padding-right: -40px;">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="" style="border-top: 0px;width:100%;margin-top: -20px;">

                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p style="font-size: 10px;">Informasi Client :</p>
                                                                </td>
                                                                <td> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                <td style="padding-right:30px">
                                                                    <p style="font-size: 10px;">Informasi Order :</p>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <p style="font-size: 10px;">No Invoice #<?= $result->kd_transaksi ?></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: text-top">
                                                                    <div style="padding-top: -15px;">
                                                                        <p style="font-size: 10px;"><?= ucfirst($result->nama_user) ?></p>
                                                                        <p style="font-size: 10px;"><?= $result->alamat ?></p>
                                                                        <p style="font-size: 10px;"><?= $result->telpon ?></p>
                                                                        <p style="font-size: 10px;padding-top: -35px;"><?= $result->email ?></p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                </td>
                                                                <td style="padding-right:40px;vertical-align: text-top;">
                                                                    <div style="padding-top: -15px;">
                                                                        <p style="font-size: 10px;font-weight: bold;">
                                                                            Tanggal :
                                                                            <?= tanggal_indo($result->tanggal) ?></p>
                                                                        <p style="font-size: 10px;font-weight: bold;">Status:<?php
                                                                                                                                switch ($result->status) {
                                                                                                                                    case 1:
                                                                                                                                        echo 'Simpan';
                                                                                                                                        break;
                                                                                                                                    case 2:
                                                                                                                                        echo 'Menunggu Pembayaran';
                                                                                                                                        break;
                                                                                                                                    case 3:
                                                                                                                                        echo 'Proses';
                                                                                                                                        break;
                                                                                                                                    case 4:
                                                                                                                                        echo 'Packing';
                                                                                                                                        break;
                                                                                                                                    case 5:
                                                                                                                                        echo 'Kirim';
                                                                                                                                        break;
                                                                                                                                    case 6:
                                                                                                                                        echo 'Selesai';
                                                                                                                                        break;
                                                                                                                                    default:
                                                                                                                                }
                                                                                                                                ?></p>
                                                                        <p style="font-size: 10px;font-weight: bold;">Id :#<?= $result->user_id ?></p>
                                                                        <!-- <p style="font-size: 10px;padding-top: -35px;"><?= $result->email ?></p> -->
                                                                    </div>

                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <h6 class="text-uppercase text-primary" style="font-size: 10px;">Total Due :
                                                                        <span><?= rupiah($result->total_dengan_voucher) ?></span>
                                                                    </h6>
                                                                    <br>
                                                                    <img src="<?= base_url() ?>assets/user/<?= $result->kd_transaksi . ".jpg" ?>" alt="">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 0px;margin-bottom:-75px;">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table" style="width: 100%;">
                                                        <thead>
                                                            <tr class="thead-default">
                                                                <th style="font-size: 6px;">Deskripsi</th>
                                                                <th style="font-size: 6px;">Warna</th>
                                                                <th style="font-size: 6px;">Ukuran</th>
                                                                <th style="font-size: 6px;">Jumlah</th>
                                                                <th style="font-size: 6px;">Harga</th>
                                                                <th style="font-size: 6px;">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($result->keranjang as $key) :
                                                            ?>
                                                                <tr>
                                                                    <td style="font-size: 6px;"><?= $key->nama_artikel ?></td>
                                                                    <td style="font-size: 6px;"><?= $key->nama_warna ?></td>
                                                                    <td style="font-size: 6px;"><?= $key->ukuran ?></td>
                                                                    <td style="font-size: 6px;"><?= $key->jumlah ?></td>
                                                                    <td style="font-size: 6px;"><?= rupiah($key->harga) ?></td>
                                                                    <td style="font-size: 6px;"><?= rupiah($key->jumlah * $key->harga) ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- Mirrored from colorlib.com//polygon/adminty/default/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Sep 2020 17:42:51 GMT -->

</html>