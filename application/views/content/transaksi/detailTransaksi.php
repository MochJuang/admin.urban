<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4><?= $title ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <?= $breadcumb ?>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?= $desc ?></h5>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <?php //print_r($data); 
                                        ?>

                                        <table id="table-transaksi" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Nama Pembeli</th>
                                                    <th>Nama Artikel</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                    <th>Warna</th>
                                                    <th>Ukuran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $masuk = [];
                                                foreach ($data as $key) :
                                                    // echo in_array($countCode, $key->kode_transaksi);
                                                    $ele = 1;
                                                    // $masuk = [];
                                                    foreach ($countCode as $el) {
                                                        if ($el->kode_transaksi == $key->kode_transaksi) {
                                                            // array_push($masuk[$no], $key->kode_transaksi);
                                                            $masuk['count'][$key->kode_transaksi] = $el->jumlah;
                                                        }
                                                        $ele++;
                                                    }
                                                    print_r($masuk);
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $key->kode_transaksi ?></td>
                                                        <td><?= $key->firstname ?></td>
                                                        <td><?= $key->nama_artikel ?></td>
                                                        <td><?= $key->harga ?></td>
                                                        <td><?= $key->jumlah ? $key->jumlah : '-' ?></td>
                                                        <td><?= $key->nama_warna ?></td>
                                                        <td><?= $key->ukuran ?></td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                endforeach;
                                                print_r($masuk);
                                                ?>

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

<script src="<?= base_url() ?>assets/js/detailTransaksi.js"></script>