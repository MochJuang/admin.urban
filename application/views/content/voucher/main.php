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
                                                    <th>Kode Voucher</th>
                                                    <th>Nama Voucher</th>
                                                    <th>Voucher (%)</th>
                                                    <th>Min Pembelian</th>
                                                    <th>Tipe</th>
                                                    <!-- <th>Produk</th> -->
                                                    <th>Gambar</th>
                                                    <th>Keterangan</th>
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
                        <!-- <input id="kode" class="form-control" name="kode" value="" placeholder="Kode Voucher" type="hidden"> -->
                    </div>
                    <div class="form-group row" id="showGenerate">
                        <label class="col-sm-2 col-form-label" for="name">Generate Kode<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="generate" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Kode</option>
                                <option value="1">Otomatis</option>
                                <option value="2">Manual</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="kodeGenerate">
                       
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Nama Voucher<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="nama_voucher" class="form-control" name="nama_voucher" placeholder="Nama Voucher" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Gambar<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="gambar" class="form-control" name="image" placeholder="Photo" type="file" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Jenis Potongan<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="jenis" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Jenis Potongan</option>
                                <option value="nominal">Nominal</option>
                                <option value="jumlah">Persen</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="jenis-vouchernya">
                       
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Jenis Pemakaian<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="jenis-pemakaian" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Jenis Pemakaian</option>
                                <option value="1">Claim</option>
                                <option value="2">Auto cut</option>
                                <option value="3">Klick</option>
                            </select>
                        </div>
                    </div>
                    <div id="dataJenisVoucher">

                    </div>
                    <div id="pilihanJenisVoucher">

                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Tipe<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="tipe" class="js-example-basic-single col-sm-12" name="tipe" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Tipe</option>
                                <option value="umum">Umum</option>
                                <option value="khusus">Khusus</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Dimulai<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="startDate" class="form-control" name="masa_awal" placeholder="Voucher Dimulai" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Berakhir<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="lastDate" class="form-control" name="masa_akhir" placeholder="Voucher Diakhiri" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Jumlah Pengguna<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="jumlah_pengguna" class="form-control" name="jumlah_pengguna" placeholder="Jumlah Pengguna" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Jumlah Pemakaian<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="jumlah_penggunaan" class="form-control" name="jumlah_penggunaan" placeholder="Jumlah Pemakaian" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Additional Rule<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10" style='padding-top: 15px;'>
                            
                            <div class="form-check" style="text-align: left;">
                                <input class="form-check-input cekData" type="radio" name="exampleRadios" id="exampleRadios1" value="ya">
                                <label class="form-check-label" for="exampleRadios1">
                                    Ya
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-check-input cekData1" type="radio" name="exampleRadios" id="exampleRadios2" value="tidak">
                                <label class="form-check-label" for="exampleRadios2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                      
                     
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Status<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="voucher-select" class="js-example-basic-single col-sm-12" name="status_voucher" placeholder="id_usr_role" type="text" required="required">
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
let kodeVoucherOtomatis = '<?= $kode_voucher ?>';
</script>
<script>
    var isEdit = false;
