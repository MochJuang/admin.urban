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
                                    <button data-toggle="modal" data-target="#modal-container-promo" id="modal-btn-promo" style="margin-left:5px;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                        <i class="icofont icofont-ui-add"></i>
                                    </button>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-promo" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Promo</th>
                                                    
                                                    <th>Gambar</th>
                                                    <th>Minimal Pembelian</th>
                                                    <th>Potongan</th>
                                                    <th>Dimulai</th>
                                                    <th>Expired</th>
                                                    <th>Detail</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
<script>
var isEdit = false
    $('document').ready(function () {
    var modalLabel = $('#myModalLabelPromo');
    var form = $('#form-promo');
    $('#startDate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#lastDate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    var no = 0;
    //Form Components

    var formRole = $('#promo-select');
    formRole.select2();
    $('#jenis-select').select2();
    $("#persen").hide();
    $("#nominal").hide();
    $('#jenis-select').change(function () {
        // alert($('#jenis-select').val())
        if ($('#jenis-select').val() == 1) {
            $("#persen").show();
            $("#nominal").hide();
        } else {
            $("#persen").hide();
            $("#nominal").show();
        }
    })
    var table = $('#table-promo');
    table.DataTable({
        "aaSorting": [],
        "initComplete": function (settings, json) {

        },
        "retrieve": true,
        "processing": true,
        'ajax': {
            "type": "GET",
            "url": base_url + 'promo/get',
            "data": function (d) {
                no = 0;
            },
            "dataSrc": function (result) {
                // console.log(gratisOngkir)
                // if (gratisOngkir) {
                //     result = result.filter(es=> es.jenis == 4)
                // } else {
                    result = result.filter(es=> es.jenis == 4)
                // }
                return result
            }
        },
        'columns': [
            {
                render: function (data, type, full, meta) {

                    no += 1;
                    return no;
                }
            },
            {
                render: function (data, type, full, meta) {
                    return full.nama_promo == null ? '-' : full.nama_promo;
                }
            },
          
            {
                render: function (data, type, full, meta) {
                    return full.gambar == null ? '-' : `<a href="${path_photo + '/promo/' + full.gambar}" data-lightbox="roadtrip"><img src="${path_photo + '/promo/' + full.gambar
                        }" style="max-width: 237px;" class="img-fluid m-b-10" /></a>`;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.promo == null ? '-' : 'Rp. '+full.promo;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.harga == null ? '-' : full.harga;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.startDate == null ? '-' : full.startDate;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.lastDate == null ? '-' : full.lastDate;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.detail_promo == null ? '-' : full.detail_promo;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.status == null ? '-' : full.status == 1 ? `<button class="btn btn-primary" onclick="activated(${full.id_promo}, ${full.status})">Aktif</button> ` : `<button class="btn btn-danger" onclick="activated(${full.id_promo}, ${full.status})">Tidak Aktif</button> `;
                }
            }, {
                render: function (data, type, full, meta) {
                    return `
                            <div class="text-center">
                                    <a href="#" class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">\
                                        <i class="icofont icofont-ui-settings"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" onclick="edit_promo(${full.id_promo})" ><i class="icofont icofont-ui-edit"></i>Edit</a>
                                        <a class="dropdown-item" href="#" onclick="delete_promo(${full.id_promo}, 'promo')" ><i class="icofont icofont-ui-delete"></i>Delete</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                </div>
                            </div>`;
                }
            }
        ]
    });

    form.submit(function (e) {
        var url_form = (isEdit == false) ? base_url + 'promo/add' : base_url + 'promo/edit'
        e.preventDefault();
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(this);
        }
        $.ajax({
            url: url_form,
            type: 'post',
            data: formdata ? formdata : form.serialize(),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, text) {

                var caption = (isEdit == false) ? 'input' : 'edit';
                // alert("berhasil")
                if (data.success) {
                    $('#cancel').click();
                    swal({
                        title: 'Saved!',
                        text: 'Successful ' + caption + ' data!',
                        type: 'success',
                        closeOnConfirm: true
                    },
                        function () {
                            //location.reload();
                            $('#table-promo').DataTable().ajax.reload();
                        }

                    );


                } else {
                    $('#cancel').click();
                    swal({
                        title: 'Failed!',
                        text: 'Failed ' + caption + ' data!',
                        type: 'error',
                        closeOnConfirm: true
                    },
                        function () {
                            // location.reload();
                            $('#table-promo').DataTable().ajax.reload();
                        }

                    );
                }
                isEdit = false;
            },
            error: function (stat, res, err) {
                alert(err);
                isEdit = false;

            }
        });
    });


    // Modal Section
    $('#modal-btn-promo').click(function () {
        if (!isEdit) {
            form[0].reset();
            $("#id").val('');
            $("#nama_promo").val('');
            $("#promo").val('');
            $('#promo-select').val('');
            $('#promo-select').trigger('change');

            $("#myModalLabelPromo").html('Add New Promo');
        } else {
            $('#password').removeAttr('required="required"');
            modalLabel.html('Edit Agenda');
        }
    });

    $('.close').click(function () {
        isEdit = false;
        $('#password').prop('required', true);
    });

    $('#cancel').click(function () {
        isEdit = false;
        $('#password').prop('required', true);
    });

    $('#submit').click(function () {
        $('#sendSubmit').click();
    });
    //Modal Section


});
</script>
<script src="<?= base_url() ?>assets/js/promo.js"></script>
<div class="modal fade" id="modal-container-promo" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelPromo"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-promo">
                    <div>
                        <input type="hidden" name="id" id="id" >
                        <input type="hidden" name="jenis" value="4" id="jenis">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Nama Promo<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="nama_promo" class="form-control" name="nama_promo" placeholder="Nama Promo" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Gambar<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="gambar" class="form-control" name="gambar" placeholder="Photo" type="file" required="required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Promo Dimulai<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="startDate" class="form-control" name="startDate" placeholder="Promo Dimulai" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Promo Berakhir<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="lastDate" class="form-control" name="lastDate" placeholder="Promo Diakhiri" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Status<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="promo-select" class="js-example-basic-single col-sm-12" name="status" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Status</option>
                                <option value=1>Aktif</option>
                                <option value=2>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Jenis<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="jenis-select" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Status</option>
                                <option value=1>Persen</option>
                                <option value=2>Nominal</option>
                                <option value=4>Gratis Ongkir</option>
                            </select>
                        </div>
                    </div> -->
                    <div id="persen">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Promo (%)<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="promo" class="form-control" name="promo" placeholder="Promo (%)" type="number" min="0">
                            </div>
                        </div>
                    </div>
                    <div id="nominal">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Nominal Harga/Promo<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="hargas" class="form-control" name="harga" placeholder="Nominal Harga" type="number" min="0">
                            </div>
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