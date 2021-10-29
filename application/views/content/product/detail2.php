<style>
    .dataTables_filter {
        margin-right: 10px;
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
                                    <h5><?= $desc ?></h5>
                                    <button data-toggle="modal" data-target="#modal-container-master_product" id="modal-btn" style="margin-left:5px;display: none;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                        <i class="icofont icofont-ui-add"></i>
                                    </button>

                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <button data-toggle="modal" data-target="#modal-container-gambar" id="modal-btn-gambar" style="float:right;height: 36px;margin-right:10px" title="Add/Edit Color" class="btn btn-warning">
                                            Upload Gambar
                                        </button>
                                        <button data-toggle="modal" data-target="#modal-container-stokBarcode" id="modal-btn-stokBarcode" style="float:right;height: 36px;margin-right:10px" title="Add/Edit Color" class="btn btn-primary">
                                            Update Stok & Barcode
                                        </button>
                                        <table id="table-master_product" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Artikel</th>
                                                    <th>Warna</th>
                                                    <th>Ukuran&Stok</th>
                                                    <th>Thumbnail</th>
                                                    <th>Gambar</th>
                                                    <th>Berat</th>
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
<!-- insert / edit data -->
<div class="modal fade" id="modal-container-master_product" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelmaster_product"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-master_product">
                    <div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="id_warna" id="warna_id">
                        <input type="text" class="kodePro" name="kodeDetailProduct" id="kodeDetailProduct" hidden>
                    </div>
                    <div class="form-group row artikles">
                        <label class="col-sm-2 col-form-label" for="name">Nama Artikel<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-artikel" disabled class="js-example-basic-single col-sm-12" name="product_id" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Artikel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row thumbnailData">
                        <label class="col-sm-2 col-form-label" for="name">Gambar Thumbnail<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="thumbnail" class="form-control" name="thumbnail" placeholder="Stok Produk" type="file" required="required">
                        </div>
                    </div>
                    <div class="form-group row manage-image">
                        <label class="col-sm-2 col-form-label" for="name">Gambar<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10 tambah-gambar">
                            <div class="row" data-gambar="1">
                                <div class="col-md-10">
                                    <input id="gambar1" class="form-control gambar" name="images1" placeholder="CO: 90000" type="file" required="required">

                                </div>
                                <div class="col-md-2">
                                    <a href="#" onclick="tambahgambar(1)" class="card-block icon-btn btn btn-inverse btn-outline-inverse">
                                        <i class="icofont icofont-ui-add"></i>
                                    </a>
                                </div>
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
<!-- import data master product -->
<div class="modal fade" id="modal-container-import" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Master Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-import">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Import Excell
                        </label>
                        <div class="col-sm-10">
                            <input id="data-excell" class="form-control" name="excell" placeholder="Nama Artikel" type="file" required="required">
                        </div>
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
<!-- upload gambar dalam bentuk zip -->
<div class="modal fade" id="modal-container-gambar" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Gambar Produk (Wajib dalam bentuk .zip)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-gambar">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Upload kumpulan Gambar (.zip)
                        </label>
                        <div class="col-sm-10">
                            <input id="data-excell" class="form-control" name="zipfile" placeholder="Nama Artikel" type="file" required="required">
                        </div>
                    </div>

                    <button hidden type="submit" id="sendSubmit3"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel3" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" id="submit3" class="btn btn-primary waves-effect waves-light ">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-container-stokBarcode" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Stok & Barcode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body klikme">
            <form id="form-stokBarcode">
            <table id="table-stokBarcode" class="table table-striped table-bordered nowrap" style="width:100% !important">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Artikel</th>
                                                    <th>Warna</th>
                                                    <th style="width: 496px;">Ukuran&Stok</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <button hidden type="submit" id="sendSubmit5"></button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel5" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" id="submit5" class="btn btn-primary waves-effect waves-light ">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> -->
<script>
    var products_id = "<?= $this->uri->segment('4') ?>";
    var subkategori_id = "<?= $this->uri->segment('3') ?>";
</script>

<!-- <script src="<?= base_url() ?>assets/js/detail.js"></script> -->

<script>
    var isEdit = false;
var simpanData = { artikel: '', warna: '', ukuran: '' };
$('document').ready(function () {
    var modalLabel = $('#myModalLabelmaster_product');

    var form = $('#form-master_product');

    getSelectOptionUkuran();

    getSelectOptionWarna();

    getSelectOptionArtikel();
    var no = 0;
    var nos = 0;

    $('#select-warna').select2();

    $('#select-ukuran').select2();
    $('#select-ukuran').change(() => {
        getMasterData(service_url + 'ukuran/' + $('#select-ukuran').val(), '', function (data) {
            simpanData.ukuran = data.ukuran
            $(".kodePro").val(products_id + "-" + (simpanData.warna == undefined ? 0 : simpanData.warna) + "-" + (simpanData.ukuran == undefined ? 0 : simpanData.ukuran));
        });
    })
    $('#select-warna').change(() => {
        getMasterData(service_url + 'warna/' + $('#select-warna').val(), '', function (data) {
            simpanData.warna = data.nama_warna
            $(".kodePro").val(products_id + "-" + (simpanData.warna == undefined ? 0 : simpanData.warna) + "-" + (simpanData.ukuran == undefined ? 0 : simpanData.ukuran));
        });
    })
    $('#select-artikel').select2();

    $('#master_product-select').select2();
    //Form Components
    // table-stokBarcode
    var stokBarcode = $('#table-stokBarcode');
    var table = $('#table-master_product');
    table.DataTable({
        "aaSorting": [],
        "initComplete": function (settings, json) {

        },
        "retrieve": true,
        "processing": true,
        'ajax': {
            "type": "GET",
            "url": base_url + 'product/get/' + products_id,
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
                return full.nama_artikel == null ? '-' : full.nama_artikel;
            }
        },
        {
            render: function (data, type, full, meta) {
                return full.nama_warna == null ? '-' : full.nama_warna;
            }
        }, {
            render: function (data, type, full, meta) {
                let tabless = `<table style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Ukuran</th>
                                        <th>Stok</th>
                                        <th>Barcode</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>`
                full.ukuranStok.forEach(rest => {
                    tabless += `<tr>
                                    <td>${rest.ukuran}</td>
                                    <td id="${rest.kodeDetailProduct.replace(" ", "-")}-stok">${rest.stok ? rest.stok : '-'} <a href="#" style="float:right" onclick="edit_stok_product('${rest.kodeDetailProduct}',${full.warna_id}, ${rest.ukuran_id})" ><i class="icofont icofont-ui-edit"></i></a></td>
                                    <td id="${rest.kodeDetailProduct.replace(" ", "-")}-barcode">${rest.barcode ? rest.barcode : '-'} <a href="#" style="float:right"  onclick="edit_barcode_product('${rest.kodeDetailProduct}',${full.warna_id}, ${rest.ukuran_id})" ><i class="icofont icofont-ui-edit"></i></a></td>
                                    
                                </tr>`;
                })
                tabless += `</tbody>
                            </table>`;

                return tabless;
            }
        }
            ,
        {
            render: function (data, type, full, meta) {
                return full.thumbnail == null ? `<a class="btn btn-primary" onclick="add_master_product('${full.product_id}', ${full.warna_id})" href="#">Tambah</a>` : `<a href="${path_photo + 'uploads/user_photo/' + full.thumbnail}" data-lightbox="roadtrip"><img src="${path_photo + 'uploads/user_photo/' + full.thumbnail}" style="max-width: 237px;" class="img-fluid m-b-10" ></a>`;
            }
        },
        {
            render: function (data, type, full, meta) {
                return full.image[0] == null ? `<a class="btn btn-primary" onclick="edit_master_product('${full.kodeDetailProduct}', ${full.warna_id})" href="#">Tambah</a>` : `<a class="btn btn-success" href="${base_url + 'product/detail/' + subkategori_id + '/' + products_id + '/' + full.kodeDetailProduct}">Lihat Gambar</a>`;
            }
        },
        {
            render: function (data, type, full, meta) {
                return full.weight == null ? '-' : full.weight + " Gram";
            }
        },
        // {
        //     render: function (data, type, full, meta) {
        //         return full.barcode == null ? '-' : full.barcode;
        //     }
        // },
        {
            render: function (data, type, full, meta) {
                return `
                            <div class="text-center">
                                        <a href="#" class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                                            <i class="icofont icofont-ui-settings"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" onclick="edit_master_product('${full.kodeDetailProduct}', ${full.warna_id}, 'thumbnail')" ><i class="icofont icofont-ui-edit"></i>Edit</a>
                                            <a class="dropdown-item" href="#" onclick="delete_master_product('${full.kodeDetailProduct}', 'master_product')" ><i class="icofont icofont-ui-delete"></i>Delete</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                    </div>
                                </div> `;
            }
        }
        ]
    });
    stokBarcode.DataTable({
        
        "ordering": false,
        "initComplete": function (settings, json) {

        },
        "retrieve": true,
        "processing": true,
        'ajax': {
            "type": "GET",
            "url": base_url + 'product/get/' + products_id,
            "data": function (d) {
                nos = 0;
                nud = 0;
            },
            "dataSrc": ""
        },
        'columns': [{
            render: function (data, type, full, meta) {
                nos += 1;
                return nos;
            }
        },
        {
            render: function (data, type, full, meta) {
                return full.nama_artikel == null ? '-' : full.nama_artikel;
            }
        },
        {
            render: function (data, type, full, meta) {
                return full.nama_warna == null ? '-' : full.nama_warna;
            }
        }, {
            render: function (data, type, full, meta) {
                
                let tabless = `
                <input type="hidden" name="kode" id="kode" value="${full.kodeDetailProduct}">
                <input type="hidden" name="jumlah" id="jumlah${nos}" value="${meta.col}">
                <table style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Ukuran</th>
                                        <th>Stok</th>
                                        <th>Barcode</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" name="jumlah" id="jumlahstok${nos}" value="${full.ukuranStok.length}">
                                `
                
                full.ukuranStok.forEach(rest => {
                    nud++;
                    tabless += `
                    <input type="hidden"  name="kodeDetailProduct[${nud}]" value="${rest.kodeDetailProduct}"/>
                    <tr>
                                    <td>${rest.ukuran}</td>
                                    <td>
                                    <input class="form-control" type="number" min="0" style="width: 90%;"  name="stokProduct[${nud}]" value="${rest.stok ? rest.stok : 0}"/>
                                    </td>
                                    <td>
                                    <input class="form-control" type="text"  style="width: 90%;" name="barcodeProduct[${nud}]" value="${rest.barcode ? rest.barcode : '-'}"/>
                                    </td>
                                    
                                </tr>`;
                    
                })
                tabless += `</tbody>
                            </table>`;

                return tabless;
            }
        }
      
        ]
    });
    $("#form-stokBarcode").submit(function (e) {
        
        e.preventDefault();
        var formdata = false;
        // if (window.FormData) formdata = new FormData(this);
        
        
        let kumpulanKode = [];
        let kumpulanStok = [];
        let kumpulanBarcode = [];
        let mappingData = [];
        $('input[name^="kodeDetailProduct"]').each(function() {
            if ($(this).val()) {
                kumpulanKode.push($(this).val())
            } 
        });
        $('input[name^="stokProduct"]').each(function() {
            if ($(this).val()) {
                kumpulanStok.push($(this).val()) 
            } 
        });
        $('input[name^="barcodeProduct"]').each(function() {
            if ($(this).val()) {
                kumpulanBarcode.push($(this).val()) 
            } 
        });
        kumpulanKode.forEach((data,no)=>{
            mappingData.push({
                kode: data,
                stok: kumpulanStok[no],
                barcode: kumpulanBarcode[no],
            })
        })
        var mappingDataUpload = JSON.stringify(mappingData);
        var url_form = base_url + '/product/editBarcodeWarna'
        if (window.FormData) {
            formdata = new FormData(this);
            formdata.append('dataProduct', mappingDataUpload);
            // formdata.append('ukuran_id', $('#select-ukuran').val());
            // formdata.append("deskripsi", CKEDITOR.instances.isi.getData());
        }
        // console.log(JSON.stringify(mappingData))
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
                $('.close').click()
                var caption = (isEdit == false) ? 'input' : 'edit';
                if (data.success) {
                    $('#cancel5').click();
                    swal({
                        title: 'Saved!',
                        text: 'Successful ' + caption + ' data!',
                        type: 'success',
                        closeOnConfirm: true
                    },
                        function () {
                            $('#table-master_product').DataTable().ajax.reload();
                        }
                    );
                } else {
                    $('#cancel5').click();
                    swal({
                        title: 'Failed!',
                        text: 'Failed ' + caption + ' data!',
                        type: 'error',
                        closeOnConfirm: true
                    },
                        function () {
                            $('#table-master_product').DataTable().ajax.reload();
                        }
                    );
                }
                isEdit = false;
            },
            error: function (stat, res, err) {
                
                isEdit = false;
            }
        });
        
    })
    form.submit(function (e) {
        var url_form = base_url + '/product/edit'
        e.preventDefault();
        var formdata = false;
        if (window.FormData) formdata = new FormData(this);

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
                            $('#table-master_product').DataTable().ajax.reload();
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
                            $('#table-master_product').DataTable().ajax.reload();
                        }
                    );
                }
                isEdit = false;
            },
            error: function (stat, res, err) {
                
                isEdit = false;
            }
        });
    });
    $('#form-import').submit(function (e) {
        e.preventDefault();
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(this);
        }
        $.ajax({
            url: base_url + '/export/insertdatamaster',
            type: 'post',
            data: formdata ? formdata : form.serialize(),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, text) {
                if (data.success) {
                    $('#cancel2').click();
                    swal({
                        title: 'Saved!',
                        text: 'Successful import data!',
                        type: 'success',
                        closeOnConfirm: true
                    },
                        function () {
                            $('#table-master_product').DataTable().ajax.reload();
                        }
                    );

                } else {
                    $('#cancel').click();
                    swal({
                        title: 'Failed!',
                        text: 'Failed import data!',
                        type: 'error',
                        closeOnConfirm: true
                    },
                        function () {
                            // location.reload();
                            $('#table-master_product').DataTable().ajax.reload();
                        }

                    );
                }
                // isEdit = false;
            },
            error: function (stat, res, err) {
                
                isEdit = false;

            }
        });
    })

    $('#form-gambar').submit(function (e) {
        e.preventDefault();
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(this);
        }
        $.ajax({
            url: base_url + '/uploadzip',
            type: 'post',
            data: formdata ? formdata : form.serialize(),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, text) {
                if (data.success) {
                    $('#cancel3').click();
                    swal({
                        title: 'Saved!',
                        text: 'Successful upload data!',
                        type: 'success',
                        closeOnConfirm: true
                    },
                        function () {
                            $('#table-master_product').DataTable().ajax.reload();
                        }
                    );
                } else {
                    $('#cancel').click();
                    swal({
                        title: 'Failed!',
                        text: 'Failed upload data!',
                        type: 'error',
                        closeOnConfirm: true
                    },
                        function () {
                            $('#table-master_product').DataTable().ajax.reload();
                        }

                    );
                }
            },
            error: function (stat, res, err) {
                
                isEdit = false;

            }
        });
    })

    // Modal Section
    $('#modal-btn').click(function () {
        // if (!isEdit) {
        form[0].reset();

        $("#id").val();
        $("#stok").val();
        $("#gambar1").val('');
        $("#thumbnail").val('');

        $(".manage-image").show()
        $('#select-artikel').val();
        $('#select-artikel').trigger('change');
        $('#select-warna').val();
        $('#select-warna').trigger('change');
        // $('#select-subkategori').select2('val', data.subkategori_id);
        $('#select-ukuran').val();
        $('#select-ukuran').trigger('change');

        // modalLabel.html('Add New Master Product');
        // } else {
        //     $('#password').removeAttr('required="required"');
        //     modalLabel.html('Edit Master Product');
        // }
    });

    $('#close_dialog').click(function () {
        isEdit = false;
        $('#password').prop('required', true);
    });

    $('#cancel').click(function () {
        isEdit = false;
        $('#password').prop('required', true);
    });
    $('.close').click(function () {
        isEdit = false;
        $('#password').prop('required', true);
    });

    $('#cancel2').click(function () {
        isEdit = false;
        $('#password').prop('required', true);
    });

    $('#submit').click(function () {
        $('#sendSubmit').click();
    });
    $('#submit2').click(function () {
        $('#sendSubmit2').click();
    });
    $('#submit3').click(function () {
        $('#sendSubmit3').click();
    });
    $('#submit5').click(function () {
        $('#sendSubmit5').click();
    });
    //Modal Section
});
function accept(id,kode, jenis) {
    console.log(jenis)
    formdata = {};
    if (jenis == 'stok') {
        formdata.stok = $("#" + kode + '-' + jenis + 'Value').val()
    }
    if (jenis == 'barcode') {
        formdata.barcode = $("#" + kode + '-' + jenis + 'Value').val()
        console.log("disni masuk ga?")
        $.ajax({
            url: base_url + '/product/generateBarcodeProduct',
            type: 'post',
            data: {
                barcode: $("#" + id + '-' + jenis + 'Value').val()
            },
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, text) {
                console.log(data)
                if (data) {
                 console.log("Masuk")
                 console.log("Keluar")
                }else{
                    console.log("Ga Masuk")
                }
            },
            error: function (stat, res, err) {
                
                isEdit = false;

            }
        });

    }
    getMasterData(service_url + 'master_product/update/' + id,
        formdata,
        function (data) {
            if (data.success) {
                swal({
                    title: 'Saved!',
                    text: 'Successful update ' + jenis + '!',
                    type: 'success',
                    closeOnConfirm: true
                },
                    function () {
                        $('#table-master_product').DataTable().ajax.reload();
                    }
                );
            } else {
                alert('Gagal')
            }
        },
        'PUT')

}
function batal(kode, jenis, value) {
    $('#' + kode + '-' + jenis).html(value + `<a href="#" style="float:right" onclick="edit_stok_product('${kode}')" ><i class="icofont icofont-ui-edit"></i></a>`);
}
function edit_stok_product(kode, warna = null, ukuran = null) {
    getMasterData(service_url + 'master_product/find/', { kodeDetailProduct: kode }, function (data) {
        console.log('#' + kode + '-stok')
        $('#' + kode.replace(" ", "-") + '-stok').html(`
            <div class="row">
                <div class="col-sm-5">
                <input class="form-control" type="number" min="0" style="width:100%" id="${kode.replace(" ", "-")}-stokValue" value="${data[0].data.stok ? data[0].data.stok : 0}"/></div>
                <div class="col-sm-3">
                    <a href="#" onclick="batal('${kode}', 'stok', '${data[0].data.stok ? data[0].data.stok : '-'}')" style="float:right" ><i class="icofont icofont-ui-close"></i></a>
                    
                    <a href="#" onclick="accept('${kode}','${kode.replace(" ", "-")}', 'stok')" style="float:right;margin-right: 10px;" ><i class="icofont icofont-ui-check"></i></a>
                </div>
            </div>
        `)
    });
}
function edit_barcode_product(kode, warna = null, ukuran = null) {
    getMasterData(service_url + 'master_product/find/', { kodeDetailProduct: kode }, function (data) {
        // $('#' + kode + '-barcode').html(`<input class="form-control" value="${data[0].barcode}"/>`)
        $('#' + kode.replace(" ", "-") + '-barcode').html(`
        <div class="row">
            <div class="col-sm-5"><input class="form-control" type="text" min="0" style="width:100%" id="${kode.replace(" ", "-")}-barcodeValue" value="${data[0].data.barcode ? data[0].data.barcode : '-'}"/></div>
            <div class="col-sm-3">
                <a href="#" onclick="batal('${kode}', 'barcode', '${data[0].data.barcode ? data[0].data.barcode : '-'}')" style="float:right" ><i class="icofont icofont-ui-close"></i></a>
                
                <a href="#" onclick="accept('${kode}','${kode.replace(" ", "-")}', 'barcode')" style="float:right;margin-right: 10px;" ><i class="icofont icofont-ui-check"></i></a>
            </div>
        </div>
    `)
    });
}
function getSelectOptionWarna() {
    getMasterData(service_url + 'warna/', '', function (data) {

        var promo = `<option value="">Pilih Warna</option>`;
        data.forEach(res => {

            promo += `<option value="${res.id_warna}">${res.nama_warna}</option>`;
        });
        $("#select-warna").html(promo);
    });

}
function add_master_product(kodeProduct, warna) {

    // alert('data')
    $('#modal-btn').click();
    $('.manage-image').hide()
    $('.artikles').hide()
    $('#gambar1').removeAttr('required');
    $("#myModalLabelmaster_product").html('Tambah Gambar Thumbnail');
    $("#id").val(kodeProduct);
    $("#warna_id").val(warna);
    // $('#form-master_product').html();
}
function getSelectOptionArtikel() {
    getMasterData(service_url + 'product/find?kode_product=' + products_id, '', function (data) {
        var promo = `<option value="">Pilih Artikel</option>`;
        data.forEach(res => {
            promo += `<option value="${res.kode_product}">${res.nama_artikel}</option>`;
        });
        $("#select-artikel").html(promo);
    });

}

