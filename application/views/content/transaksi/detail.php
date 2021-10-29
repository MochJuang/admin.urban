<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="container" style="max-width: 1680px;">
                        <?php if ($result->status != 1) { ?>
                            <div class="row text-center">
                                <div class="col-sm-12 invoice-btn-group text-center">
                                    <a href="<?= base_url() ?>export/pdfA6/<?= $this->uri->segment('3') ?>" class="btn btn-warning btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20" target="_blank">Print Sticker</a>
                                    <a href="<?= base_url() ?>export/pdf2/<?= $this->uri->segment('3') ?>" class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20" target="_blank">Print</a>
                                    <a href="<?= base_url() ?>transaksi/" class="btn btn-danger waves-effect m-b-10 btn-sm waves-light">Kembali</a>
                                </div>
                            </div>
                        <?php } ?>
                        <div>
                            <div class="card">
                                <div class="row invoice-contact">
                                    <div class="col-md-8">
                                        <div class="invoice-box row">
                                            <div class="col-sm-12">
                                                <table class="table table-responsive invoice-table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td><img style="width: 200px;" src="<?= base_url() ?>assets/assets/icon/URBAN&CO_LOGO-01black.png" class="m-b-10" alt=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Urban&CO</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jl. Mahkota Pirus No.88, Babakan Madang, Kec. Babakan Madang, Bogor, Jawa Barat</td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="#" target="_top"><span class="__cf_email__"></span>urbanco.promosi@gmail.com</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>(021) 87964451</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"> </div>
                                </div>
                                <div class="card-block">
                                    <div class="row invoive-info">
                                        <div class="col-md-4 col-xs-12 invoice-client-info">
                                            <h6>Informasi Client :</h6>
                                            <h6 class="m-0"><?= ucfirst($result->nama_user) ?></h6>
                                            <p class="m-0 m-t-10"><?= $result->alamat ?></p>
                                            <p class="m-0"><?= $result->telpon ?></p>
                                            <p><a href="#"><?= $result->email ?></a></p>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <h6>Informasi Order :</h6>
                                            <table class="table table-responsive invoice-table invoice-order table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <th>Tanggal :</th>
                                                        <td><?= tanggal_indo($result->tanggal) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status :</th>
                                                        <!-- 1=simpan;2=menunggu pembayaran;3=proses;4=packing;5=kirim;6=selesai	 -->
                                                        <td>
                                                            <?php
                                                            switch ($result->status) {
                                                                case 1:
                                                                    echo '<span class="label label-warning">Simpan</span>';
                                                                    break;
                                                                case 2:
                                                                    echo '<span class="label label-primary">Menunggu Pembayaran</span>';
                                                                    break;
                                                                case 3:
                                                                    echo '<span class="label label-warning">Proses</span>';
                                                                    break;
                                                                case 4:
                                                                    echo '<span class="label label-success">Packing</span>';
                                                                    break;
                                                                case 5:
                                                                    echo '<span class="label label-inverse">Kirim</span>';
                                                                    break;
                                                                case 6:
                                                                    echo '<span class="label label-success">Selesai</span>';
                                                                    break;
                                                                default:
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Id :</th>
                                                        <td> #145698 </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <h6 class="m-b-20">No Invoice <span>#<?= $result->kd_transaksi ?></span></h6>
                                            <h6 class="text-uppercase text-primary">Total Due :
                                                <span><?= rupiah($result->total_dengan_voucher) ?></span>
                                            </h6>
                                            <img src="<?= base_url() ?>assets/user/<?= $result->kd_transaksi . ".jpg" ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table  invoice-detail-table">
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
                                                                <td>
                                                                    <?= $key->nama_artikel ?>
                                                                </td>
                                                                <td>
                                                                    <?= $key->nama_warna ?>
                                                                </td>
                                                                <td>
                                                                    <?= $key->ukuran ?>
                                                                </td>
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
                                        <div class="col-sm-12">
                                            <table class="table table-responsive invoice-table invoice-total">
                                                <tbody>
                                                    <tr>
                                                        <th>Sub Total :</th>
                                                        <td><?= rupiah($result->total) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ongkir :</th>
                                                        <td>+<?= rupiah($result->ongkir) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Saldo User :</th>
                                                        <td>-<?= rupiah($result->saldo_user ? $result->saldo_user : 0) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Voucher (<?= $result->besaran ?>%) :</th>
                                                        <td><?= rupiah($result->total_voucher) ?></td>
                                                    </tr>
                                                    <tr class="text-info">
                                                        <td>
                                                            <hr />
                                                            <h5 class="text-primary">Total :</h5>
                                                        </td>
                                                        <td>
                                                            <hr />
                                                            <h5 class="text-primary"><?= rupiah($result->total_dengan_voucher) ?></h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h6>Terms And Condition :</h6>
                                            <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor </p>
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