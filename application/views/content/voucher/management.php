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
                                    <button data-toggle="modal" data-target="#modal-container-voucher" id="modal-btn" style="margin-left:5px;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                        <i class="icofont icofont-ui-add"></i>
                                    </button>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-voucher" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Voucher</th>
                                                    <th>Nama Voucher</th>
                                                    <th>Voucher (%)</th>
                                                    <th>Jenis</th>
                                                    <th>Jumlah Pengguna</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
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

<div class="modal fade" id="modal-container-voucher" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelVOucher"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-voucher">
                    <div>
                        <input type="text" name="id" id="id" hidden>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Voucher<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-voucher" class="js-example-basic-single col-sm-12" name="kode" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Voucher</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Jenis<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="jenis-select" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Jenis</option>
                                <option value="umum">General</option>
                                <option value="khusus">Khusus</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Max Jumlah Pengguna<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="jumlah_pengguna" class="form-control" name="jumlah_pengguna" placeholder="Max Jumlah Pengguna" min="0" type="number" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Status<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="voucher-select" class="js-example-basic-single col-sm-12" name="is_active" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Status</option>
                                <option value=1>Aktif</option>
                                <option value=2>Tidak Aktif</option>
                            </select>
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
<script src="<?= base_url() ?>assets/js/management.js"></script>