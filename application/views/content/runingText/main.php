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
                                    <button data-toggle="modal" data-target="#modal-container-about" id="modal-btn" style="margin-left:5px;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                        <i class="icofont icofont-ui-add"></i>
                                    </button>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="table-about" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Runing Text</th>
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

<div class="modal fade" id="modal-container-about" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelabout"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-about">
                    <div>
                        <input type="text" name="id" id="id" hidden>
                    </div>
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Jenis<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <select id="select-jenis" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text">
                                    <option value="">Pilih Jenis</option>
                                    <option value="voucher">Voucher</option>
                                    <option value="promo">Promo</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>
                        </div>
                    <div class="form-group row promoData" style="display:none">
                            <label class="col-sm-2 col-form-label" for="name">Promo<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <select id="select-promo" class="js-example-basic-single col-sm-12" name="kd_promo" placeholder="id_usr_role" type="text">
                                    <option value="">Pilih Promo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row voucherData" style="display:none">
                            <label class="col-sm-2 col-form-label" for="name">Voucher<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <select id="select-voucher" class="js-example-basic-single col-sm-12" name="kd_voucher" placeholder="id_usr_role" type="text">
                                    <option value="">Pilih Voucher</option>
                                </select>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Runing Text<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <textarea name="content" id="isi" cols="30" rows="10"></textarea>
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

<div class="modal fade" id="modal-container-detail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail About</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body klikme">

            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<!-- <script src="//cdn.ckeditor.com/ckeditor5/12.4.0/full/ckeditor.js"></script> -->
<script src="/ckfinder/ckfinder.js"></script>
<script>
    $(function() {
        // APPLY THE EDITOR TO THE TEXTAREA
        // $(".wysiwyg").ckeditor();

        // FIXING THE MODAL/CKEDITOR ISSUE
        $(".modal").removeAttr("tabindex");
    });
</script>
<!-- <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> -->
<script>
    var isEdit = false;
$('document').ready(function () {
    // ClassicEditor
    // .create( document.querySelector( '#isi' ), {
    //     ckfinder: {
    //         uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
    //     },
    //     toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
    // } )
    // .catch( function( error ) {
    //     console.error( error );
    // } );
    $("#select-jenis").change(()=>{
        if ($("#select-jenis").val() == 'voucher') {
            $(".promoData").hide()
            $(".voucherData").show()
        } else if ($("#select-jenis").val() == 'promo'){
            $(".promoData").show()
            $(".voucherData").hide()
        }else{
            $(".promoData").hide()
            $(".voucherData").hide()
        }
    })

    CKEDITOR.replace("isi", {
        filebrowserUploadMethod: "form",
        filebrowserUploadUrl: "import/gambar",
        extraPlugins: "justify",
        embed_provider:
            "//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}",
        allowedContent: true,

    });
    var modalLabel = $('#myModalLabelabout');
    var form = $('#form-about');
    var no = 0;

    $('#select-voucher').select2();

    $('#select-promo').select2();

    $('#select-jenis').select2();
    //Form Components
    var table = $('#table-about');
    table.DataTable({
        "aaSorting": [],
        "initComplete": function (settings, json) { },
        "retrieve": true,
        "processing": true,
        'ajax': {
            "type": "GET",
            "url": base_url + 'RuningText/get',
            "data": function (d) {
                no = 0;
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
                return full.runingText == null ? '-' : full.runingText;
            }
        },
        {
            render: function (data, type, full, meta) {
                return full.status == null ? '-' : full.status == 1 ? `<button class="btn btn-primary" onclick="activated('${full.id}',${full.status})">Aktif</button> ` : `<button class="btn btn-danger" onclick="activated('${full.id}',${full.status})">Tidak Aktif</button> `;
            }
        }, {
            render: function (data, type, full, meta) {
                return `<div class="text-center">
                    <a href="#" class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                        <i class="icofont icofont-ui-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" onclick="edit_about(${full.id})" ><i class="icofont icofont-ui-edit"></i>Edit</a>
                        <a class="dropdown-item" href="#" onclick="delete_about(${full.id}, 'runingText')" ><i class="icofont icofont-ui-delete"></i>Delete</a>
                    <div role="separator" class="dropdown-divider"></div>
                </div>
            </div>`
            }
        }
        ]
    });
    form.submit(function (e) {
        var url_form = (isEdit == false) ? base_url + '/runingText/add' : base_url + '/runingText/edit'
        e.preventDefault();
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(this);
            formdata.append("content", CKEDITOR.instances.isi.getData());
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
                // console.log(data)
                var caption = (isEdit == false) ? 'input' : 'edit';
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
                            $('#table-about').DataTable().ajax.reload();
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
                            $('#table-about').DataTable().ajax.reload();
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

            modalLabel.html('Add New Runing Text');
        } else {
            $('#password').removeAttr('required="required"');
            modalLabel.html('Edit Runing Text');
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

function edit_about(id) {
    getMasterData(service_url + 'runingText/' + id, '', function (data) {
        isEdit = true;
        $("#id").val(data.id);
        CKEDITOR.instances.isi.setData(data.runingText);
        $('#modal-btn').click();
    });

}

function delete_about(idData, $params) {
    delete_datamaster(idData, $params, function (data) {
        $('#table-about').DataTable().ajax.reload();
    })
}

function detail(params) {
    getMasterData(service_url + 'about/' + params, '', function (data) {
        $(".klikme").html(data.content)
    });
}

function activated(id, status) {
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
                url: service_url + "runingText/update/"+id,
                type: 'put',
                dataType: 'json',
                data: {
                    status: status ? 0 : 1
                },
                success: function (data, text) {

                    if (data.success) {
                        swal(
                            'Changed!',
                            'Successful change data!',
                            'success'
                        );
                        $('#table-about').DataTable().ajax.reload();
                    }
                },
                error: function (stat, res, err) {
                    
                }
            })
        })
}
</script>
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
<!-- <script>
tinymce.init({
    selector: '#isi'
});
</script> -->