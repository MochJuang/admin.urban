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
                                    <button data-toggle="modal" data-target="#modal-container-product" id="modal-btn" style="margin-left:5px;" title="Add/Edit Color" class="card-block icon-btn btn btn-inverse btn-outline-inverse btn-icon">
                                        <i class="icofont icofont-ui-add"></i>
                                    </button>

                                    <div class="form-group row" style="margin-top: 20px;">
                                        <div class="col-sm-2">
                                            <select id="select-departemen" class="js-example-basic-single col-sm-12" name="kategori_id2" placeholder="id_usr_role" type="text" required="required">
                                                <option value="">Pilih Departemen</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select id="select-kategorinya" class="js-example-basic-single col-sm-12" name="kategori_id1" placeholder="id_usr_role" type="text" required="required">
                                                <option value="">Pilih Kategori</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select id="select-subKategorinya" class="js-example-basic-single col-sm-12" name="kategori_id3" placeholder="id_usr_role" type="text" required="required">
                                                <option value="">Pilih Sub Kategori</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select id="select-subKategori2nya" class="js-example-basic-single col-sm-12" name="kategori_id4" placeholder="id_usr_role" type="text" required="required">
                                                <option value="">Pilih Sub Kategori Level 2</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block showingProduct">
                                    <div class="dt-responsive table-responsive">
                                        <!-- <a href="<?= base_url() ?>export/example" style="float:right;height: 36px;" title="Add/Edit Color" class="btn btn-success">
                                            Format Data
                                        </a> -->
                                        <!-- <a href="<?= base_url() ?>export/example" style="float:right;height: 36px;" title="Add/Edit Color" class="btn btn-success">
                                            Format Data
                                        </a> -->
                                        <button onclick="updatePromo()" style="float:right;height: 36px;margin-right:10px" title="Add/Edit Color" class="btn btn-success">
                                            Update Promo
                                        </button>
                                        <button data-toggle="modal" data-target="#modal-container-format" id="modal-btn-format" style="float:right;height: 36px;margin-right:10px" title="Add/Edit Color" class="btn btn-success">
                                            Download Format Import
                                        </button>
                                        <button data-toggle="modal" data-target="#modal-container-import" id="modal-btn-import" style="float:right;height: 36px;margin-right:10px" title="Add/Edit Color" class="btn btn-primary">
                                            Import
                                        </button>
                                        <table id="table-product" class="table table-striped table-bordered nowrap" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Nama Artikel</th>
                                                    <th>Kategori</th>
                                                    
                                                    <th>Jumlah List Produk</th>
                                                    <th>Sub Kategori</th>
                                                    <th>Sub Kategori Level 2</th>
                                                    <th>Promo</th>
                                                    <th>Harga</th>
                                                    <th style="width: 15%;">Deskripsi</th>
                                                    <th>New Arrival</th>
                                                    <th>Best Product</th>
                                                    <th>Lokasi</th>

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

