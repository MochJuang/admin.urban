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
            padding: 3px;
        }

        th {
            font-size: 10px;
            padding: 3px;
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
                                    <div class="row invoice-contact" style="padding-top: -38px;padding-left: -20px;padding-right: -20px;">
                                        <div class="col-sm-12">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <!-- <tr>
                                                        <td></td>
                                                    </tr> -->
                                                    <tr>
                                                        <td>
                                                            <img style="width: 150px;" src="<?= base_url() ?>assets/assets/icon/URBAN&CO_LOGO-01black.png" class="m-b-10" alt="">
                                                            <br>
                                                            Urban&CO <br>
                                                            Jl. Mahkota Pirus No.88, Babakan Madang, Kec. Babakan Madang, Bogor, Jawa Barat <br>
                                                            <a href="#" target="_top"><span class="__cf_email__"></span>urbanco.promosi@gmail.com</a> <br>
                                                            (021) 87964451
                                                        </td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td>Jl. Mahkota Pirus No.88, Babakan Madang, Kec. Babakan Madang, Bogor, Jawa Barat</td>
                                                    </tr> -->
                                                    <!-- <tr>
                                                        <td><a href="#" target="_top"><span class="__cf_email__"></span>urbanco.promosi@gmail.com</a></td>
                                                    </tr> -->
                                                    <!-- <tr>
                                                        <td>(021) 87964451</td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-block" style="padding-top: -12px;padding-left: -13px;padding-right: -15px;">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="" style="border-top: 0px;width:100%;margin-top: -20px;">

                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p style="font-size: 10px;">Informasi Client :</p>
                                                                </td>
                                                                <td style="padding-right:30px">
                                                                    <p style="font-size: 10px;">Informasi Order :</p>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <p style="font-size: 10px;">No Invoice #<?= $result->kd_transaksi ?></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-right:30px">
                                                                    <h6 class="m-0 m-t-5"><?= $result->nama_user ?></h6>
                                                                    <p class="m-0 m-t-5" style="font-size: 10px;"><?= $result->alamat ?></p>
                                                                    <p class="m-0 m-t-5" style="font-size: 10px;"><?= $result->telpon ?></p>
                                                                    <p class="m-0 m-t-5" style="font-size: 10px;"><?= $result->email ?></p>
                                                                </td>
                                                                <td style="padding-right:40px">
                                                                    <table class="">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>Tanggal :</th>
                                                                                <td><?= tanggal_indo($result->tanggal) ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Status :</th>
                                                                                <td> <?php
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
                                                                                        ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Id :</th>
                                                                                <td> #145698 </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
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
                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table  invoice-detail-table" style="width: 100%;">
                                                        <thead>
                                                            <tr class="thead-default">
                                                                <th>Deskripsi</th>
                                                                <th>Warna</th>
                                                                <th>Ukuran</th>
                                                                <th>Jumlah</th>
                                                                <th>Harga</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($result->keranjang as $key) :
                                                            ?>
                                                                <tr>
                                                                    <td><?= $key->nama_artikel ?></td>
                                                                    <td><?= $key->nama_warna ?></td>
                                                                    <td><?= $key->ukuran ?></td>
                                                                    <td><?= $key->jumlah ?></td>
                                                                    <td><?= rupiah($key->harga) ?></td>
                                                                    <td><?= rupiah($key->jumlah * $key->harga) ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-8">
                                                <table class="table  invoice-total" style="padding-top: 0px !important;">
                                                    <tbody>
                                                        <tr>
                                                            <th>Sub Total :</th>
                                                            <td><?= rupiah($result->total) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Ongkir :</th>
                                                            <td><?= rupiah($result->ongkir) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Voucher (<?= $result->besaran ?>%) :</th>
                                                            <td><?= rupiah($result->total_voucher) ?></td>
                                                        </tr>
                                                        <tr class="text-info">
                                                            <td>
                                                                <h5 class="text-primary" style="font-size: 15px;">Total :</h5>
                                                            </td>
                                                            <td>
                                                                <h5 class="text-primary"><?= rupiah($result->total_dengan_voucher) ?></h5>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-sm-12">
                                                <h6>Terms And Condition :</h6>
                                                <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor </p>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">


            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    
                </div>
            </div>
        </div>
    </div> -->

    <script data-cfasync="false" src="<?= base_url() ?>assets/email-decode.min.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/jquery/js/jquery.min.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/popper.js/js/popper.min.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/modernizr/js/modernizr.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/modernizr/js/css-scrollbars.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/i18next/js/i18next.min.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/js/pcoded.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/assets/js/vartical-layout.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/assets/js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/assets/js/script.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="text/javascript"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-23581568-13');
    </script>
    <script src="<?= base_url() ?>assets/rocket-loader.min.js" data-cf-settings="20525b49fe334d4cd5099ad2-|49" defer=""></script>
</body>
<!-- Mirrored from colorlib.com//polygon/adminty/default/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Sep 2020 17:42:51 GMT -->

</html>