$('document').ready(function () {
    var modalLabel = $('#myModalLabelVOucher');
    var form = $('#form-voucher');
    // getSelectOptionProduct()
    var no = 0;
    var formRole = $('#voucher-select');
    formRole.select2();
    $("#jenis-pemakaian").select2()
    $('#startDate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#lastDate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    let cekData = {value:null}
    $('.cekData').change((dat)=>{
        cekData.value = 'ya'
        console.log(cekData)
    })
    $('.cekData1').change((dat)=>{
        cekData.value = 'tidak'
        console.log(cekData)
    })
    $('#jenis').change((data)=>{
        if ($('#jenis').val() == 'nominal') {
            $('#jenis-vouchernya').html(` <label class="col-sm-2 col-form-label" for="name">Voucher Nominal<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="besaran" class="form-control" name="besaran" placeholder="Voucher Nominal" type="number" min="0" required="required">
                        </div>`);
        } else if($('#jenis').val() == 'jumlah'){
            $('#jenis-vouchernya').html(` <label class="col-sm-2 col-form-label" for="name">Voucher (%)<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="besaran" class="form-control" name="besaran" placeholder="Voucher (%)" type="number" min="0" required="required">
                        </div>`);
        }
    })
    $('#jenis').select2()
    $('#tipe').select2()
    $('#generate').select2()
    $('#kode_product').select2()
    $("#jenis-pemakaian").change((data)=>{
        if ($("#jenis-pemakaian").val() == 2) {
            $("#dataJenisVoucher").html(`<div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Jenis Voucher<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="jenisvoucher" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Jenis Voucher</option>
                                <option value="5">Potongan Harga untuk Kategori Pilihan tertentun dengan jumlah item yang ditentukan dalam satu keranjang dan satu transaksi.</option>
                                <option value="6">Promo Two for</option>
                            </select>
                        </div>
                    </div>`)
        } else {
            $("#dataJenisVoucher").html(`<div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Jenis Voucher<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="jenisvoucher" class="js-example-basic-single col-sm-12" name="jenis" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Jenis Voucher</option>
                                <option value="1">Potongan Harga dengan Ketentuan Jumlah Item dalam Satu Keranjang Pada Satu Transaksi</option>
                                <option value="2">Potongan Total Harga dalam Satu Keranjang Pada Satu Transaksi Tanpa Ketentuan Nominal dan Jumlah</option>
                                <option value="3">Potongan Total Harga dalam Satu Keranjang Pada Satu Transaksi Dengan Ketentuan Nominal</option>
                                <option value="4">Potongan Harga untuk Produk Pilihan Tertentu di Dalam Satu Keranjang pada Satu Transaksi</option>
                            </select>
                        </div>
                    </div>`)
        }
        $("#jenisvoucher").select2()
        $("#jenisvoucher").change((data)=>{
        console.log($("#jenisvoucher").val())
        if ($("#jenisvoucher").val() == 1) {
            $("#pilihanJenisVoucher").html(`
            <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Jumlah Item<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="jumlahItem" class="form-control" name="jumlah" placeholder="Jumlah Item" type="number" min="0" required="required">
                        </div>
                    </div>
            `)
        } else if ($("#jenisvoucher").val() == 2) {
            $("#pilihanJenisVoucher").html(``)
        }else if ($("#jenisvoucher").val() == 3) {
            $("#pilihanJenisVoucher").html(`
            <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Nominal Transaksi<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="nominalTransaksi" class="form-control" name="jumlah" placeholder="Nominal Transaksi" type="number" min="0" required="required">
                        </div>
                    </div>
            `)
        }else if ($("#jenisvoucher").val() == 4) {
             $("#pilihanJenisVoucher").html(`
             <div class="form-group row" id="productCek">
                        <label class="col-sm-2 col-form-label" for="name">Produk Pilihan<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="pilihan-product" class="js-example-basic-multiple col-sm-12" name="product" placeholder="id_usr_role" type="text" required="required" multiple="multiple">
                                <option value="">Pilih Produk</option>
                            </select>
                        </div>
                    </div>
             `)
             $("#pilihan-product").select2()
             getSelectOptionProduct4()
        }else if ($("#jenisvoucher").val() == 5) {
            $("#pilihanJenisVoucher").html(`
             <div class="form-group row" id="productCek">
                        <label class="col-sm-2 col-form-label" for="name">Kategori Pilihan<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-kategori" class="js-example-basic col-sm-12" name="kategori" placeholder="id_usr_role" type="text" required="required" >
                                <option value="">Pilih Kategori</option>
                            </select>
                        </div>
                    </div>
             `)
             $("#select-kategori").select2()
             getSelectOptionKategori()
        }else if ($("#jenisvoucher").val() == 6) {
            $("#pilihanJenisVoucher").html(`
             <div class="form-group row" id="productCek">
                        <label class="col-sm-2 col-form-label" for="name">Produk Pilihan<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="pilihan-product" class="js-example-basic-multiple col-sm-12" name="product" placeholder="id_usr_role" type="text" required="required" multiple="multiple">
                                <option value="">Pilih Produk</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Harga<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="besaran" class="form-control" name="besaran" placeholder="Harga" type="number" min="0" required="required">
                        </div>
                    </div>
             `)
             $("#pilihan-product").select2()
             getSelectOptionProduct4()
             $('#jenis-vouchernya').html(``);
        }
    })
    })
    $('#generate').change((data)=>{
        
        if ($('#generate').val() == 1) {
            $("#kodeGenerate").html(` <label class="col-sm-2 col-form-label" for="name">Kode Voucher<span class="required" style="color:#ff3333;">*</span>
            </label>
            <div class="col-sm-10">
            <input id="kode" class="form-control" name="kode" value="${kodeVoucherOtomatis}" placeholder="Kode Voucher" type="hidden">
                <input id="kode_voucher" class="form-control" name="kode" value="${kodeVoucherOtomatis}" placeholder="Kode Voucher" type="text" disabled>
            </div>`)
        } else {
            $("#kodeGenerate").html(` <label class="col-sm-2 col-form-label" for="name">Kode Voucher<span class="required" style="color:#ff3333;">*</span>
            </label>
            <div class="col-sm-10">
            <input id="kode" class="form-control" name="kode" value="" placeholder="Kode Voucher" type="text">
            </div>`)
        }
    })

    //Form Components
    var table = $('#table-voucher');
    table.DataTable({
        "aaSorting": [],
        "initComplete": function (settings, json) { },
        "retrieve": true,
        "processing": true,
        'ajax': {
            "type": "GET",
            "url": base_url + 'voucher/get',
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
                return full.kode == null ? '-' : full.kode;
            }
        },
        {
            render: function (data, type, full, meta) {
                return full.nama_voucher == null ? '-' : full.nama_voucher;
            }
        }, {
            render: function (data, type, full, meta) {
                return full.besaran == null ? '-' : full.besaran + ' %';
            }
        }, {
            render: function (data, type, full, meta) {
                return full.max_pem == null ? '-' : full.max_pem;
            }
        },{
            render: function (data, type, full, meta) {
                return full.tipe == null ? '-' : full.tipe;
            }
        },
        {
            render: function (data, type, full, meta) {
                return full.gambar_v == null ? '-' : `<a href="${path_photo + 'voucher/' + full.gambar_v}" data-lightbox="roadtrip"><img src="${path_photo + 'voucher/' + full.gambar_v}" style="max-width: 237px;" class="img-fluid m-b-10" ></a>`;
            }
        },
         {
            render: function (data, type, full, meta) {
                return full.keterangan_voucher == null ? '-' : full.keterangan_voucher;
            }
        }, {
            render: function (data, type, full, meta) {
                // return full.status_voucher == null ? '-' : full.status_voucher;
                return full.status_voucher == null ? '-' : full.status_voucher == 1 ? `<button class="btn btn-primary" onclick="activated('${full.kode}',${full.status_voucher})">Aktif</button> ` : `<button class="btn btn-danger" onclick="activated('${full.kode}',${full.status_voucher})">Non Aktif</button> `;
            }
        }, {
            render: function (data, type, full, meta) {
                return `
                        <div class="text-center">
                                    <a href="#" class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                                        <i class="icofont icofont-ui-settings"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" onclick="edit_voucher('${full.kode}')" ><i class="icofont icofont-ui-edit"></i>Edit</a>
                                        <a class="dropdown-item" href="#" onclick="delete_promo('${full.kode}','voucher')" ><i class="icofont icofont-ui-delete"></i>Delete</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                </div>
                            </div> `;
            }
        }
        ]
    });

    form.submit(function (e) {
        var url_form = (isEdit == false) ? base_url + '/voucher/add' : base_url + '/voucher/edit'
        e.preventDefault();
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(this);
            formdata.append('kode_product', $('#kode_product').val());
            
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
            $("#showGenerate").show();
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
        $("#pilihan-product").html(promo);
    });
}
function edit_voucher(id) {
    getMasterData(service_url + 'voucher/' + id, '', function (data) {
        isEdit = true;
        $("#showGenerate").hide();

        // console.log(data.kode_product.split(';'))
        $("#id").val(data.kode);
        $("#kode_voucher").val(data.kode);
        $("#nama_voucher").val(data.nama_voucher)
        $("#besaran").val(data.besaran);
        $("#keterangan_voucher").val(data.keterangan_voucher);
        $("#max_pem").val(data.max_pem);
        $('#jenis').val(data.jenis);
        $('#jenis').trigger('change');
        $('#tipe').val(data.tipe);
        $('#tipe').trigger('change');
        $('#voucher-select').val(data.status_voucher);
        $('#voucher-select').trigger('change');
        $('#kode_product').val(data.kode_product.split(';'));
        $('#kode_product').trigger('change');
        $('#generate').removeAttr('required');
        $('#modal-btn').click();
    });

}
function kodeVoucher(kode) {

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
function getSelectOptionKategori() {
    getMasterData(service_url + 'kategori/find', {
        departemen_id:1
    }, function (data) {
        
        var Kategori = `<option value="">Pilih Kategori</option>`;
        data.forEach(res => {
            Kategori += `<option value="${res.kode_kategori}">${res.nama_kategori}</option>`;
        });
        $("#select-kategori").html(Kategori);
    });

}
</script>