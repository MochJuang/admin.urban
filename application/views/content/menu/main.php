<style>
    .border-checkbox-section .border-checkbox-group .border-checkbox-label {
        position: relative;
        display: inline-block;
        cursor: pointer;
        height: 20px;
        line-height: 15px;
        padding-left: 17px;
        margin-right: 15px;
    }

    .border-checkbox-section .border-checkbox-group .border-checkbox-label:before {
        content: "";
        display: block;
        border: 1px solid grey;
        width: 15px;
        height: 15px;
        position: absolute;
        left: 0;
    }

    .border-checkbox-section .border-checkbox-group .border-checkbox-label:after {
        content: "";
        display: block;
        width: 6px;
        height: 12px;
        opacity: 0;
        border-right: 2px solid #eee;
        border-top: 2px solid #eee;
        position: absolute;
        left: 2px;
        top: 7px;
        -webkit-transform: scaleX(-1) rotate(135deg);
        transform: scaleX(-1) rotate(135deg);
        -webkit-transform-origin: left top;
        transform-origin: left top;
    }

    .border-checkbox-section .border-checkbox-group-primary .border-checkbox:checked+.border-checkbox-label:after {
        border-color: grey;
    }

    .jstree-default .jstree-anchor {
        line-height: 24px;
        height: 24px;
        color: #353c4e;
        font-size: 14.5px;
    }

    .icofont-folder:before {
        color: #353c4e;
        content: "\f007";
        font-size: 14.5px;
    }

    .icofont-file-alt:before {
        color: #353c4e;
        content: "\eeac";
        font-size: 14.5px;
    }
</style>
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
                                    <h5>Material Tab</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row m-b-30">
                                        <div class="col-lg-12 col-xl-12">

                                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">Menu Privillage</a>
                                                    <div class="slide"></div>
                                                </li>
                                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Menu Positioning</a>
                                                    <div class="slide"></div>
                                                </li>

                                            </ul>
                                            <div class="tab-content card-block">
                                                <div class="tab-pane active" id="home3" role="tabpanel">

                                                    <div class="card-header">
                                                        <h5><?= $desc ?></h5>
                                                        <button data-toggle="modal" data-target="#modal-container-menu" id="modal-btn" style="margin-left:5px;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                                            <i class="icofont icofont-ui-add"></i>
                                                        </button>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="table-menu" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Label</th>
                                                                        <th>Link</th>
                                                                        <th>Icon</th>
                                                                        <th>Parent</th>
                                                                        <th>Is Header Section</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="profile3" role="tabpanel">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>Menu Positioning</h5>
                                                        </div>
                                                        <div class="card-block">
                                                            <div id="nestable-menu" class="m-b-10">
                                                                <button type="button" class="btn btn-primary waves-effect waves-light m-b-10 m-r-20" data-action="expand-all">Expand All</button>
                                                                <button type="button" class="btn btn-success waves-effect waves-light m-b-10" data-action="collapse-all">Collapse All</button>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <div class="cf nestable-lists">
                                                                        <div class="dd" style="max-width:100% !important;" id="nestable2">
                                                                            <ol class="dd-list">
                                                                                <li class="dd-item" data-id="1">
                                                                                    <div class="dd-handle">Item 1</div>
                                                                                </li>
                                                                                <li class="dd-item" data-id="2">
                                                                                    <div class="dd-handle">Item 2</div>
                                                                                    <ol class="dd-list">
                                                                                        <li class="dd-item" data-id="3">
                                                                                            <div class="dd-handle">Item 3</div>
                                                                                        </li>
                                                                                        <li class="dd-item" data-id="4">
                                                                                            <div class="dd-handle">Item 4</div>
                                                                                        </li>
                                                                                        <li class="dd-item" data-id="5">
                                                                                            <div class="dd-handle">Item 5</div>
                                                                                            <ol class="dd-list">
                                                                                                <li class="dd-item" data-id="6">
                                                                                                    <div class="dd-handle">Item 6</div>
                                                                                                </li>
                                                                                                <li class="dd-item" data-id="7">
                                                                                                    <div class="dd-handle">Item 7</div>
                                                                                                </li>
                                                                                                <li class="dd-item" data-id="8">
                                                                                                    <div class="dd-handle">Item 8</div>
                                                                                                </li>
                                                                                            </ol>
                                                                                        </li>
                                                                                        <li class="dd-item" data-id="9">
                                                                                            <div class="dd-handle">Item 9</div>
                                                                                        </li>
                                                                                        <li class="dd-item" data-id="10">
                                                                                            <div class="dd-handle">Item 10</div>
                                                                                        </li>
                                                                                    </ol>
                                                                                </li>
                                                                                <li class="dd-item" data-id="11">
                                                                                    <div class="dd-handle">Item 11</div>
                                                                                </li>
                                                                                <li class="dd-item" data-id="12">
                                                                                    <div class="dd-handle">Item 12</div>
                                                                                </li>
                                                                            </ol>
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modal-container-menu" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelmenu"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-menu">
                    <div>
                        <input id="id" type="text" name="id" hidden value="">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Label<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="label" class="form-control" name="label" placeholder="Label" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Link<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="link" class="form-control" name="link" placeholder="Link" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Icon<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="icon" class="form-control" name="icon" placeholder="Icon" type="text" required="required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Parent<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-menu" class="js-example-basic-single col-sm-12" name="parent" placeholder="id_usr_role" type="text">
                                <option value="">Pilih Parent</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Is Header Section?<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-header" class="js-example-basic-single col-sm-12" name="is_head_section" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Header</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
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
<!-- <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> -->
<script src="<?= base_url() ?>assets/js/menu.js"></script>