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
                                                    <th>Tipe Bonus</th>
                                                    <th>Produk yang didapat</th>
                                                    <th>Detail Produk</th>
                                                    <th>Cek Produk</th>
                                                    
                                                    <th>Jumlah/Nominal</th>
                                                    <th>Dimulai</th>
                                                    <th>Expired</th>
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
    // getSelectOptionProduct()
    getSelectOptionProduct()
    var formRole = $('#promo-select');
    formRole.select2();
    $('#jenis-select').select2();
    $('#kode_product').select2();
    $('#kode_product2').select2();
    $('#kode_product3').select2();
    $('#kode_product4').select2();
    $('#status-select').select2();
    
    
    $("#jumlah").remove();
    $("#nominal").remove();
    $("#productCek").remove();
    $('#kode_product').change(function () {
        let DataBonus = '';
        $('#kode_product').val().forEach((p, number)=>{
            
            DataBonus+= `
            <div class="form-group row">
            <label class="col-sm-2 col-form-label kurangigambar${number}" for="name">${number == 0 ? `Produk Detail<span class="required" style="color:#ff3333;">*</span>` : ''}
                        </label>
                        <div class="col-sm-5 kurangigambar${number}" >
                            <select id="kode_productsa${number}" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" disabled>
                                <option value="">Pilih Produk</option>
                            </select>
                        </div>
                        <div class="col-sm-5 kurangigambar${number}">
                            <select id="kode_productsb${number}" class="js-example-basic-single col-sm-12" name="detail[]" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Produk</option>
                            </select>
                        </div>
                        </div>`;
                        
        })
        $("#tambahDataBonus").html(DataBonus)
        for (let index = 0; index < $('#kode_product').val().length; index++) {
            $(`#kode_productsa`+index).select2();
            $(`#kode_productsb`+index).select2();
            getSelectOptionProductData($('#kode_product').val()[index],`kode_productsa`+index)
            getSelectOptionMasterProducts($('#kode_product').val()[index], `kode_productsb`+index)
        }
        })
        
        
        
    
    $('#promo-select').change(function () {
        if ($('#promo-select').val() == 1) {
            $("#jumlah").remove();
    $("#nominal").remove();
            $("#masuk").html(`<div class="form-group row" id="productCek">
                        <label class="col-sm-2 col-form-label" for="name">Produk Yang harus Sesuai<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="kode_product4" class="js-example-basic-multiple col-sm-12" name="productCek" placeholder="id_usr_role" type="text" required="required" multiple="multiple">
                                <option value="">Pilih Produk Detail</option>
                            </select>
                        </div>
                    </div>`)
                    $('#kode_product4').select2();
                    getSelectOptionProduct4()
                    // if (isEdit) {
                    //     getSelectOptionProduct()
                        
                    // }else{
                    // getSelectOptionProduct()

                    // }
                    
        } else if($('#promo-select').val() == 2){
            $("#productCek").remove();
    $("#nominal").remove();
            $("#masuk").html(`<div id="jumlah">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="name">Jumlah Item Transaksi<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="promo" class="form-control" name="jumlah" placeholder="Promo (%)" type="number" min="0">
                            </div>
                        </div>
                    </div>`)
        }else if($('#promo-select').val() == 3){
            $("#productCek").remove();
    $("#jumlah").remove();
            $("#masuk").html(`  <div class="form-group row" id="nominal">
                            <label class="col-sm-2 col-form-label" for="name">Nominal Transaksi<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="hargas" class="form-control" name="jumlah" placeholder="Nominal Harga" type="number" min="0">
                            </div>
                        </div>`)
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
            "url": base_url+'bonus/get',
            "data": function (d) {
                no = 0;
            },
            "dataSrc": function (dats) {
                // console.log(dats)
                return dats
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
                    return full.title == null ? '-' : full.title;
                }
            },
            {
                render: function (data, type, full, meta) {
                    return full.tipeData == null ? '-' : full.tipeData;
                }
            },
            {
                render: function (data, type, full, meta) {
                    let jenis = '';
                    
                    if (full.productDapat) {
                        full.productDapat.forEach(p=>{
                            jenis += p.nama_artikel
                            jenis += ', '
                        })
                        
                    }
                    return full.productDapat  ? jenis : '-';
                }
            },
            {
                render: function (data, type, full, meta) {
                    let jenis = '';
                    if (full.productDapatDetail) {
                        
                        full.productDapatDetail.forEach(p=>{
                            jenis += p.nama_artikel+'-'+p.nama_warna+'-'+p.ukuran
                            jenis += ', '
                        })
                        
                    }
                    return full.productDapatDetail  ? jenis:'-' ;
                }
            },
            {
                render: function (data, type, full, meta) {
                    let jenis = '';
                    
                    if (full.Cekproduct) {
                        full.Cekproduct.forEach(p=>{
                            jenis += p.nama_artikel
                            jenis += ','
                        })
                        
                    }
                    return full.Cekproduct  ?jenis: '-' ;
                }
            },  {
                render: function (data, type, full, meta) {
                    return full.jumlah == null ? '-' : full.jumlah;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.masa_awal == null ? '-' : full.masa_awal;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.masa_akhir == null ? '-' : full.masa_akhir;
                }
            }, {
                render: function (data, type, full, meta) {
                    return full.status == null ? '-' : full.status == 1 ? `<button class="btn btn-primary" onclick="activated(${full.id_bonus}, ${full.status})">Aktif</button> ` : `<button class="btn btn-danger" onclick="activated(${full.id_bonus}, ${full.status})">Tidak Aktif</button> `;
                }
            }, {
                render: function (data, type, full, meta) {
                    return `
                            <div class="text-center">
                                    <a href="#" class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">\
                                        <i class="icofont icofont-ui-settings"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" onclick="edit_promo(${full.id_bonus})" ><i class="icofont icofont-ui-edit"></i>Edit</a>
                                        <a class="dropdown-item" href="#" onclick="delete_promo(${full.id_bonus}, 'bonus')" ><i class="icofont icofont-ui-delete"></i>Delete</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                </div>
                            </div>`;
                }
            }
        ]
    });

    form.submit(function (e) {
        var url_form = (isEdit == false) ? base_url + 'bonus/add' : base_url + 'bonus/edit'
        e.preventDefault();
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(this);
            formdata.append('product', $('#kode_product').val());
            formdata.append('productCek', $('#kode_product4').val());
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
            $("#myModalLabelPromo").html('Add New Bonus');
        } else {
            $('#password').removeAttr('required="required"');
            modalLabel.html('Edit Bonus');
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
    getMasterData('https://testbuild.urbanco.co.id/v1/' + 'bonus/' + id, '', function (data) {
        // console.log(data)
        isEdit = true;
        $("#id").val(data.id_bonus);
        $("#title").val(data.title);
        $("#startDate").val(data.masa_awal);
        
        $("#promo-select").val(data.tipe)
        $("#promo-select").trigger('change');
        $("#lastDate").val(data.masa_akhir);
        $('#status-select').val(data.status);
        $('#status-select').trigger('change');
        // console.log(data.product.split(";"))
        $("#kode_product").val(data.product.split(";"));
        $('#kode_product').trigger('change');
$("#hargas").val(data.jumlah)
        data.product.split(";").forEach((e, index)=>{
           
            getSelectOptionMasterProducts(e,`kode_productsb${index}`, data.productDetail.split(";")[index])
        })
        
        if (data.tipe == 1) {
            getSelectOptionProduct4(data.productCek)
        }
        // $('#promo-select').trigger('change');
        // $('#jenis-select').val(data.jenis);
        // $('#jenis-select').trigger('change');
        // if (data.jenis == 1) {
        //     $("#persen").show()
        //     $("#nominal").hide();
        //     $("#promo").val(data.promo);
        // } else {
        //     $("#nominal").show()
        //     $("#persen").hide();
        //     $("#hargas").val(data.harga);
        // }
        $('#gambar').removeAttr('required');
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
                            <label class="col-sm-2 col-form-label" for="name">Title<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="title" class="form-control" name="title" placeholder="Title" type="text">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Tipe Bonus<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="promo-select" class="js-example-basic-single col-sm-12" name="tipe" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Tipe Bonus</option>
                                <option value=1>Produk Gratis untuk Produk Pilihan</option>
                                <option value=2>Produk Gratis dengan Ketentuan Jumlah Produk</option>
                                <option value=3>Produk Gratis dengan Ketentuan Nominal Transaksi</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="productdipilih">
                        <label class="col-sm-2 col-form-label" for="name">Produk Yang didapatkan<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="kode_product" class="js-example-basic-multiple col-sm-12" name="product" placeholder="id_usr_role" type="text" required="required" multiple="multiple">
                                <option value="">Pilih Produk</option>
                            </select>
                        </div>
                    </div>
                    
                    <div id="tambahDataBonus">
                    </div>
                    <div id="masuk">
                    </div>
                    <div class="form-group row" id="productCek">
                        <label class="col-sm-2 col-form-label" for="name">Produk Yang harus Sesuai<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="kode_product4" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Produk Detail</option>
                            </select>
                        </div>
                    </div>
                    
                        <div class="form-group row" id="jumlah">
                            <label class="col-sm-2 col-form-label" for="name">Promo (%)<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="promo" class="form-control" name="promo" placeholder="Promo (%)" type="number" min="0">
                            </div>
                        </div>
                    
                    
                        <div class="form-group row" id="nominal">
                            <label class="col-sm-2 col-form-label" for="name">Nominal Harga/Promo<span class="required" style="color:#ff3333;">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input id="hargas" class="form-control" name="harga" placeholder="Nominal Harga" type="number" min="0">
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
                        <label class="col-sm-2 col-form-label" for="name">Bonus Dimulai<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="startDate" class="form-control" name="masa_awal" placeholder="Bonus Dimulai" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Bonus Berakhir<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="lastDate" class="form-control" name="masa_akhir" placeholder="Bonus Diakhiri" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Status<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="status-select" class="js-example-basic-single col-sm-12" name="status" placeholder="id_usr_role" type="text" required="required">
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