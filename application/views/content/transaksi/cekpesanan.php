
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
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-3">Transaksi</h5>
                                        <!-- <div class="row">
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" id="startDate">
                                                <span class="mx-1">-</span>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" id="lastDate">
                                            </div>
                                            <div class="col-md-1">
                                                <button class="btn btn-success disabled" id="saveFilter"><i class="fa fa-filter mr-2"></i> Filter</button>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-12">
                                                
                                                <ul class="nav nav-tabs data-tabs t.find('li')abs" role="tablist">
                                                    <li class="nav-item"> <a class="nav-link active menunggu" data-toggle="tab" href="#menunggu" data-status="menunggu" role="tab">Menunggu Pembayaran <span class="pcoded-badge label label-success transaksi" id="transaksi-2">0</span></a> </li>
                                                    <li class="nav-item"> <a class="nav-link proses" data-toggle="tab" href="#proses" data-status="proses" role="tab">Proses <span class="pcoded-badge label label-success transaksi" id="transaksi-3">0</span> </a> </li>
                                                    <li class="nav-item"> <a class="nav-link packing" data-toggle="tab" href="#packing" data-status="packing" role="tab">Packing <span class="pcoded-badge label label-success transaksi" id="transaksi-4">0</span> </a></a> </li>
                                                </ul>
                                                <div class="tab-content tabs card-block">
                                                    <div class="tab-pane active" id="menunggu" role="tabpanel">
                                                    
                                                    </div>
                                                    <div class="tab-pane" id="proses" role="tabpanel">
                                                        
                                                    </div>
                                                    <div class="tab-pane" id="packing" role="tabpanel">
                                                        
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
                <div class="row">
                    <div class="col text-right">
                        <button class="btn btn-success disabled BtnPrintAll"><i class="fa fa-print mr-1"></i>Print All Sticker</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var isEdit = false;
