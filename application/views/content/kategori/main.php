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
                                    <button data-toggle="modal" data-target="#modal-container-kategori" id="modal-btn" style="margin-left:5px;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                        <i class="icofont icofont-ui-add"></i>
                                    </button>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-kategori" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Kategori</th>
                                                    <th>Departemen</th>
                                                    <th>Nama Kategori</th>
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

<div class="modal fade" id="modal-container-kategori" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelkategori"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-kategori">
                    <div>
                        <input type="text" name="id" id="id" hidden>
                        <input type="text" name="kode_kategori" class="kode_kategori" hidden>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Kode Kategori<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control kode_kategori" id="" placeholder="Nama Kategori" type="text" disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Brand<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-brand" class="js-example-basic-single col-sm-12" name="brand_id" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Brand</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Departemen<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-kategori" class="js-example-basic-single col-sm-12" name="departemen_id" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Departemen</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Nama Kategori<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="nama_kategori" class="form-control" name="nama_kategori" placeholder="Nama Kategori" type="text" required="required">
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
<!-- <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> -->
<script src="<?= base_url() ?>assets/js/kategori.js"></script>