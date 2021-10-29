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
                                                    <th>Title</th>
                                                    <th>URL</th>
                                                    <th>Gambar Website</th>
                                                    <th>Gambar Mobile</th>
                                                    <th>Dimulai</th>
                                                    <th>Expired</th>
                                                    <th>Durasi (detik)</th>
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
<link rel="stylesheet" href="<?= base_url()?>assets/datepicker/index.css" />
<script src="<?= base_url()?>assets/datepicker/index.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" ></script>
<script>
var isEdit = false
    $('document').ready(function () {
    var modalLabel = $('#myModalLabelPromo');
    var form = $('#form-promo');
    $('#startDate').datetimepicker({
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
    // getSelectOptionProduct()
    getSelectOptionProduct()
    var formRole = $('#promo-select');
    formRole.select2();
    var table = $('#table-promo');
    table.DataTable({
        "aaSorting": [],
        "initComplete": function (settings, json) {

        },
        "retrieve": true,
        "processing": true,
        'ajax': {
            "type": "GET",
            "url": base_url+'modal/get',
            "data": function (d) {
                no = 0;
            },
            "dataSrc": {}
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
                    return full.judul == null ? '-' : full.judul;
                }
            },
            {
                render: function (data, type, full, meta) {
                    return full.url == null ? '-' : full.url;
                }
            },
            {
                render: function (data, type, full, meta) {
                  
                    // return full.gambar_web == null ? '-' : full.gambar_web;
                    return full.gambar_web == null ? '-' : `<a href="${path_photo + '/uploads/user_photo/' + full.gambar_web}" data-lightbox="roadtrip"><img src="${path_photo + '/uploads/user_photo/' + full.gambar_web
                        }" style="max-width: 237px;" class="img-fluid m-b-10" /></a>`;
                }
            },
             {
                render: function (data, type, full, meta) {
                    // return full.gambar_mobile == null ? '-' : full.gambar_mobile;
                    return full.gambar_mobile == null ? '-' : `<a href="${path_photo + '/uploads/user_photo/' + full.gambar_mobile}" data-lightbox="roadtrip"><img src="${path_photo + '/uploads/user_photo/' + full.gambar_mobile
                        }" style="max-width: 237px;" class="img-fluid m-b-10" /></a>`;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.masa_awal == null ? '-' : moment(full.masa_awal).format("YYYY-MM-DD HH:mm:ss");
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.masa_akhir == null ? '-' : moment(full.masa_akhir).format("YYYY-MM-DD HH:mm:ss");
                }
            },{
                render: function (data, type, full, meta) {
                    return full.time == null ? '-' : full.time;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.status == null ? '-' : full.status == 1 ? `<button class="btn btn-primary" onclick="activated(${full.id_modal}, ${full.status})">Aktif</button> ` : `<button class="btn btn-danger" onclick="activated(${full.id_modal}, ${full.status})">Tidak Aktif</button> `;
                }
            }, {
                render: function (data, type, full, meta) {
                    return `
                            <div class="text-center">
                                    <a href="#" class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">\
                                        <i class="icofont icofont-ui-settings"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" onclick="edit_promo(${full.id_modal})" ><i class="icofont icofont-ui-edit"></i>Edit</a>
                                        <a class="dropdown-item" href="#" onclick="delete_promo(${full.id_modal}, 'modal')" ><i class="icofont icofont-ui-delete"></i>Delete</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                </div>
                            </div>`;
                }
            }
        ]
    });

    form.submit(function (e) {
        var url_form = (isEdit == false) ? base_url + 'modal/add' : base_url + 'modal/edit'
        e.preventDefault();
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(this);
            formdata.append('time', 3);
            formdata.append('status', 1);
            // formdata.append('productCek', $('#kode_product4').val());
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
            $("#myModalLabelPromo").html('Add New Pop up');
        } else {
            $('#password').removeAttr('required="required"');
            modalLabel.html('Edit Pop up');
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
function getSelectOptionProduct() {
    getMasterData(service_url + `product`, '', function (data) {
        var promo = `<option value="">Pilih Produk</option>`;
        data.forEach(res => {
            promo += `<option value="${res.kode_product}">${res.nama_artikel}</option>`;
        });
        $("#kode_product").html(promo);
        // $("#kode_product2").html(promo);
        // $("#kode_product4").html(promo);
    });
}
function getSelectOptionProduct2() {
    getMasterData(service_url + `product`, '', function (data) {
        var promo = `<option value="">Pilih Produk</option>`;
        data.forEach(res => {
            promo += `<option value="${res.kode_product}">${res.nama_artikel}</option>`;
        });
        // $("#kode_product").html(promo);
        $("#kode_product2").html(promo);
        // $("#kode_product4").html(promo);
    });
}
function getSelectOptionProduct4(datanya=null) {
    getMasterData(service_url + `product`, '', function (data) {
        var promo = `<option value="">Pilih Produk</option>`;
        data.forEach(res => {
            if(datanya){
                datanya.split(";").forEach(e=>{
                promo += `<option value="${res.kode_product}" ${res.kode_product == e ? 'selected' : ''}>${res.nama_artikel}</option>`;
            })
            }else{
                promo += `<option value="${res.kode_product}" >${res.nama_artikel}</option>`;
            }
           
         
        });
        // $("#kode_product").html(promo);
        // $("#kode_product2").html(promo);
        $("#kode_product4").html(promo);
    });
}
function delete_promo(idData, $params) {
    delete_datamaster(idData, $params, function (data) {
        $('#table-promo').DataTable().ajax.reload();
    })
}
function getSelectOptionProductData(datanya, objek) {
    getMasterData(service_url + `product`, '', function (data) {
        var promo = `<option value="">Pilih Produk</option>`;
        data.forEach(res => {
            promo += `<option value="${res.kode_product}" ${res.kode_product == datanya ? 'selected' : ''}>${res.nama_artikel}</option>`;
        });
        $("#"+objek).html(promo);
    });
}

function getSelectOptionMasterProducts(datanya, objek, id=null) {
    getMasterData(service_url + `master_product/find`, {
        product_id :datanya
    }, function (data) {
        
        var promo = `<option value="">Pilih Detail Produk</option>`;
        console.log(id)
        data.forEach(res => {
            
            console.log(res.data.kodeDetailProduct == id ? 'ada' : '')
            if (id) {
                promo += `<option value="${res.data.kodeDetailProduct}" ${id == res.data.kodeDetailProduct ? 'selected': ''}>${res.data.product.nama_artikel}-${res.data.ukuran.ukuran}-${res.data.warna.nama_warna}</option>`;
            }else{
                promo += `<option value="${res.data.kodeDetailProduct}">${res.data.product.nama_artikel}-${res.data.ukuran.ukuran}-${res.data.warna.nama_warna}</option>`;
            }
            
        });
        $("#"+objek).html(promo);
    });
}
function edit_promo(id) {
    getMasterData(service_url + 'modal/' + id, '', function (data) {
        // console.log(data)
        isEdit = true;
        $("#id").val(data.id_modal);
        
        $("#deskripsi").val(data.deskripsi);
        $("#url").val(data.url);
        $("#startDate").val(moment(data.masa_awal).format("YYYY-MM-DD HH:mm:ss"));
        $("#lastDate").val(moment(data.masa_akhir).format("YYYY-MM-DD HH:mm:ss"));
        $("#time").val(data.time)
        
     
        $('#gambar_web').removeAttr('required');
        $('#gambar_mobile').removeAttr('required');
        

        $('#modal-btn-promo').click();
    });

}
var number = 1;

function tambah() {
        number++;
        $("#tambahDataBonus").append(`
    
    <label class="col-sm-2 col-form-label kurangigambar${number}" for="name">
                        </label>
                        <div class="col-sm-4 kurangigambar${number}" >
                            <select id="kode_product${number}" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Produk</option>
                            </select>
                        </div>
                        <div class="col-sm-4 kurangigambar${number}">
                            <select id="kode_product${number}" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Produk</option>
                            </select>
                        </div>
                        <div class="col-sm-2 kurangigambar${number}">
                        <a href="#" onclick="kurangi(${number})" class="card-block icon-btn btn btn-danger">
                <i class="icofont icofont-minus"></i>
            </a>
                        </div>
    
    
    
    
    `);
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
                url: base_url + "bonus/activated",
                type: 'post',
                dataType: 'json',
                data: {
                    id_bonus: id_promo,
                    status: status
                },
                success: function (data, text) {
                    // location.reload();

                    if (data.success) {
                        swal(
                            'Changed!',
                            'Successful change data!',
                            'success'
                        );
                        $('#table-promo').DataTable().ajax.reload();
                    }

                },
                error: function (stat, res, err) {
                    alert(err);
                }
            })
        })
}
function kurangi(id) {
    // alert(id)
    number = number - 1;
    $(".kurangigambar" + id).remove();
}
</script>
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
                    </div>
                  
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Deskripsi<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi" type="text">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Url<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="url" class="form-control" name="url" placeholder="URL" type="text">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Durasi<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="time" class="form-control" name="time" placeholder="Durasi" type="number">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Dimulai<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="startDate" class="form-control" name="startDate" placeholder="Pop Up Dimulai" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Expired<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="lastDate" class="form-control" name="lastDate" placeholder="Pop Up Diakhiri" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Gambar Website<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="gambar_web" class="form-control" name="gambar_web" placeholder="Title" type="file">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Gambar Mobile<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="gambar_mobile" class="form-control" name="gambar_mobile" placeholder="Title" type="file">
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