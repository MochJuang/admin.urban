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
                                    <button data-toggle="modal" data-target="#modal-container-lookbook" id="modal-btn" style="margin-left:5px;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                        <i class="icofont icofont-ui-add"></i>
                                    </button>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <a href="<?= base_url() ?>export/exampleLookbook" style="float:right;height: 36px;margin-right:10px;margin-left:10px" title="Add/Edit Color" class="btn btn-success">
                                            Format Lookbook
                                        </a>
                                        <table id="table-lookbook" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Lookbook</th>
                                                    <th>Nama Lookbook</th>
                                                    <th>Gambar Thumbnail</th>
                                                    <th>Lihat Gambar</th>
                                                    <th>Lihat Product</th>
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

<div class="modal fade" id="modal-container-lookbook" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabellookbook"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-lookbook">
                    <div>
                        <input type="text" name="id" id="id" hidden>
                        <input type="text" class="kode_lookbook" name="kode_lookbook" hidden>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Kode Lookbook<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="kode_lookbook" class="form-control" name="kodelookbook" placeholder="Kode Lookbook" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Nama Lookbook<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="nama_lookbook" class="form-control" name="nama_lookbook" placeholder="Nama Lookbook" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Thumbnail<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="thumbnail" class="form-control" name="thumbnail" placeholder="Nama Lookbook" type="file" required="required">
                        </div>
                    </div>
                    <div class="form-group row manage-image">
                        <label class="col-sm-2 col-form-label" for="name">Gambar<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10 tambah-gambar">
                            <div class="row" data-gambar="1">
                                <div class="col-md-10">
                                    <input id="gambar1" class="form-control gambar" name="gambar1" placeholder="CO: 90000" type="file" required="required">

                                </div>
                                <div class="col-md-2">
                                    <a href="#" onclick="tambahgambar(1)" class="card-block icon-btn btn btn-inverse btn-outline-inverse">
                                        <i class="icofont icofont-ui-add"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row updateDataLookbook">
                        <label class="col-sm-2 col-form-label" for="name">Import Kode Product<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="excell" class="form-control" name="excell" placeholder="CO: 90000" type="file" required="required">

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
<script src="<?= base_url() ?>assets/js/lookbook.js"></script>