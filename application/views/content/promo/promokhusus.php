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
                                                    <th>Nama</th>
                                                    <th>Dimulai</th>
                                                    <th>Expired</th>
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
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script> -->
<link rel="stylesheet" href="<?= base_url()?>assets/datepicker/index.css" />
<script src="<?= base_url()?>assets/datepicker/index.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" ></script>
<script>
   
var isEdit = false
var idEdit = 0;
    $('document').ready(function () {
    var modalLabel = $('#myModalLabelPromo');
    var form = $('#form-promo');
    // $('#startDate').datepicker({
    //     dateFormat: 'yy-mm-dd'
    // });
    // $('#lastDate').datepicker({
    //     dateFormat: 'yy-mm-dd'
    // });\
    // $('#startDate').change(()=>{
    //     console.log(moment($('#startDate').val()).format("YYYY-MM-DD HH:mm:ss"))
    // })
    $('#startDate').datetimepicker({
        // format: "yyyy-mm-dd HH:mm:ss",
        dateFormat: 'yyyy-mm-dd',
        timeFormat: 'hh:mm:ss',
        showMeridian: true,
        autoclose: true,
        todayBtn: true,
        pickTime: true
    });
    $('#lastDate').datetimepicker({
        dateFormat: 'yyyy-mm-dd',
        timeFormat: 'hh:mm:ss',
        showMeridian: true,
        autoclose: true,
        todayBtn: true,
        pickTime: true
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
            "url": base_url + 'promo/getpromokhusus',
            "data": function (d) {
                no = 0;
            },
            "dataSrc": function (result) {
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
                    return full.nama == null ? '-' : full.nama;
                }
            },
          
           {
                render: function (data, type, full, meta) {
                    return full.startDate == null ? '-' : moment(full.startDate).format("YYYY-MM-DD HH:mm:ss");
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.lastDate == null ? '-' : moment(full.lastDate).format("YYYY-MM-DD HH:mm:ss");
                }
            }, {
                render: function (data, type, full, meta) {
                    return `
                            <div class="text-center">
                                    <a href="#" class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">\
                                        <i class="icofont icofont-ui-settings"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" onclick="edit(${full.id})" ><i class="icofont icofont-ui-edit"></i>Edit</a>
                                        <a class="dropdown-item" href="#" onclick="delete_promo(${full.id}, 'promoKhusus')" ><i class="icofont icofont-ui-delete"></i>Delete</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                </div>
                            </div>`;
                }
            }
        ]
    });

    form.submit(function (e) {
        if (isEdit == false) {
            var url_form =  service_url + 'promoKhusus/insert';
            var methode = 'POST';
        } else {
            var url_form =  service_url + 'promoKhusus/update/'+idEdit;
            var methode = 'PUT';
        }
        var url_form = (isEdit == false) ? service_url + 'promoKhusus/insert' : service_url + 'promoKhusus/update/'+idEdit
        e.preventDefault();
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(this);
        }
        $.ajax({
            url: url_form,
            type: methode,
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

            $("#myModalLabelPromo").html('Add New Promo Khusus');
        } else {
            $('#password').removeAttr('required="required"');
            modalLabel.html('Edit Promo Khusus');
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
function edit(id) {
    getMasterData(service_url + 'promoKhusus/' + id, '', function (data) {
        isEdit = true;
        idEdit = id;
        console.log(idEdit)
        $("#id").val(data.id);
        $("#nama").val(data.nama);
        $("#startDate").val(moment(data.startDate).format("YYYY-MM-DD HH:mm:ss"));
        $("#lastDate").val(moment(data.startDate).format("YYYY-MM-DD HH:mm:ss"));
        $('#modal-btn-promo').click();
    });
}
</script>
<!-- <script src="<?= base_url() ?>assets/js/promo.js"></script> -->
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
                        <label class="col-sm-2 col-form-label" for="name">Nama Promo Khusus<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="nama" class="form-control" name="nama" type="text" required="required">
                        </div>
                    </div>
                  

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Dimulai<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="startDate" class="form-control" name="startDate" placeholder="Promo Dimulai" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Berakhir<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="lastDate" class="form-control" name="lastDate" placeholder="Promo Diakhiri" type="text" required="required">
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