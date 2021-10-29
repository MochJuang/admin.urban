<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com//polygon/adminty/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Sep 2020 17:34:18 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Urban&Co - Official Store </title>


    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="<?= base_url() ?>assets/assets/icon/FAVICON_WHITE-01.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/icon/feather/css/feather.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/icon/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/icon/material-design/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bower_components/sweetalert/css/sweetalert.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bower_components/ekko-lightbox/css/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bower_components/lightbox2/css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/assets/pages/nestable/nestable.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment-with-locales.min.js"></script>

    <style>
        .modal {
            z-index: 10000;
            overflow-y: auto;
        }

        .swal2-container {
            z-index: 20000;
        }

        .select2-container--open {
            z-index: 9999999
        }

        .tox-tinymce-aux {
            display: none;
        }
    </style>

</head>

<body>
    <script>
        var base_url = '<?php echo base_url(); ?>';
        var service_url = 'https://backend.urbanco.co.id/v1/';
        var path_photo = 'https://backend.urbanco.co.id/';
        let generateCode = (n) => {
            var string = "" + n;
            var pad = "0000";
            n = pad.substring(0, pad.length - string.length) + string;
            return n;
        }
        
    
        function getMasterData(url, data = null, callback = null, method = 'get') {
            $.ajax({
                url: url,
                method: method,
                dataType: 'json',
                data: data,
                beforeSend: function(xhr, settings) {
                    xhr.setRequestHeader('Authorization', 'Bearer <?= $this->session->userdata('access_token') ?>');
                },
                success: function(res) {
                    // $.unblockUI();
                    
                    if (callback) callback(method == 'PUT' ? res : res.data);
                },
                error: function(xhr, res, stat) {
                    alert('Terjadi Kesalahan Sistem, Silahkan Coba Lagi Dalam Beberapa Saat Lagi.');
                }
            });
        }

        function delete_datamaster(idData, endpoint, callback) {
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
                    $.ajax({
                        url: service_url + endpoint + "/delete/" + idData,
                        type: 'DELETE',
                        dataType: 'json',
                        beforeSend: function(xhr, settings) {
                            xhr.setRequestHeader('Authorization', 'Bearer <?= $this->session->userdata('access_token') ?>');
                        },
                        success: function(data, text) {
                            if (data.success) {
                                swal(
                                    'Deleted!',
                                    'Successful delete data!',
                                    'success'
                                );
                                if (callback) callback(data.success);
                            }
                        },
                        error: function(stat, res, err) {
                            alert(err);
                        }
                    });
                });
        }
    </script>
    <!-- Required Jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/jquery/js/jquery.min.js"></script>


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            //   $.getJSON(`<?= base_url() ?>Item/get`, function(dataProductSearch) {
            //     //   console.log(dataProductSearch)
            //       let productSearch = [];
            //       dataProductSearch.forEach(el => {
            //           productSearch.push({
            //               id: el.kode_product,
            //               product : el.nama_artikel
            //           })
            //       });
            //       console.log(productSearch)
            //   })
            var availableTags = [
                "ActionScript",
                "AppleScript",
                "Asp",
                "BASIC",
                "C",
                "C++",
                "Clojure",
                "COBOL",
                "ColdFusion",
                "Erlang",
                "Fortran",
                "Groovy",
                "Haskell",
                "Java",
                "JavaScript",
                "Lisp",
                "Perl",
                "PHP",
                "Python",
                "Ruby",
                "Scala",
                "Scheme"
            ];
            $("#searchProduct").autocomplete({
                maxResults: 10,
                source: function(query, result) {

                    $.ajax({
                        url: "<?= base_url() ?>Item/search",
                        data: {
                            search: query.term
                        },
                        dataType: "json",
                        type: "GET",
                        beforeSend: function() {

                        },
                        success: function(data) {
                            result($.map(data, function(item) {
                                return {
                                    label: item.nama_artikel,
                                    subkategori_id: item.subkategori_id,
                                    value: item.kode_product
                                };
                            }));
                        }
                    });
                },
                search: function(event, ui) {
                    
                },
                select: function(event, ui) {
                    
                    location.href = "<?= base_url() ?>item/" + ui.item.subkategori_id + "?id_product=" + ui.item.value;
                },
                scroll: true
            });
        });
    </script>
    <style>
        .ui-id-1 {
            /* top: 52.1844px;
    left: 278.02px; */
            width: 400px !important;
            /* display: none; */
        }

        ul .ui-autocomplete {
            width: 300px;
        }

        .ui-autocomplete input {
            width: 100%;
        }

        .ui-autocomplete .ui-menu-item {
            width: 100%;
        }
    </style>
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="<?= base_url() ?>">
                            <img class="img-fluid" src="<?= base_url() ?>assets/assets/icon/URBAN&CO_LOGO WHITE-01-01.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" id="searchProduct" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()" data-cf-modified-20525b49fe334d4cd5099ad2-="">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-pink">5</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" style="height: auto;max-height: 500px;overflow-x: hidden;    margin-top: -20px;" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications Tracking</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius" src="http://backend.urbanco.co.id/dashboard-urban/assets/user/user.png" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius" src="http://backend.urbanco.co.id/dashboard-urban/assets/user/user.png" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Joseph William</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius" src="http://backend.urbanco.co.id/dashboard-urban/assets/user/user.png" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius" src="http://backend.urbanco.co.id/dashboard-urban/assets/user/user.png" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius" src="http://backend.urbanco.co.id/dashboard-urban/assets/user/user.png" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-message-square"></i>
                                        <span class="badge bg-c-green">3</span>
                                    </div>
                                </div>
                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?= base_url() ?>assets/user/user.png" class="img-radius" alt="User-Profile-Image">
                                        <span><?= $this->session->userdata('firstname') ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="<?= base_url() ?>user/profile">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('auth/logout') ?>">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius" src="<?= base_url() ?>assets/assets/images/avatar-3.jpg" alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="<?= base_url() ?>assets/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="<?= base_url() ?>assets/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="<?= base_url() ?>assets/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="<?= base_url() ?>assets/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-chevron-left"></i> Josephin Doe
                    </a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="<?= base_url() ?>assets/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media-right photo-table">
                        <a href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src="<?= base_url() ?>assets/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                        </a>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <?php
                    $this->load->view('navbar-leftsidebar');
                    // echo $this->session->sess_destroy();
                    echo $contents;

                    ?>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="<?= base_url() ?>assets/email-decode.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/jquery-ui/js/jquery-ui.min.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/jquery/js/jquery.blockUI.js"></script>
    <!-- Select 2 js -->

    <!-- Multiselect js -->
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>

    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/jquery/js/jquery.blockUI.js"></script>

    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <script type="218b4fd4349dce00434f1190-text/javascript" src="<?= base_url() ?>assets/bower_components/Sortable/js/Sortable.js"></script>

    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/sweetalert/js/sweetalert.min.js"></script>

    <script src="<?= base_url() ?>assets/assets/js/jquery.mCustomScrollbar.concat.min.js" type="20525b49fe334d4cd5099ad2-text/javascript"></script>

    <script src="<?= base_url() ?>assets/assets/js/pcoded.min.js" type="20525b49fe334d4cd5099ad2-text/javascript"></script>

    <!-- i18next.min.js -->
    <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script> -->

    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <!-- sweet alert js -->
    
    <script type="text/javascript" src="<?= base_url() ?>assets/bower_components/sweetalert/js/sweetalert.min.js"></script>
  
    <script src="<?= base_url() ?>assets/bower_components/ekko-lightbox/js/ekko-lightbox.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/lightbox2/js/lightbox.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.21/pagination/full_numbers_no_ellipses.js"></script>
    <script src="https://cdn.rawgit.com/ashl1/datatables-rowsgroup/fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/pages/nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/assets/pages/nestable/custom-nestable.js" type="text/javascript"></script>

    <script src="<?= base_url() ?>assets/assets/pages/sortable-custom.js" type="218b4fd4349dce00434f1190-text/javascript"></script>
    <script src="<?= base_url() ?>assets/assets/js/vartical-layout.min.js" type="20525b49fe334d4cd5099ad2-text/javascript"></script>

    <script type="20525b49fe334d4cd5099ad2-text/javascript" src="<?= base_url() ?>assets/assets/js/script.min.js"></script>
  
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="20525b49fe334d4cd5099ad2-text/javascript"></script> -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> -->
    
    
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>


    <script>
        // function inactive/active
        function activityWatcher() {
            var secondsSinceLastActivity = 0;
            var maxInactivity = (2 * 5);
            setInterval(function() {
                secondsSinceLastActivity++;
                if (secondsSinceLastActivity > maxInactivity) {
                    cek()

                    function cek() {
                        $.ajax({
                            url: '<?= base_url() ?>Auth/is_logout/<?= $this->session->userdata("id_admin") ?>',
                            type: 'GET',
                            data: {},
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            beforeSend: function(xhr, settings) {},
                            success: function(data, text) {}
                        })
                    }
                }
            }, 1000);

            function activity() {
                secondsSinceLastActivity = 0;
                check_login('<?= $this->session->userdata("id_admin") ?>')
            }
            var activityEvents = [
                'mousedown', 'mousemove', 'keydown',
                'scroll', 'touchstart'
            ];
            activityEvents.forEach(function(eventName) {
                document.addEventListener(eventName, activity, true);
            });


        }
        // activityWatcher();
        sidebarNotif()
        // testAuth()

        function sidebarNotif() {
            $.ajax({
                url: '<?= base_url() ?>transaksi/countingNotif/',
                type: 'GET',
                data: {},
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(xhr, settings) {

                },
                success: function(data, text) {
                    
                    data.forEach(es => {
                        $("#transaksi-" + es.status).html(es.count)

                    })
                }
            })
        }

        function check_login(id) {
            $.ajax({
                url: '<?= base_url() ?>Auth/is_login/' + id,
                type: 'GET',
                data: {},
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(xhr, settings) {

                },
                success: function(data, text) {}
            })
        }

        function testAuth() {
            $.ajax({
                url: 'http://backend.urbanco.co.id/v1/slider',
                type: 'GET',
                data: {},
                dataType: 'json',
                beforeSend: function(xhr, settings) {
                    xhr.setRequestHeader('Authorization', 'Bearer <?= $this->session->userdata('access_token') ?>');
                },
                success: function(data, text) {
                    
                }
            })
        }
        // close function inactive/active
        $('document').ready(function() {


            $.ajaxSetup({
                beforeSend: function(xhr, settings) {
                    $.blockUI({
                        baseZ: 30000
                    });
                },
                complete: function(xhr, status) {
                    $.unblockUI();
                    $('.modal').css('overflow-y', 'auto');
                }
            })
        });
    </script>

    <script src="<?= base_url() ?>assets/rocket-loader.min.js" data-cf-settings="20525b49fe334d4cd5099ad2-|49" defer=""></script>
    <!-- <script type="text/javascript" src="<?= base_url() ?>assets/assets/js/script.js"></script> -->
</body>

<!-- Mirrored from colorlib.com//polygon/adminty/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Sep 2020 17:36:16 GMT -->

</html>