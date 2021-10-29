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
                  <div class="row invoice-contact" style="display:flex;padding-top: -58px;padding-left: -50px;margin-right: -120px;justify-content: space-around;">
                    <div class="col-sm-6">
                      <table class="table table-borderless" style="width: 100%;">
                        <tbody>
                          <tr>
                            <td>
                              <img style="width: 150px;" src="<?= base_url() ?>assets/assets/icon/URBAN&CO_LOGO-01black.png" class="m-b-10" alt="">
                              <br>

                            </td>
                            <td>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-6">
                      <p style="text-align: right;font-size:15px;margin-top:-55px;margin-right:60px">Tanggal Print: <?= tanggal_indo(date('Y-m-d')) ?></p>
                    </div>
                  </div>
                  <div class="card-block" style="padding-left: -50px;padding-top:-25px">
                    <div class="row">
                      <div class="col-sm-12">
                        <h6 class="text-uppercase text-primary" style="font-size: 15px;margin-left:10px">Kode Transaksi: <?= $result->kd_transaksi ?></h6>
                        <img src="<?= base_url() ?>assets/user/<?= $result->kd_transaksi . ".jpg" ?>" alt="">
                        <div class="table-responsive">
                        </div>
                      </div>
                      <div class="table-responsive" style="margin-left:23px;">
                        <p style="font-size: 15px;">
                          Tanggal :
                          <?= tanggal_indo($result->tanggal) ?><br>
                          Status: <?php
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
                                  ?><br>
                          Diprint Oleh: <?= $this->session->userdata('username') ?>
                        </p>



                      </div>
                    </div>
                    <div class="" style="margin-top: 10px;margin-bottom:-95px;margin-left: 30px;">
                      <!-- <div class="col-sm-12"> -->
                      <div class="table-responsive">
                        <table class="table" style="width: 110%;">
                          <thead>
                            <tr class="thead-default">
                              <th style="font-size: 13px;text-align: center;">Barcode</th>
                              <th style="font-size: 13px;text-align: center">Deskripsi</th>
                              <th style="font-size: 13px;text-align: center">Warna</th>
                              <th style="font-size: 13px;text-align: center">Ukuran</th>
                              <th style="font-size: 13px;text-align: center">Jumlah</th>
                              <!-- <th style="font-size: 13px;text-align: center">Total</th> -->
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($result->keranjang as $key) :
                            ?>
                              <tr>
                                <td style="font-size: 13px;text-align: center"><?= $key->barcode ? '<img src="' . getBarcodeReturn($key->barcode) . '" alt="">' : 'Barcode Produk Belum Tersedia' ?></td>
                                <td style="font-size: 13px;text-align: center"><?= $key->nama_artikel ?></td>x
                                <td style="font-size: 13px;text-align: center"><?= $key->warna ?></td>
                                <td style="font-size: 13px;text-align: center"><?= $key->ukuran ?></td>
                                <td style="font-size: 13px;text-align: center"><?= $key->jumlah ?></td>
                                <!-- <td style="font-size: 13px;text-align: center"><?= rupiah($key->jumlah * $key->harga) ?></td> -->
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- </div> -->
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