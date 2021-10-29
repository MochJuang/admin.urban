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
                                    <button data-toggle="modal" data-target="#modal-container-component" id="modal-btn" style="margin-left:5px;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                        <i class="icofont icofont-ui-add"></i>
                                    </button>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-component" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Url</th>
                                                    <th>Image</th>
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

<div class="modal fade" id="modal-container-component" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelcomponent"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-component">
                    <div>
                        <input type="hidden" name="id" id="id" >
                        
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Title<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input placeholder="Title" type="text" required="required" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Url<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                            <input placeholder="Url" type="text" required="required" class="form-control" id="url" name="url">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Image<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input placeholder="Judul Component" type="file" required="required" class="form-control" id="gambar" name="gambar">
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
<script src="<?= base_url() ?>assets/js/magazine.js"></script>