function getSelectOptionUkuran() {
    getMasterData(service_url + 'ukuran/', '', function (data) {

        var subkategori = `<option value="">Pilih Ukuran</option>`;
        data.forEach(res => {
            subkategori += `<option value="${res.id_ukuran}">${res.ukuran}</option>`;
        });
        $("#select-ukuran").html(subkategori);
    });

}

function edit_master_product(id, warna_id, jenis = 'image') {
    // alert('a')
    getMasterData(service_url + 'master_product/' + id, '', function (data) {
        isEdit = true;
        $("#id").val(data.product_id);
        $("#warna_id").val(warna_id);
        $('.artikles').hide()
        if (jenis == 'image') {
            $(".thumbnailData").hide();
            $(".manage-image").show();
        } else {
            $(".thumbnailData").show();
            $(".manage-image").hide();
            $('#gambar1').removeAttr('required');
        }

        $("#weight").val(data.weight);
        // $(".manage-image").hide()
        $('#thumbnail').removeAttr('required');
        $('#select-artikel').val(data.product_id);
        $('#select-artikel').trigger('change');
        // modalLabel.html('Tambah Gambar');
        $('#modal-btn').click();

    });

}

function delete_master_product(idData, $params) {
    delete_datamaster(idData, $params, function (data) {
        $('#table-master_product').DataTable().ajax.reload();

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
                url: base_url + "item/activated",
                type: 'post',
                dataType: 'json',
                data: {
                    id_master_product: id_promo,
                    status: status
                },
                success: function (data, text) {

                    if (data.success) {
                        swal(
                            'Changed!',
                            'Successful change data!',
                            'success'
                        );
                        $('#table-master_product').DataTable().ajax.reload();
                    }
                },
                error: function (stat, res, err) {
                    
                }
            })
        })
}
var number = 1;

function tambahgambar() {
    if (number < 6) {
        number++;
        // alert(number++);

        $(".tambah-gambar").append(` <div class="row kurangigambar${number}" style="margin-top:10px">
        <div class="col-md-10">
            <input id="gambar1" class="form-control gambar" name="images${number}" placeholder="CO: 90000" type="file" required="required">
        </div>
        <div class="col-md-2">
            <a href="#" onclick="kurangi(${number})" class="card-block icon-btn btn btn-danger btn-outline-inverse">
                <i class="icofont icofont-minus"></i>
            </a>
        </div>
    </div>`);
    } else {
        alert("6 Gambar Produk yang dapat di Upload")
    }

}

function kurangi(id) {
    // alert(id)
    number = number - 1;
    $(".kurangigambar" + id).remove();
}

function detail(params) {
    // alert(params)
    getMasterData(service_url + 'master_product/' + params, '', function (data) {
        $(".klikme").html(data.detail)
    });
}
</script>