<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4><?= "Color & Size" ?></h4>
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
                        <div class="col-sm-6">

                            <div class="card">
                                <div class="card-header">
                                    <h5><?= $desc ?></h5>
                                    <button data-toggle="modal" data-target="#modal-container-Groupcolor" id="modal-btn-colorGroup" style="margin-left:5px;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                    <!-- <button data-toggle="modal" data-target="#modal-container-color" id="modal-btn-color" style="margin-left:5px;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon"> -->
                                        <i class="icofont icofont-ui-add"></i>
                                    </button>

                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-warna" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Group Color</th>
                                                    <th>Hex</th>
                                                    <th>Color</th>
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
                        <div class="col-sm-6">

                            <div class="card">
                                <div class="card-header">
                                    <h5><?= "List Size" ?></h5>
                                    <button data-toggle="modal" data-target="#modal-container-size" id="modal-btn-size" style="margin-left:5px;" title="Add/Edit Size" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                        <i class="icofont icofont-ui-add"></i>
                                    </button>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-size" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tipe</th>
                                                    <th>Size</th>

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
<div class="modal fade" id="modal-container-Groupcolor" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelColorGROUP">test</h4>
                <button type="button" class="close" id="closeGroup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-warnaGroup">
                    <div>
                        <input type="hidden" name="id" id="idGroupWarna">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Group Color<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="name_color" class="form-control" name="name_color" placeholder="Color Name" type="text" required="required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="email">Hex Color
                        </label>
                        <div class="col-sm-10">
                            <input id="hex_color" class="form-control" name="hex_color" placeholder="Hex Color" type="text">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" style="color:#ff3333;">Required (*)</span>
                        </label>
                    </div>
                    <button hidden type="submit" id="sendSubmitGroup"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelGroup" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" id="submitGroup" class="btn btn-primary waves-effect waves-light ">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-container-color" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelColor">Color</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-warna">
                    <div>
                        <input type="text" name="id" id="idWarna" hidden>
                        <input type="hidden" name="group_id" id="group_id">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Color Name<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="nama_warna" class="form-control" name="nama_warna" placeholder="Color Name" type="text" required="required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="email">Hex Color
                        </label>
                        <div class="col-sm-10">
                            <input id="warna" class="form-control" name="warna" placeholder="Hex Color" type="text">
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
<div class="modal fade" id="modal-container-size" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelSize"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-size">
                    <div>
                        <input type="text" name="id" id="idSize" hidden>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Tipe<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-tipe" class="js-example-basic-single col-sm-12" name="tipe" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Kategori</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Ukuran<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="ukuran" class="form-control" name="ukuran" placeholder="Ukuran" type="text" required="required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" style="color:#ff3333;">Required (*)</span>
                        </label>
                    </div>
                    <button hidden type="submit" id="sendSubmit2"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel2" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" id="submit2" class="btn btn-primary waves-effect waves-light ">Submit</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/js/warna.js"></script>
<script src="<?= base_url() ?>assets/js/size.js"></script>