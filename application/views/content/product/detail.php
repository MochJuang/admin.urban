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
                                        <!-- <a href="<?= base_url() ?>export/example_product" style="float:right;height: 36px;" class="btn btn-success">
                                            Format Data
                                        </a>
                                        <button data-toggle="modal" data-target="#modal-container-import" id="modal-btn-import" style="float:right;height: 36px;margin-right:10px" title="Add/Edit Color" class="btn btn-primary">
                                            Import
                                        </button> -->
                                        <button data-toggle="modal" data-target="#modal-container-gambar" id="modal-btn-gambar" style="float:right;height: 36px;margin-right:10px" title="Add/Edit Color" class="btn btn-warning">
                                            Upload Gambar
                                        </button>
                                        <table id="table-master_product" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Artikel</th>
                                                    <th>Warna</th>
                                                    <th>Ukuran&Stok</th>
                                                    <th>Thumbnail</th>
                                                    <!-- <th>Detail</th> -->
                                                    <th>Gambar</th>
                                                    <th>Berat</th>
                                                    <!-- <th>Barcode</th> -->
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

<div class="modal fade" id="modal-container-detail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Master Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body klikme">
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" id="submit" class="btn btn-primary waves-effect waves-light ">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> -->
<script>
    var products_id = "<?= $this->uri->segment('4') ?>";
    var subkategori_id = "<?= $this->uri->segment('3') ?>";
</script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?= base_url() ?>assets/js/detail.js"></script>

<script>
    // tinymce.init({
    //     selector: '#isi'
    // });
</script>