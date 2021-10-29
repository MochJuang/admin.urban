<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>User Profile</h4> <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <?= $breadcumb ?>
                            <?php
                            // print_r($data->data->id_admin);
                            ?>

                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cover-profile">
                                <div class="profile-bg-img"> <img class="profile-bg-img img-fluid" src="<?= base_url() ?>assets/assets/images/user-profile/bg-img1.jpg" alt="bg-img">
                                    <div class="card-block user-info">
                                        <div class="col-md-12">
                                            <div class="media-left">
                                                <a href="#" class="profile-image"> <img class="user-img img-radius" src="http://36.91.140.211/dashboard-urban/assets/user/contacts-64.png" alt="user-img" style="max-width: 80px;"> </a>
                                            </div>
                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div class="user-title">
                                                        <h2><?= $this->session->userdata('firstname') ?></h2> <span class="text-white"><?= $this->session->userdata('jenis') ?></span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="pull-right cover-btn">

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
                        <div class="col-lg-12">
                            <div class="tab-header card">
                                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                                        <div class="slide"></div>
                                    </li>
                                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">User's Services</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">User's Contacts</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#review" role="tab">Reviews</a>
                                        <div class="slide"></div>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-header-text">My Profile</h5>
                                            <button id="edit-btn" data-toggle="modal" data-target="#modal-container-promo" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right"> <i class="icofont icofont-edit"></i> </button>
                                        </div>
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="general-info">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table m-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">Name</th>
                                                                                    <td><?= $data->data->firstname . " " . $data->data->lastname ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Email</th>
                                                                                    <td><?= $data->data->email ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Username</th>
                                                                                    <td><?= $data->data->username ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Phone</th>
                                                                                    <td><?= $data->data->phone ? $data->data->phone : '-' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Hak Akses</th>
                                                                                    <td><?= $data->data->jenis ?></td>
                                                                                </tr>

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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-container-promo" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabelPromo">Edit My Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-promo">
                    <div>
                        <input type="text" name="id" id="id" value="<?= $data->data->id_admin ?>" hidden>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Firstname<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="firstname" value="<?= $data->data->firstname ?>" placeholder="Firstname" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Lastname<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="lastname" value="<?= $data->data->lastname ?>" placeholder="Lastname" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Username<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="username" value="<?= $data->data->username ?>" placeholder="Username" type="text" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="password" placeholder="Password" type="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Phone<span class="required" style="color:#ff3333;">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="promo" value="<?= $data->data->phone ?>" placeholder="phone" type="text">
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
    $('document').ready(function() {
        $('#submit').click(function() {
            $('#sendSubmit').click();
        });
        var form = $('#form-promo');
        form.submit(function(e) {
            var url_form = base_url + 'user/edit'
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
                success: function(data, text) {
                    var caption = 'edit';
                    if (data.success) {
                        $('#cancel').click();
                        swal({
                                title: 'Saved!',
                                text: 'Successful ' + caption + ' data!',
                                type: 'success',
                                closeOnConfirm: true
                            },
                            function() {
                                location.reload();
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
                            function() {
                                location.reload();
                            }
                        );
                    }
                },
                error: function(stat, res, err) {
                    alert(err);
                }
            });
        });
    })
</script>