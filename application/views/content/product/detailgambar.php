<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Daftar Gambar</h4>
                                    <span>List gambar setiap produk</span>
                                    <div class="addgambs"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <?= $breadcumb ?>
                        </div>
                    </div>
                </div>
                <div class="page-body gallery-page ">
                    <div class="row users-card klikme" id="draggablePanelList">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-container-gambar" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Gambar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-gambar">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Gambar
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="id" value="<?= $id_product ?>" type="hidden" required="required">
                            <input id="field" class="form-control" name="field" type="hidden" required="required">
                            <input id="data-excell" class="form-control" name="images" placeholder="Nama Artikel" type="file" required="required">
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
<script type="text/javascript" src="<?= base_url() ?>assets/bower_components/Sortable/js/Sortable.js"></script>
<script src="<?= base_url() ?>assets/assets/pages/sortable-custom.js" type="text/javascript"></script>
<script>
    var id_product = "<?= $id_product ?>";
    var kode_prod = "<?= $kode_prod?>";
    var isEdit = false;
    $('document').ready(function() {
        detail(id_product)

        $('#form-gambar').submit(function(e) {
            e.preventDefault();
            var formdata = false;
            if (window.FormData) {
                formdata = new FormData(this);
            }
            var url_form = (isEdit == false) ? base_url + '/product/add_gambar' : base_url +
                '/product/edit_gambar'
            $.ajax({
                url: url_form,
                type: 'post',
                data: formdata ? formdata : form.serialize(),
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, text) {
                    // console.log(data)
                    if (data.success) {
                        $('#cancel2').click();
                        swal({
                                title: 'Saved!',
                                text: 'Successful upload data!',
                                type: 'success',
                                closeOnConfirm: true
                            },
                            function() {
                                detail(id_product)
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
                            function() {
                                detail(id_product)
                            }

                        );
                    }
                },
                error: function(stat, res, err) {
                    alert(err);
                    isEdit = false;

                }
            });
        });
        $('#close_dialog').click(function() {
            isEdit = false;
            $('#field').val('');
        });

        $('#cancel').click(function() {
            isEdit = false;
            $('#field').val('');
        });
        $('.close').click(function() {
            isEdit = false;
            $('#field').val('');
        });

        $('#submit').click(function() {
            $('#sendSubmit').click();
        });
        $('#submit2').click(function() {
            $('#sendSubmit2').click();
        });
        $('#submit3').click(function() {
            $('#sendSubmit3').click();
        });
    });

    function edit(no_id) {

        isEdit = true;
        var id = no_id + 1;
        $('#field').val('images' + id);
        // $('#modal-btn').click();
        $("#modal-container-gambar").modal('show')
    }

    function detail(params) {
        getMasterData(service_url + 'master_product/' + params, '', function(data) {
            var gambar = ``;
            if (data.images) {
                var no = 0;
                data.images.forEach(e => {
                    if (e != '' && e != null) {
                        gambar += `<div data-id="${no}" class="col-lg-6 col-xl-3 col-md-6 card-sub">
                            <div class="card rounded-card user-card">
                                <div class="card-block">
                                    <div class="img-hover"> <img class="img-fluid img-radius" src="${encodeURI(path_photo+"uploads/user_photo/"+e)}" alt="round-img">
                                        <div class="img-overlay img-radius"> <span>
                                                <a href="#" class="btn btn-sm btn-primary" onclick="edit(${no})" data-popup="lightbox"><i class="icofont icofont-edit"></i></a>
                                                <a href="#" onclick="delete_master_product('${params}',${no+1},'master_product')" class="btn btn-sm btn-danger"><i class="icofont icofont-ui-delete"></i></a>
                                            </span> </div>
                                    </div>
                                     <div class="user-content">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>`
                    }
                    no++;
                });
                var jum = data.images.filter(img => img != null && img != '');
                console.log(jum.length);
                if (jum.length < 6) {
                    $('.addgambs').html(`<button data-toggle="modal" data-target="#modal-container-gambar" id="modal-btn" style="margin-left:5px;" title="Add/Edit Color" class="btn btn-success">
                                        Tambah/Edit Gambar
                                    </button>`);
                } else {
                    $('.addgambs').hide()
                }

            }
            $(".klikme").html(gambar)
        });
    }

    function delete_master_product(idData, field, endpoint) {
        swal({
                title: "Are you sure?",
                text: "This data will be deleted!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function() {
                var datanyas = ['images' + field, null];
                var datanya = {};
                datanya[datanyas[0]] = datanyas[1];
                $.ajax({
                    url: service_url + endpoint + "/update/" + idData,
                    type: 'PUT',
                    data: datanya,
                    dataType: 'json',
                    success: function(data, text) {
                        if (data.success) {
                            swal(
                                'Deleted!',
                                'Successful delete data!',
                                'success'
                            );
                            // if (callback) callback(data.success);
                            detail(id_product)
                        }
                    },
                    error: function(stat, res, err) {
                        alert(err);
                    }
                });
            });
    }
    // $(function() {
    Sortable.create(draggablePanelList, {
        group: 'draggablePanelList',
        store: {
            get: function(sortable) {
                var order = localStorage.getItem(sortable.options.group.name);
                return order ? order.split(';') : [];
            },
            set: function(sortable) {
                var order = sortable.toArray();
                localStorage.setItem(sortable.options.group.name, order.join(';'));
                var arr = localStorage.draggablePanelList.split(";");
                getMasterData(service_url + 'master_product/' + id_product, '', function(data) {
                    var no = 1;
                    var simpan = {
                        'images1': null,
                        'images2': null,
                        'images3': null,
                        'images4': null,
                        'images5': null,
                        'images6': null,
                    };
                    for (ab in arr) {
                        simpan['images' + no] = data.images[arr[ab]];
                        no++;
                    }
                    simpan['id_warna'] = data.warna_id
                    // console.log(simpan)
                    $.ajax({
                        url: service_url + "master_product/updateImage/" + kode_prod,
                        type: 'PUT',
                        data: simpan,
                        dataType: 'json',
                        success: function(data, text) {
                            if (data.success) {
                                detail(id_product)
                            }
                        },
                        error: function(stat, res, err) {
                            alert(err);
                        }
                    });

                })


            }
        }
    });
</script>