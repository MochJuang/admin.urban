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
                                                    <th>Banner</th>
                                                    
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
<script>
    var id_management = '<?= $id_management ?>';
    var isEdit = false;
$('document').ready(function () {
    var modalLabel = $('#myModalLabelVOucher');
    var form = $('#form-voucher');
    Voucher()
    var no = 0;
    var formRole = $('#voucher-select');
    var selectvoucher = $('#select-voucher');
    var jenis = $('#jenis-select');
    formRole.select2();
    selectvoucher.select2();
    jenis.select2();
    //Form Components
    var table = $('#table-voucher');
    table.DataTable({
        "aaSorting": [],
        "initComplete": function (settings, json) { },
        "retrieve": true,
        "processing": true,
        'ajax': {
            "type": "GET",
            "url": base_url + 'managementVoucher/getPengguna',
            "data": function (d) {
                no = 0;
                d.id_management = id_management;
            },
            "dataSrc": ""
        },
        'columns': [{
            render: function (data, type, full, meta) {

                no += 1;
                return no;
            }
        },
        {
            render: function (data, type, full, meta) {
                return full.firstname == null ? '-' : full.firstname + ' ' + full.lastname;
            }
        },
         {
            render: function (data, type, full, meta) {
                return `
                        <div class="text-center">
                                    <a href="#" class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                                        <i class="icofont icofont-ui-settings"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="${base_url + '/managementVoucher/detail/' + full.id_management}"><i class="icofont icofont-ui-user"></i>Detail Share Voucher</a>
                                        <a class="dropdown-item" href="#" onclick="edit_voucher('${full.id_management}')" ><i class="icofont icofont-ui-edit"></i>Edit</a>
                                        <a class="dropdown-item" href="#" onclick="delete_promo('${full.id_management}','management_voucher')" ><i class="icofont icofont-ui-delete"></i>Delete</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                </div>
                            </div> `;
            }
        }
        ]
    });

    form.submit(function (e) {
        var url_form = (isEdit == false) ? base_url + '/managementVoucher/add' : base_url + '/managementVoucher/edit'
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
                            $('#table-voucher').DataTable().ajax.reload();
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
                            $('#table-voucher').DataTable().ajax.reload();
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
    $('#modal-btn').click(function () {
        if (!isEdit) {
            form[0].reset();

            $('#nama').val('');
            $('#keterangan').val('');

            modalLabel.html('Add New Voucher');
        } else {
            $('#password').removeAttr('required="required"');
            modalLabel.html('Edit Voucher');
        }
    });

    $('#close_dialog').click(function () {
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

function edit_voucher(id) {
    getMasterData(service_url + 'voucher/' + id, '', function (data) {
        isEdit = true;
        $("#id").val(data.kode);
        $("#kode_voucher").val(data.kode);
        $("#voucher").val(data.besaran);
        $("#keterangan").val(data.keterangan_voucher);
        $("#max_pem").val(data.max_pem);
        $('#voucher-select').val(data.status_voucher);
        $('#voucher-select').trigger('change');
        $('#gambar').removeAttr('required');
        $('#modal-btn').click();
    });

}
function Voucher() {
    getMasterData(service_url + 'voucher/', '', function (data) {
        let voucher = '<option value="">PIlih Voucher</option>';
        data.forEach(element => {
            voucher += `<option value="${element.kode}">${element.nama_voucher}</option>`
        });
        $("#select-voucher").html(voucher)
    });
}
function delete_promo(idData, $params) {
    delete_datamaster(idData, $params, function (data) {
        $('#table-voucher').DataTable().ajax.reload();

    })
}

function activated(id_promo, status) {
    swal({
        title: "Are you sure?",
        text: "This data will be changed!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, change it!",
        closeOnConfirm: false
    },
        function () {
            $.ajax({
                url: base_url + "voucher/activated",
                type: 'post',
                dataType: 'json',
                data: {
                    id_voucher: id_promo,
                    status: status
                },
                success: function (data, text) {

                    if (data.success) {
                        swal(
                            'Changed!',
                            'Successful change data!',
                            'success'
                        );
                        $('#table-voucher').DataTable().ajax.reload();
                    }

                },
                error: function (stat, res, err) {
                    alert(err);
                }
            })
        })
}
</script>
