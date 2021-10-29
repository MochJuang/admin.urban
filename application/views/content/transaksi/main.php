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
                                        <div class="form-group row" style="margin-top: 20px;">

                                            <div class="col-sm-2">
                                                <select id="select-startDate" class="js-example-basic-single col-sm-12" name="kategori_id" placeholder="id_usr_role" type="text" required="required">
                                                    <option value="">Pilih Tanggal Pertama</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <select id="select-lastDate" class="js-example-basic-single col-sm-12" name="kategori_id" placeholder="id_usr_role" type="text" required="required">
                                                    <option value="">Pilih Tanggal Kedua</option>

                                                </select>
                                            </div>
                                        </div>

                                        <table id="table-transaksi" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Nama Pembeli</th>
                                                    <th>Tanggal</th>
                                                    <th>Provinsi</th>
                                                    <th>Kabupaten</th>
                                                    <th>Kecamatan</th>
                                                    <th>Alamat Lengkap</th>
                                                    <th>Invoice</th>
                                                    <th>Total</th>

                                                </tr>
                                            </thead>
                                            <tbody>
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

<div class="modal fade" id="modal-container-transaksi" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabeltransaksi"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-transaksi">
                    <div>
                        <input type="text" name="id" id="id" hidden>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Nama transaksi<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="nama_transaksi" class="form-control" name="nama_transaksi" placeholder="Nama transaksi" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" style="color:#ff3333;">Required (*)</span>
                        </label>
                    </div>
                    <button hidden type="submit" id="sendSubmit"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" id="submit" class="btn btn-primary waves-effect waves-light ">Submit</button>
            </div>
        </div>
    </div>
</div>
<script>
    var idTransaksi = '<?= $this->uri->segment(2) ? $this->uri->segment(2) : null ?>';
</script>

<script src="<?= base_url() ?>assets/js/transaksi.js"></script>