function getTransaksiData(status, id) {
    let table = ` <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group row" style="margin-top: 20px;">
</div>
                        <table id="table-${status}" class="table table-striped table-bordered nowrap" >
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input checkAll" type="checkbox">
                                                            </label>
                                                        </div>
                                                    </th>
                                                    ${id != 4 ? '<th>Status</th>' : ''}
                                                    <th>Action</th>
                                                    ${id != 6 ? `<th>Print Sticker</th>
                                                    <th>Print Packing</th>` : ''}

                                                    

                                                    <th>Resi</th>
                                                    <th>Print Invoice</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Product</th>
                                                    <th>Product Bonus</th>
                                                    <th>Nama Pembeli</th>
                                                    <th>Email</th>
                                                    <th>Tanggal Transaksi</th>
                                                    <th>Tanggal Pembayaran</th>
                                                    <th>Tanggal</th>
                                                    
                                                    <th>Provinsi</th>
                                                    <th>Kabupaten</th>
                                                    <th>Kecamatan</th>
                                                    <th>Alamat Lengkap</th>
                                                    <th>Total</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        `
                           
    $("#"+ status).html(table)
    let columnsTransaksi =  [{
    render: function (data, type, full, meta) {

        no += 1;
        return no;
    }
}]
columnsTransaksi.push({
    render: function (data, type, full, meta) {
        return `<div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input printData" type="checkbox" name="printAll[]" id="" value="${full.kd_transaksi}">
                    </label>
                </div>`
    }
});
if (id != 4) {
    columnsTransaksi.push({
        render: function (data, type, full, meta) {
            // 1=simpan;2=menunggu pembayaran;3=proses;4=packing;5=kirim;6=selesai	
            if (full.status) {
                switch (full.status) {
                    case 1:
                        var status = '<span class="badge badge-primary" style="border-radius: 25px;">Simpan</span>';
                        break;
                    case 2:
                        var status = '<span class="badge badge-success" style="border-radius: 25px;">Menunggu Pembayaran</span>';
                        break;
                    case 3:
                        var status = `<a href="#" onclick="editStatus(${full.status},'${full.kd_transaksi}')"><span class="badge badge-info" style="border-radius: 25px;">Proses</span></a>`;
                        break;
                    case 4:
                        var status = `<a href="#" onclick="editStatus(${full.status},'${full.kd_transaksi}','KIRIM')"><span class="badge badge-warning" style="border-radius: 25px;">Packing</span></a>`;
                        break;
                    case 5:
                        var status = `<span class="badge badge-danger" style="border-radius: 25px;">Dikirim</span>`;
                        break;
                    case 6:
                        var status = '<span class="badge badge-inverse" style="border-radius: 25px;">Selesai</span>';
                        break;
                    case 7:
                        var status = '<span class="badge badge-inverse" style="border-radius: 25px;">Expired</span>';
                        break;
                    case 8:
                        var status = '<span class="badge badge-inverse" style="border-radius: 25px;">Refund</span>';
                        break;
                        case 9:
                        var status = '<span class="badge badge-inverse" style="border-radius: 25px;">Cancel</span>';
                        break;
                    default:
                        break;
                }
            }
            return full.status == null ? '' : status;
        }
    })
}


columnsTransaksi.push({
    render: function (data, type, full, meta) {
        return `<div class="text-center">
            <a href="#" class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                <i class="icofont icofont-ui-settings"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="${base_url}transaksi/detail/${full.kd_transaksi}"><i class="icofont icofont-eye-alt"></i>Detail</a>
            <div role="separator" class="dropdown-divider"></div>
        </div>
    </div>`
    }
});

// && idTransaksi != 7
if (id >= 4 && id != 7 && id != 9) {
    if (id != 6) {
        columnsTransaksi.push({
        render: function (data, type, full, meta) {
            if (full.status >= 4 && full.resi != null) {
                return `<div style="text-align:center"><a href="${base_url}export/pdfA9/${full.kd_transaksi}" class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20" target="_blank">Print Stickers</a>
                
            
            </div>`;
            }else{
                return `-`;
            }
            
        }
    },{
        render: function (data, type, full, meta) {
            return `<div style="text-align:center"><a href="${base_url}export/pdfA5/${full.kd_transaksi}" class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20" target="_blank">Print Packing</a>
            
            </div>`;
            
        }
    })    
    }
    
    columnsTransaksi.push({
        render: function (data, type, full, meta) {

            let sebelumResi = ``
            if (full.status >= 4) {
                sebelumResi = full.resi == null ? `<a href="javascript:;" onclick="getAwb('${full.kd_transaksi}')" class="btn btn-success btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20">Get Resi</a>`: full.resi;
            } else {
                sebelumResi = full.resi == null ? `-`: full.resi;
            }
            return `<div style="text-align:center">
            ${sebelumResi}
            </div>`;
        }
    },{
        render: function (data, type, full, meta) {
            
            return `<div style="text-align:center"><a href="${base_url}export/pdf2/${full.kd_transaksi}" class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20" target="_blank">Print Invoice</a>
            
            </div>`;
        }
    }
    )
}else{
 columnsTransaksi.push({
        render: function (data, type, full, meta) {
            return `<div style="text-align:center">-
            
            </div>`;
        }
    },
    {
        render: function (data, type, full, meta) {
            if (full.status == 9) {
                return '-'
            } else {
                return `<div style="text-align:center"><a href="${base_url}export/pdfA5/${full.kd_transaksi}" class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20" target="_blank">Print Packing</a>
            </div>`;    
            }
            
        }
    },
    {
        render: function (data, type, full, meta) {
            let sebelumResi = full.resi == null ? `<a href="javascript:;" onclick="getAwb('${full.kd_transaksi}')" class="btn btn-success btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20">Get Resi</a>`: full.resi;

            return `<div style="text-align:center">
            ${sebelumResi}
            </div>`;
        }
    },{
        render: function (data, type, full, meta) {
            
            return `<div style="text-align:center"><a href="${base_url}export/pdf2/${full.kd_transaksi}" class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20" target="_blank">Print Invoice</a>
            
            </div>`;
        }
    })
}
columnsTransaksi.push({
    render: function (data, type, full, meta) {
        return full.kd_transaksi == null ? '-' : full.kd_transaksi;
    }
},
{
    render: function (data, type, full, meta) {
        let dataArtikel = `<ul>`;
        full.keranjang.forEach((es, index)=>{
            dataArtikel += `<li>${index + 1}. ${es.nama_artikel+' '+ es.nama_warna+' '+es.ukuran}</li>`
        })
        dataArtikel += `</ul>`;
        return full.keranjang.length ? dataArtikel : '-';
    }
},
{
    render: function (data, type, full, meta) {
        // console.log(full.dataBonus.length)
        let dataArtikel = `<ul>`;
        full.dataBonus.forEach((es, index)=>{
            dataArtikel += `<li>${index + 1}. ${es.nama_artikel+' '+ es.nama_warna+' '+es.ukuran}</li>`
        })
        dataArtikel += `</ul>`;
        return full.dataBonus.length ? dataArtikel : '-';
    }
},
{
    render: function (data, type, full, meta) {
        return full.nama_user == null ? '-' : full.nama_user;
    }
},
{
    render: function (data, type, full, meta) {
        return full.email == null ? '-' : full.email;
    }
},
{
    render: function (data, type, full, meta) {
        // return full.tanggal == null ? '-' : full.tanggal;
        return moment(full.created_at).format(
            "D MMM YYYY, h:mm:ss a"
        );
        // return moment(full.updated_at).format(
        //     "D MMM YYYY, h:mm:ss a"
        // );
    }
},
{
    render: function (data, type, full, meta) {
        // return full.tanggal == null ? '-' : full.tanggal;
        let TanggalNya = '';
        if (full.tanggalTransfer) {
            TanggalNya = moment(full.tanggalTransfer).format(
            "D MMM YYYY, h:mm:ss a"
            );
        } else {
            TanggalNya = moment(full.created_at).format(
            "D MMM YYYY, h:mm:ss a"
            );
        }
        if (id == 2) {
            return '-'
        } else {
            return TanggalNya;    
        }
        
        // return moment(full.updated_at).format(
        //     "D MMM YYYY, h:mm:ss a"
        // );
    }
},
{
    render: function (data, type, full, meta) {
        // return full.tanggal == null ? '-' : full.tanggal;
        // return moment(full.tanggal, "YYYY-MM-DD HH:mm:ss").format(
        //     "D MMM YYYY"
        // );
        return moment(full.updated_at).format(
            "D MMM YYYY, h:mm:ss a"
        );
    }
},

{
    render: function (data, type, full, meta) {
        return full.nama_provinsi == null ? '-' : full.nama_provinsi;
    }
},
{
    render: function (data, type, full, meta) {
        return full.nama_kabupaten == null ? '-' : full.nama_kabupaten;
    }
},
{
    render: function (data, type, full, meta) {
        return full.nama_kecamatan == null ? '-' : full.nama_kecamatan;
    }
},
{
    render: function (data, type, full, meta) {

        var alamat = full.alamat.replace(/<.*?>/g, "");
        return full.alamat == null ?
            "-" :
            alamat.length > 20 ?
                alamat.substring(0, 20) + "..." :
                alamat;
    }
},
{
    render: function (data, type, full, meta) {
        return full.total_dengan_voucher == null ? '-' : 'Rp. ' + rubah(full.total_dengan_voucher);
    }
})
    $("#table-"+status).DataTable({
        "scrollX": true,
        "lengthChange": true,
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            },{
                extend: 'excelHtml5',
            }
        ],
        "aaSorting": [],
        "initComplete": function (settings, json) {

        },
        "retrieve": true,
        "processing": true,
        'ajax': {
            "type": "GET",
            "url": base_url + 'transaksi/get',
            "data": function (d) {
                no = 0;
                d.transaksiStatus = id;
                d.startDate = $("#select-startDate").val();
                d.lastDate = $("#select-lastDate").val();
            },
            "dataSrc": ""
        },
        'columns':columnsTransaksi
    });
    $('.select-startDate').select2(  {
        ajax: {
            url: base_url + 'transaksi/getTanggal',
            dataType: 'json',
            type: 'GET',
            data: function (params) {
                console.log(params)
                return {
                    nama_warna: params.term,
                    page: params.page
                };
            },
            processResults: function(data) {
                let kumpulanData = [];
                data.data.forEach(el=>{
                    kumpulanData.push({id: el.id_warna, text: el.nama_warna})
                })
                console.log(kumpulanData)
                return {
                    results: kumpulanData
                };
            },
            
            cache: true,
            allowClear: true,
            placeholder: 'Select at least one element',
            
        },
    });
    $('.select-lastDate').select2(  {
        ajax: {
            url: service_url + 'mastertransaksi/getTanggal',
            dataType: 'json',
            type: 'GET',
            beforeSend: function(xhr, settings) {

            },
            data: function (params) {
                // console.log(params)
                return {
                    tanggal: params.term,
                };
            },
            processResults: function(data) {
                console.log(data)
                let kumpulanData = [];
                data.forEach(el=>{
                    kumpulanData.push({id: el.tanggal, text: el.tanggal})
                })
                console.log(kumpulanData)
                return {
                    results: kumpulanData
                };
            },
            
            cache: true,
            allowClear: true,
            placeholder: 'Select at least one element',
            
        },
    });
}
$('document').ready(function () {

    $(document).on('change', '.checkAll:checkbox', function(e){
        var row = $(this)
        if (row.is(':checked')) {
            $('.printData').each(function(e){
                $(this).prop('checked', true);
            })
        }else{
            $('.printData').each(function(e){
                $(this).prop('checked', false);
            })
        }
        cekPrintAll()
    }) 

    function cekPrintAll()
    {
        let isChange = false
        $('.printData').each(function(e){
            if($(this).is(':checked'))
            {
                isChange = true;
            }
        })
        let status = null

        $('.data-tabs').find('li').each(function(k, v){
            if($(this).find('a').hasClass('active'))
            {
                status = $(this).find('a').data('status')
            }
        })

        let btn = $('.BtnPrintAll')
        if (isChange && status == 'packing') {
            btn.removeClass('disabled')
        } else {
            btn.addClass('disabled')
        }
    }

    $(document).on('change', '.printData:checkbox', function(e) { cekPrintAll() } )

    $(document).on('click', '.BtnPrintAll', function(e){
        if($(this).hasClass('disabled')){
            return false;
        }else{
            let dataKode = '?isPrint=true'
            $('.printData').each(function(e){
            if($(this).is(':checked'))
                {
                    dataKode += '&kode[]=' + $(this).val();
                }
            })
            window.open(base_url + 'export/printAllSticker/' + dataKode, '_blank') 
        }
        
    })


    cekDataKirim();
    cekDataPickup();
    $('.select-date-kirim').select2();
    var modalLabel = $('#myModalLabeltransaksi');
    var form = $('#form-transaksi');
    var no = 0;
    let statusTransaksi = {
        'menunggu' : 2,
        'proses' : 3,
        'packing' : 4,
        'kirim' : 5,
        'selesai' : 6,
        'expired' : 7,
        'cancel' : 9,
    }
//     $('#myTab a').click(function (e) {
//   e.preventDefault();
//   $(this).tab('show');
// })
    Object.keys(statusTransaksi).forEach((key)=>{
        // console.log(key)

        $('.'+key).click(function(e) {
            var elements = document.getElementsByClassName('tab-pane');
            [].forEach.call(elements, function(el) {
                el.classList.remove("active");
            });
            $("#"+key).addClass("active");
            e.preventDefault();
            $(this).tab('show');
            getTransaksiData(key, statusTransaksi[key])
            
        })
    })

  
})
function rubah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
}
function getTanggalSendAwb() {
    getMasterData(service_url + 'mastertransaksi/find', {
        status: 4,
        sendStartTime: tanggalSekarang,
    }, function (data) {
        if (data.length > 0) {
            $("#statusKirimJadi").show();
        }

    });
}
function rubahStatusPengiriman(tgl) {
    swal({
        title: "Are you sure?",
        text: "This data will be send!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, send it!",
        closeOnConfirm: false
    },
        function () {
    getMasterData(base_url + 'transaksi/updateStatusWithAwb', {
        // status: 5,
        sendStartTime: tgl,
    }, function (data) {
        swal(
            'Updated!',
            'Successful update data!',
            'success'
        );
    //    console.log(data)
    sidebarNotif()
       $('#table-transaksi').DataTable().ajax.reload();

    },'POST');
})
}
function editStatus(idStatus, kode_transaksi, jenis=null) {
    swal({
        title: "Are you sure?",
        text: "This data will be updated status!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, update it!",
        closeOnConfirm: false
    },
        function () {
            $.ajax({
                url: base_url + "transaksi/updateStatus/",
                type: 'GET',
                data: {
                    status: idStatus + 1,
                    kd_transaksi: kode_transaksi
                },
                dataType: 'json',
                success: function (data, text) {
                    console.log(data)
                    if (data.success) {
                        swal(
                            'Updated!',
                            'Successful update data!',
                            'success'
                        );
                        // if (callback) callback(data.success);
                        $('#table-proses').DataTable().ajax.reload();
                    }
                },
                error: function (stat, res, err) {
                    alert(err);
                }
            });

        })

}
function cekDataPickup() {
    getMasterData(service_url + 'mastertransaksi/cekPaketPickup', {
        
    }, function (data) {
        // console.log(data)
        sidebarNotif()
    }, 'GET');
}
function cekDataKirim() {
    getMasterData(service_url + 'mastertransaksi/getTrackingJNT', {
        
    }, function (data) {
        // console.log(data)
        sidebarNotif()
    }, 'GET');
}
function getAwb(kd_transaksi) {
    swal({
        title: "Are you sure?",
        text: "This data will be request AWB!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, GET IT!",
        closeOnConfirm: false
    },
        function () {
    getMasterData(base_url + 'transaksi/GetAWB', {
        kd_transaksi: kd_transaksi
    }, function (data) {
        swal(
            'Updated!',
            'Successful update data!',
            'success'
        );
        sidebarNotif()
        $('#table-proses').DataTable().ajax.reload();
    }, 'POST');
})
}
</script>