<div class="modal fade" id="modal-container-product" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelproduct"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-product">
                    <div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="brand_id" id="brand_id" value="<?= $this->uri->segment(2) ?>">
                        <input type="hidden" name="kode_product" id="kode_product">
                        <input type="hidden" name="countCodeProduct" id="countCodeProduct">
                        <input type="hidden" name="kategori_id" id="kategori_id">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Kategori<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-kategori" class="js-example-basic-single col-sm-12" name="kategori_ids" placeholder="id_usr_role" type="text" required="required" disabled>
                                <option value="">Pilih Kategori</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Sub Kategori<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-subkategoris" class="js-example-basic-single col-sm-12" name="subkategori_id" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Sub Kategori</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Sub Kategori Level 2
                        </label>
                        <div class="col-sm-10">
                            <select id="select-subkategori-lv2" class="js-example-basic-single col-sm-12" name="subkategorilv2_id" placeholder="id_usr_role" type="text">
                                <option value="">Pilih Sub Kategori Level 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Kode Product
                        </label>
                        <div class="col-sm-10">
                            <input id="kodes" class="form-control" name="kodes" placeholder="Kode Product" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Nama Artikel<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="nama_artikel" class="form-control" name="nama_artikel" placeholder="Nama Artikel" type="text" required="required">
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Gambar Thumbnail<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="thumbnail" class="form-control" name="thumbnail" placeholder="Stok Produk" type="file" required="required">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Warna<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-warna" multiple="multiple" class="js-example-basic-single col-sm-12" name="warna_id" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Warna</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Ukuran<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-ukuran" multiple="multiple" class="js-example-basic-single col-sm-12" name="ukuran_id" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Ukuran</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Harga<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="harga" class="form-control" name="harga" placeholder="Harga Produk" type="number" min="0" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Deskripsi<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">

                            <textarea name="deskripsi" id="isi" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Promo<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="select-promo" class="js-example-basic-single col-sm-12" name="promo_id" placeholder="id_usr_role" type="text">
                                <option value="">Pilih Promo</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Status<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="product-select" class="js-example-basic-single col-sm-12" name="status" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih Status</option>
                                <option value=1>Dijual</option>
                                <option value=2>Tidak Dijual</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">New Arrival<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <select id="newArrival-select" class="js-example-basic-single col-sm-12" name="arrival" placeholder="id_usr_role" type="text" required="required">
                                <option value="">Pilih</option>
                                <option value=1>Ya</option>
                                <option value=0>Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Berat<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="weight" class="form-control" min="0" name="weight" placeholder="weight Produk" type="number" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Lokasi<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input id="lokasi" class="form-control" name="lokasi" placeholder="Lokasi" type="text" required="required">
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

<div class="modal fade" id="modal-container-import" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Product</h4>
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

<div class="modal fade" id="modal-container-format" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Format Import Data Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-format">
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label" for="name">Format Import Dengan:</label>
                        <br><br>
                        <div class="col-sm-10 form-radio">
                            <!-- <form> -->
                            <div class="radio radio-inline">
                                <label><input type="radio" name="radio" class="subKategoriRadioLv1" value="1"> <i class="helper"></i>Sub Kategori Level 1</label>
                            </div>
                            <div class="radio radio-inline">
                                <label> <input type="radio" name="radio" class="subKategoriRadioLv2" value="1"> <i class="helper"></i>Sub Kategori Level 2 </label>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                    <input type="hidden" name="optionLevel" id="optionLevel">
                    <div class="radioPilihan">

                    </div>
                    <button hidden type="submit" id="sendSubmit4"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel4" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" id="submit4" class="btn btn-primary waves-effect waves-light ">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-container-promo" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" style="max-width: 1200px !important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Promo Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-promo">
                    <div class="form-group row table-responsive" style="margin-left: 2px;">
                        <table id="table-product-promo" style="width: 100%;" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Artikel</th>
                                    <th>Kategori</th>
                                    <th>Sub Kategori</th>
                                    <th>Sub Kategori Level 2</th>
                                    <th>Promo</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
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
<div class="modal fade" id="lihatDeskripsi" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" style="max-width: 1200px !important;margin-top: 20%;" role="document">
        <div class="modal-content">

            <div class="modal-body" id="deskripsinya">

            </div>

        </div>
    </div>
</div>
<!-- <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> -->
<script>
    var id_kategoris = "BRG002";
    var kode_product = "<?= $kode_product ?>";
    var brand_id = "<?= $brand->id_brand ?>";
</script>
<script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<script>
    $(function() {
        // APPLY THE EDITOR TO THE TEXTAREA
        // $(".wysiwyg").ckeditor();

        // FIXING THE MODAL/CKEDITOR ISSUE
        $(".modal").removeAttr("tabindex");
    });
</script>
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
<script src="<?= base_url() ?>assets/js/item2.js"></script>

<script>
    // tinymce.init({
    //     selector: '#isi'
    // });
</script>