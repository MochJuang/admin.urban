<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
    <title>Messenger Chat Live - Urban&CO</title>

    <!-- Template core CSS -->
    <link href="<?= base_url() ?>assets/chat/css/template.min.css" rel="stylesheet">
    <style>
        .message-body {
            margin-top: -18px;
        }
    </style>
</head>
<!-- Head -->

<body>

    <div class="layout">

        <!-- Navbar -->
        <div class="navigation navbar navbar-light justify-content-center py-xl-7">

            <!-- Brand -->
            <a href="#" class="d-none d-xl-block mb-6">
                <img src="<?= base_url() ?>assets/assets/icon/FAVICON_WHITE-01.ico" class="mx-auto fill-primary" data-inject-svg="" alt="" style="height: 46px;">
            </a>

            <!-- Menu -->
            <ul class="nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between justify-content-xl-center py-3 py-lg-0" role="tablist">

                <!-- Invisible item to center nav vertically -->
                <li class="nav-item d-none d-xl-block invisible flex-xl-grow-1">
                    <a class="nav-link position-relative p-0 py-xl-3" href="#" title="">
                        <i class="icon-lg fe-x"></i>
                    </a>
                </li>

                <!-- Create group -->
                <li class="nav-item">
                    <a class="nav-link position-relative p-0 py-xl-3" data-toggle="tab" href="#tab-content-create-chat" title="Create chat" role="tab">
                        <i class="icon-lg fe-edit"></i>
                    </a>
                </li>

                <!-- Friend -->
                <li class="nav-item mt-xl-9">
                    <a class="nav-link position-relative p-0 py-xl-3" data-toggle="tab" href="#tab-content-friends" title="Friends" role="tab">
                        <i class="icon-lg fe-users"></i>
                    </a>
                </li>

                <!-- Chats -->
                <li class="nav-item mt-xl-9">
                    <a class="nav-link position-relative p-0 py-xl-3 active" data-toggle="tab" href="#tab-content-dialogs" title="Chats" role="tab">
                        <i class="icon-lg fe-message-square"></i>
                        <div class="badge badge-dot badge-primary badge-bottom-center"></div>
                    </a>
                </li>

                <!-- Profile -->
                <li class="nav-item mt-xl-9">
                    <a class="nav-link position-relative p-0 py-xl-3" data-toggle="tab" href="#tab-content-user" title="User" role="tab">
                        <i class="icon-lg fe-user"></i>
                    </a>
                </li>

                <!-- Demo only: Documentation -->
                <li class="nav-item mt-xl-9 d-none d-xl-block flex-xl-grow-1">
                    <a class="nav-link position-relative p-0 py-xl-3" data-toggle="tab" href="#tab-content-demos" title="Demos" role="tab">
                        <i class="icon-lg fe-layers"></i>
                    </a>
                </li>

                <!-- Settings -->
                <li class="nav-item mt-xl-9">
                    <a class="nav-link position-relative p-0 py-xl-3" href="settings.html" title="Settings">
                        <i class="icon-lg fe-settings"></i>
                    </a>
                </li>

            </ul>
            <!-- Menu -->

        </div>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="tab-content h-100" role="tablist">
                <div class="tab-pane fade h-100" id="tab-content-create-chat" role="tabpanel">
                    <div class="d-flex flex-column h-100">

                        <div class="hide-scrollbar">
                            <div class="container-fluid py-6">

                                <!-- Title -->
                                <h2 class="font-bold mb-6">Create group</h2>
                                <!-- Title -->


                                <form class="mb-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                        <div class="input-group-append">
                                            <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>


                                <!-- Tabs -->
                                <ul class="nav nav-tabs nav-justified mb-6" role="tablist">
                                    <li class="nav-item">
                                        <a href="#create-group-details" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Details</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#create-group-members" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Members</a>
                                    </li>
                                </ul>
                                <!-- Tabs -->

                                <!-- Create chat -->
                                <div class="tab-content" role="tablist">

                                    <!-- Chat details -->
                                    <div id="create-group-details" class="tab-pane fade show active" role="tabpanel">
                                        <form action="#">
                                            <div class="form-group">
                                                <label class="small">Photo</label>
                                                <div class="position-relative text-center bg-secondary rounded p-6">
                                                    <div class="avatar bg-primary text-white mb-5">
                                                        <i class="icon-md fe-image"></i>
                                                    </div>

                                                    <p class="small text-muted mb-0">You can upload jpg, gif or png files. <br> Max file size 3mb.</p>
                                                    <input id="upload-chat-photo" class="d-none" type="file">
                                                    <label class="stretched-label mb-0" for="upload-chat-photo"></label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="small" for="new-chat-title">Name</label>
                                                <input class="form-control form-control-lg" name="new-chat-title" id="new-chat-title" type="text" placeholder="Group Name">
                                            </div>

                                            <div class="form-group">
                                                <label class="small" for="new-chat-topic">Topic (optional)</label>
                                                <input class="form-control form-control-lg" name="new-chat-topic" id="new-chat-topic" type="text" placeholder="Group Topic">
                                            </div>

                                            <div class="form-group mb-0">
                                                <label class="small" for="new-chat-description">Description</label>
                                                <textarea class="form-control form-control-lg" name="new-chat-description" id="new-chat-description" rows="6" placeholder="Group Description"></textarea>
                                            </div>

                                        </form>
                                    </div>
                                    <!-- Chat details -->

                                    <!-- Chat Members -->
                                    <div id="create-group-members" class="tab-pane fade" role="tabpanel">
                                        <nav class="list-group list-group-flush mb-n6">

                                            <div class="mb-6">
                                                <small class="text-uppercase">A</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">

                                                        <div class="avatar avatar-online mr-5">
                                                            <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/10.jpg" alt="Anna Bridges">
                                                        </div>



                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Anna Bridges</h6>
                                                            <small class="text-muted">Online</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-1" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-1"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <label class="stretched-label" for="id-user-1"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">B</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/6.jpg" alt="Brian Dawson">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Brian Dawson</h6>
                                                            <small class="text-muted">last seen 2 hours ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-2" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-2"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <label class="stretched-label" for="id-user-2"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">L</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/5.jpg" alt="Leslie Sutton">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Leslie Sutton</h6>
                                                            <small class="text-muted">last seen 3 days ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-3" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-3"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <label class="stretched-label" for="id-user-3"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">M</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/4.jpg" alt="Matthew Wiggins">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Matthew Wiggins</h6>
                                                            <small class="text-muted">last seen 3 days ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-4" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-4"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <label class="stretched-label" for="id-user-4"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">S</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/7.jpg" alt="Simon Hensley">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Simon Hensley</h6>
                                                            <small class="text-muted">last seen 3 days ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-5" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-5"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <label class="stretched-label" for="id-user-5"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">W</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/9.jpg" alt="William Wright">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">William Wright</h6>
                                                            <small class="text-muted">last seen 3 days ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-6" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-6"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <label class="stretched-label" for="id-user-6"></label>
                                            </div>
                                            <!-- Friend -->
                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/3.jpg" alt="William Greer">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">William Greer</h6>
                                                            <small class="text-muted">last seen 10 minutes ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-7" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-7"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <label class="stretched-label" for="id-user-7"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">Z</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/7.jpg" alt="Zane Mayes">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Zane Mayes</h6>
                                                            <small class="text-muted">last seen 3 days ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-8" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-8"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <label class="stretched-label" for="id-user-8"></label>
                                            </div>
                                            <!-- Friend -->

                                        </nav>
                                    </div>
                                    <!-- Chat Members -->

                                </div>
                                <!-- Create chat -->

                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pb-6">
                            <div class="container-fluid">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Create group</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade h-100" id="tab-content-friends" role="tabpanel">
                    <div class="d-flex flex-column h-100">

                        <div class="hide-scrollbar">
                            <div class="container-fluid py-6">

                                <!-- Title -->
                                <h2 class="font-bold mb-6">Friends</h2>
                                <!-- Title -->


                                <form class="mb-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                        <div class="input-group-append">
                                            <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>


                                <!-- Button -->
                                <button type="button" class="btn btn-lg btn-block btn-secondary d-flex align-items-center mb-6" data-toggle="modal" data-target="#invite-friends">
                                    Invite friends
                                    <i class="fe-users ml-auto"></i>
                                </button>

                                <!-- Friends -->
                                <nav class="mb-n6">

                                    <div class="mb-6">
                                        <small class="text-uppercase">A</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">

                                                <div class="avatar avatar-online mr-5">
                                                    <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/10.jpg" alt="Anna Bridges">
                                                </div>


                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">Anna Bridges</h6>
                                                    <small class="text-muted">Online</small>
                                                </div>

                                                <div class="align-self-center ml-5">
                                                    <div class="dropdown z-index-max">
                                                        <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                New chat <span class="ml-auto fe-edit-2"></span>
                                                            </a>
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                Delete <span class="ml-auto fe-trash-2"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Link -->
                                            <a href="chat-2.html" class="stretched-link"></a>

                                        </div>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">B</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/6.jpg" alt="Brian Dawson">
                                                </div>

                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">Brian Dawson</h6>
                                                    <small class="text-muted">last seen 2 hours ago</small>
                                                </div>

                                                <div class="align-self-center ml-5">
                                                    <div class="dropdown z-index-max">
                                                        <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                New chat <span class="ml-auto fe-edit-2"></span>
                                                            </a>
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                Delete <span class="ml-auto fe-trash-2"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Link -->
                                            <a href="#" class="stretched-link"></a>

                                        </div>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">L</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/5.jpg" alt="Leslie Sutton">
                                                </div>

                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">Leslie Sutton</h6>
                                                    <small class="text-muted">last seen 3 days ago</small>
                                                </div>

                                                <div class="align-self-center ml-5">
                                                    <div class="dropdown z-index-max">
                                                        <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                New chat <span class="ml-auto fe-edit-2"></span>
                                                            </a>
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                Delete <span class="ml-auto fe-trash-2"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Link -->
                                            <a href="#" class="stretched-link"></a>

                                        </div>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">M</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/4.jpg" alt="Matthew Wiggins">
                                                </div>

                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">Matthew Wiggins</h6>
                                                    <small class="text-muted">last seen 3 days ago</small>
                                                </div>

                                                <div class="align-self-center ml-5">
                                                    <div class="dropdown z-index-max">
                                                        <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                New chat <span class="ml-auto fe-edit-2"></span>
                                                            </a>
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                Delete <span class="ml-auto fe-trash-2"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Link -->
                                            <a href="#" class="stretched-link"></a>

                                        </div>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">S</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/7.jpg" alt="Simon Hensley">
                                                </div>

                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">Simon Hensley</h6>
                                                    <small class="text-muted">last seen 3 days ago</small>
                                                </div>

                                                <div class="align-self-center ml-5">
                                                    <div class="dropdown z-index-max">
                                                        <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                New chat <span class="ml-auto fe-edit-2"></span>
                                                            </a>
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                Delete <span class="ml-auto fe-trash-2"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Link -->
                                            <a href="#" class="stretched-link"></a>

                                        </div>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">W</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/9.jpg" alt="William Wright">
                                                </div>

                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">William Wright</h6>
                                                    <small class="text-muted">last seen 3 days ago</small>
                                                </div>

                                                <div class="align-self-center ml-5">
                                                    <div class="dropdown z-index-max">
                                                        <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                New chat <span class="ml-auto fe-edit-2"></span>
                                                            </a>
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                Delete <span class="ml-auto fe-trash-2"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Link -->
                                            <a href="#" class="stretched-link"></a>

                                        </div>
                                    </div>
                                    <!-- Friend -->
                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/3.jpg" alt="William Greer">
                                                </div>

                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">William Greer</h6>
                                                    <small class="text-muted">last seen 10 minutes ago</small>
                                                </div>

                                                <div class="align-self-center ml-5">
                                                    <div class="dropdown z-index-max">
                                                        <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                New chat <span class="ml-auto fe-edit-2"></span>
                                                            </a>
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                Delete <span class="ml-auto fe-trash-2"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Link -->
                                            <a href="#" class="stretched-link"></a>

                                        </div>
                                    </div>
                                    <!-- Friend -->

                                    <div class="mb-6">
                                        <small class="text-uppercase">Z</small>
                                    </div>

                                    <!-- Friend -->
                                    <div class="card mb-6">
                                        <div class="card-body">

                                            <div class="media">


                                                <div class="avatar mr-5">
                                                    <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/7.jpg" alt="Zane Mayes">
                                                </div>

                                                <div class="media-body align-self-center">
                                                    <h6 class="mb-0">Zane Mayes</h6>
                                                    <small class="text-muted">last seen 3 days ago</small>
                                                </div>

                                                <div class="align-self-center ml-5">
                                                    <div class="dropdown z-index-max">
                                                        <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe-more-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                New chat <span class="ml-auto fe-edit-2"></span>
                                                            </a>
                                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                                Delete <span class="ml-auto fe-trash-2"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Link -->
                                            <a href="#" class="stretched-link"></a>

                                        </div>
                                    </div>
                                    <!-- Friend -->

                                </nav>
                                <!-- Friends -->

                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade h-100 show active" id="tab-content-dialogs" role="tabpanel">
                    <div class="d-flex flex-column h-100">

                        <div class="hide-scrollbar">
                            <div class="container-fluid py-6">

                                <!-- Title -->
                                <h2 class="font-bold mb-6">Chats</h2>
                                <!-- Title -->


                                <form class="mb-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                        <div class="input-group-append">
                                            <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-center scrollbar d-flex my-7 useradminfront" data-horizontal-scroll="">
                                </div>

                                <nav class="nav d-block list-discussions-js mb-n6 berandaItems">
                                </nav>
                                <!-- Chats -->

                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade h-100" id="tab-content-demos" role="tabpanel">
                    <div class="d-flex flex-column h-100">

                        <div class="hide-scrollbar">
                            <div class="container-fluid py-6">

                                <!-- Title -->
                                <h2 class="font-bold mb-6">Demos</h2>
                                <!-- Title -->


                                <form class="mb-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                        <div class="input-group-append">
                                            <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>


                                <!-- Card -->
                                <div class="card mb-6">
                                    <div class="card-body">

                                        <div class="media align-items-center">
                                            <div class="mr-5">
                                                <img src="<?= base_url() ?>assets/chat/images/brand.svg" class="fill-primary" data-inject-svg="" alt="" style="height: 46px; width: 46px;">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mb-0">
                                                    <a href="documentation/index.html" class="text-basic-inverse stretched-link">Documentation</a>
                                                </h5>
                                                <p>Quick setup and build tools.</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- Card -->

                                <h5 class="my-6">Chat Pages:</h5>

                                <!-- Card -->
                                <div class="card mb-6">
                                    <img class="card-img-top" alt="" src="<?= base_url() ?>assets/chat/images/demos/chat.jpg">
                                    <div class="card-body border-top">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mb-0">Light mode</h5>
                                            </div>
                                            <div class="align-self-center">
                                                <a href="index.html" class="text-muted stretched-link">
                                                    <i class="fe-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card -->

                                <!-- Card -->
                                <div class="card mb-6">
                                    <img class="card-img-top" alt="" src="<?= base_url() ?>assets/chat/images/demos/chat-dark.jpg">
                                    <div class="card-body border-top">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mb-0">Dark mode</h5>
                                            </div>
                                            <div class="align-self-center">
                                                <a href="../demo-dark/index.html" class="text-muted stretched-link">
                                                    <i class="fe-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card -->

                                <h5 class="my-6">Account Pages:</h5>

                                <!-- Card -->
                                <div class="card mb-6">
                                    <img class="card-img-top" alt="" src="<?= base_url() ?>assets/chat/images/demos/sign-in-dark.jpg">
                                    <div class="card-body border-top">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mb-0">Sign In</h5>
                                            </div>
                                            <div class="align-self-center">
                                                <a href="signin.html" class="text-muted stretched-link">
                                                    <i class="fe-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card -->

                                <!-- Card -->
                                <div class="card mb-6">
                                    <img class="card-img-top" alt="" src="<?= base_url() ?>assets/chat/images/demos/sign-up-dark.jpg">
                                    <div class="card-body border-top">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mb-0">Sign Up</h5>
                                            </div>
                                            <div class="align-self-center">
                                                <a href="signup.html" class="text-muted stretched-link">
                                                    <i class="fe-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card -->

                                <!-- Card -->
                                <div class="card mb-6">
                                    <img class="card-img-top" alt="" src="<?= base_url() ?>assets/chat/images/demos/password-reset-dark.jpg">
                                    <div class="card-body border-top">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mb-0">Password Reset</h5>
                                            </div>
                                            <div class="align-self-center">
                                                <a href="password-reset.html" class="text-muted stretched-link">
                                                    <i class="fe-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card -->

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade h-100" id="tab-content-user" role="tabpanel">
                    <div class="d-flex flex-column h-100">

                        <div class="hide-scrollbar">
                            <div class="container-fluid py-6">

                                <!-- Title -->
                                <h2 class="font-bold mb-6">Profile</h2>
                                <!-- Title -->


                                <form class="mb-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                        <div class="input-group-append">
                                            <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>


                                <!-- Card -->
                                <div class="card mb-6">
                                    <div class="card-body">
                                        <div class="text-center py-6">
                                            <!-- Photo -->
                                            <div class="avatar avatar-xl mb-5">
                                                <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/12.jpg" alt="">
                                            </div>

                                            <h5>Matthew Wiggins</h5>
                                            <p class="text-muted">Bootstrap is an open source toolkit for developing web with HTML.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card -->

                                <!-- Card -->
                                <div class="card mb-6">
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 py-6">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <p class="small text-muted mb-0">Country</p>
                                                        <p>Warsaw, Poland</p>
                                                    </div>
                                                    <i class="text-muted icon-sm fe-globe"></i>
                                                </div>
                                            </li>

                                            <li class="list-group-item px-0 py-6">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <p class="small text-muted mb-0">Phone</p>
                                                        <p>+39 02 87 21 43 19</p>
                                                    </div>
                                                    <i class="text-muted icon-sm fe-mic"></i>
                                                </div>
                                            </li>

                                            <li class="list-group-item px-0 py-6">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <p class="small text-muted mb-0">Email</p>
                                                        <p>anna@gmail.com</p>
                                                    </div>
                                                    <i class="text-muted icon-sm fe-mail"></i>
                                                </div>
                                            </li>

                                            <li class="list-group-item px-0 py-6">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <p class="small text-muted mb-0">Time</p>
                                                        <p>10:03 am</p>
                                                    </div>
                                                    <i class="text-muted icon-sm fe-clock"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Card -->

                                <!-- Card -->
                                <div class="card mb-6">
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 py-6">
                                                <a href="#" class="media text-muted">
                                                    <div class="media-body align-self-center">
                                                        Twitter
                                                    </div>
                                                    <i class="icon-sm fe-twitter"></i>
                                                </a>
                                            </li>

                                            <li class="list-group-item px-0 py-6">
                                                <a href="#" class="media text-muted">
                                                    <div class="media-body align-self-center">
                                                        Facebook
                                                    </div>
                                                    <i class="icon-sm fe-facebook"></i>
                                                </a>
                                            </li>

                                            <li class="list-group-item px-0 py-6">
                                                <a href="#" class="media text-muted">
                                                    <div class="media-body align-self-center">
                                                        Github
                                                    </div>
                                                    <i class="icon-sm fe-github"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Card -->

                                <div class="form-row">
                                    <div class="col">
                                        <!-- Button -->
                                        <button type="button" class="btn btn-lg btn-block btn-basic d-flex align-items-center">
                                            Settings
                                            <span class="fe-settings ml-auto"></span>
                                        </button>
                                    </div>

                                    <div class="col">
                                        <!-- Button -->
                                        <button type="button" class="btn btn-lg btn-block btn-basic d-flex align-items-center">
                                            Logout
                                            <span class="fe-log-out ml-auto"></span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
        <!-- Sidebar -->

        <!-- Main Content -->
        <div class="roomChat main main-visible" data-mobile-height="">


        </div>
        <!-- Main Content -->

    </div>
    <!-- Layout -->

    <!-- DropzoneJS: Template -->
    <div id="dropzone-template-js">
        <div class="col-lg-4 my-3">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="media align-items-center">

                        <div class="dropzone-file-preview">
                            <div class="avatar avatar rounded bg-secondary text-basic-inverse d-block mr-5">
                                <i class="fe-paperclip"></i>
                            </div>
                        </div>

                        <div class="dropzone-image-preview">
                            <div class="avatar avatar mr-5">
                                <img src="#" class="avatar-img rounded" data-dz-thumbnail="" alt="">
                            </div>
                        </div>

                        <div class="media-body overflow-hidden">
                            <h6 class="text-truncate small mb-0" data-dz-name></h6>
                            <p class="extra-small" data-dz-size></p>
                        </div>

                        <div class="ml-5">
                            <a href="#" class="btn btn-sm btn-link text-decoration-none text-muted" data-dz-remove>
                                <i class="fe-x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DropzoneJS: Template -->

    <!-- Modal: Invite friends -->
    <div class="modal fade" id="invite-friends" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <div class="media flex-fill">
                        <div class="icon-shape rounded-lg bg-primary text-white mr-5">
                            <i class="fe-users"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <h5 class="modal-title">Invite friends</h5>
                            <p class="small">Invite colleagues, clients and friends.</p>
                        </div>
                    </div>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <label for="invite-email" class="small">Email</label>
                            <input type="text" class="form-control form-control-lg" id="invite-email">
                        </div>

                        <div class="form-group mb-0">
                            <label for="invite-message" class="small">Invitation message</label>
                            <textarea class="form-control form-control-lg" id="invite-message" data-autosize="true"></textarea>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-lg btn-block btn-primary d-flex align-items-center">
                        Invite friend
                        <i class="fe-user-plus ml-auto"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal: Invite friends -->

    <!-- Scripts -->
    <script src="<?= base_url() ?>assets/chat/js/libs/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/chat/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/chat/js/plugins/plugins.bundle.js"></script>
    <script src="<?= base_url() ?>assets/chat/js/template.js"></script>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
    <script>
        const socket = io('http://36.91.140.211:5000/', {
            transports: ['websocket']
        });

        var DataChatKirim = {};
        $(document).ready(function() {
            $(".msg_send_btn").on('click', () => {
                alert("a")

            })
        });
        socket.on('chat:pesan', function(DataChat) {
            if (DataChatKirim.nama === DataChat.nama) {
                $(".masukSini").append(` <div class="message message-right">
                <div class="message-body">
                    <div class="message-row">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="dropdown">
                                <a class="text-muted opacity-60 mr-3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-more-vertical"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Edit <span class="ml-auto fe-edit-3"></span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Share <span class="ml-auto fe-share-2"></span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Delete <span class="ml-auto fe-trash-2"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="message-content bg-primary text-white">
                                <div>${DataChat.pesan}</div>
                                <div class="mt-1">
                                    <small class="opacity-65">8 mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`);
            } else {
                $(".masukSini").append(`
                <div class="message">
                <div class="message-body">
                    <div class="message-row">
                        <div class="d-flex align-items-center">
                            <div class="message-content bg-light">
                                
                                <div>${DataChat.pesan}</div>
                                <div class="mt-1">
                                    <small class="opacity-65">8 mins ago</small>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="text-muted opacity-60 ml-3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-more-vertical"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Edit <span class="ml-auto fe-edit-3"></span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Share <span class="ml-auto fe-share-2"></span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Delete <span class="ml-auto fe-trash-2"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
                `);

            }
        });
    </script>
    <script>
        $('document').ready(function() {
            setInterval(function() {
                b();
            }, 1000);
            a();
            beranda();
            room(0);
            $('#chat-id-1-form').submit(function(e) {
                alert("yuay")
            })
        })

        function a() {
            $.ajax({
                url: '<?= base_url() ?>User/get/<?= $this->session->userdata('id_admin') ?>',
                type: 'GET',
                data: {},
                dataType: 'json',
                async: true,
                contentType: "application/json; charset=utf-8",
                success: function(data, text) {
                    let users = ``;
                    data.forEach((element, key) => {
                        users += `<a href="#" data-id="${key}" class="d-block usersTemplate${key} text-reset mr-7 mr-lg-6">
                                        <div class="avatar usersTemplateActive${key} avatar-sm ${element.status_login != 0 && element.status_login != null && element.status_login != '' ? 'avatar-online' : ''} mb-3">
                                            <img class="avatar-img" src="http://36.91.140.211/dashboard-urban/assets/user/user.png" alt="Image Description">
                                        </div>
                                        <div class="small">${element.firstname}</div>
                                    </a>`
                    });
                    $('.useradminfront').html(users);
                }
            }).done(function(res) {
                console.log('bener')
            })
        }

        function b() {
            $.ajax({
                url: '<?= base_url() ?>User/get/<?= $this->session->userdata('id_admin') ?>',
                type: 'GET',
                data: {},
                dataType: 'json',
                async: true,
                contentType: "application/json; charset=utf-8",
                success: function(data, text) {
                    data.forEach((element, key) => {
                        if (element.status_login != 0 && element.status_login != null && element.status_login != '') {
                            if (!$(`.usersTemplateActive${key}`).hasClass('avatar-online')) {
                                $(`.usersTemplateActive${key}`).addClass('avatar-online');
                            }
                        } else {
                            if ($(`.usersTemplateActive${key}`).hasClass('avatar-online')) {
                                $(`.usersTemplateActive${key}`).removeClass('avatar-online');
                            }
                        }
                    });
                }
            });
        }

        function room(id = 0, user = 2) {
            var roomChat = '';
            if (id == 0) {
                roomChat += `<div class="chat flex-column justify-content-center text-center">
                <div class="container-xxl">

                    <div class="avatar avatar-lg mb-5">
                        <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/12.jpg" alt="">
                    </div>

                    <h6>Hey, Matthew!</h6>
                    <p>Please select a chat to start messaging.</p>
                </div>
            </div>`;
                $(".roomChat").html(roomChat);
            } else {
                $.ajax({
                    url: '<?= base_url() ?>Chat/listData/' + user,
                    type: 'GET',
                    data: {},
                    dataType: 'json',
                    async: true,
                    contentType: "application/json; charset=utf-8",
                    success: function(data, text) {
                        beranda();
                    }
                }).done(() => {
                    $.ajax({
                        url: `http://36.91.140.211:3000/v1/admin/find?id_admin=${user}&cs=${<?= $this->session->userdata('id_admin') ?>}`,
                        type: 'GET',
                        data: {},
                        dataType: 'json',
                        async: true,
                        contentType: "application/json; charset=utf-8",
                        success: function(data, text) {
                            roomChat += `
                <div id="chat-1" class="chat dropzone-form-js" data-dz-url="some.html">
                    <div class="chat-body">
                        <div class="chat-header border-bottom py-4 py-lg-6 px-lg-8">
                            <div class="container-xxl">
                                <div class="row align-items-center">
                                    <div class="col-3 d-xl-none">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a class="text-muted px-0" href="#" data-chat="open">
                                                    <i class="icon-md fe-chevron-left"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-xl-6">
                                        <div class="media text-center text-xl-left">
                                            <div class="avatar avatar-sm d-none d-xl-inline-block mr-5">
                                                <img src="<?= base_url() ?>assets/chat/images/avatars/12.jpg" class="avatar-img" alt="">
                                            </div>
                                            <div class="media-body align-self-center text-truncate">
                                                <h6 class="text-truncate mb-n1">${data.data[0].firstname}</h6>
                                                <small class="text-muted">35 members</small>
                                                <small class="text-muted mx-2"> • </small>
                                                <small class="text-muted">HTML, CSS, and Javascript Help</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <div class="collapse border-bottom px-lg-8" id="chat-1-search">
                            <div class="container-xxl py-4 py-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg" placeholder="Search this chat" aria-label="Search this chat">
                                    <div class="input-group-append">
                                        <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-content px-lg-8">
                            <div class="container-xxl py-6 py-lg-10 masukSini">
                `;
                            data.data[0].chat.forEach(res => {
                                // console.log(res)
                                if (res.tipe == 1) {
                                    roomChat += `
                                <div class="message">
                <div class="message-body">
                    <div class="message-row">
                        <div class="d-flex align-items-center">
                            <div class="message-content bg-light">
                                
                                <div>${res.isi}</div>
                                <div class="mt-1">
                                    <small class="opacity-65">8 mins ago</small>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="text-muted opacity-60 ml-3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-more-vertical"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Edit <span class="ml-auto fe-edit-3"></span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Share <span class="ml-auto fe-share-2"></span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Delete <span class="ml-auto fe-trash-2"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
                                `
                                } else {
                                    roomChat += `
                                <div class="message message-right">
                <div class="message-body">
                    <div class="message-row">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="dropdown">
                                <a class="text-muted opacity-60 mr-3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-more-vertical"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Edit <span class="ml-auto fe-edit-3"></span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Share <span class="ml-auto fe-share-2"></span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        Delete <span class="ml-auto fe-trash-2"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="message-content bg-primary text-white">
                                <div>${res.isi}</div>
                                <div class="mt-1">
                                    <small class="opacity-65">8 mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
                                `

                                }
                            })
                            roomChat += `
            </div>
                <div class="end-of-chat"></div>
            </div>
            <div class="chat-footer border-top py-4 py-lg-6 px-lg-8">
                <div class="container-xxl">
                    <form id="chat-id-1-form" action="" data-emoji-form="">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <div class="input-group">
                                    <textarea id="chat-id-1-input"  class="form-control bg-transparent border-0 write_msg" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true" required></textarea>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-ico btn-primary rounded-circle msg_send_btn" onclick="kirim(${user})" type="button">
                                    <span class="fe-send"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>`;
                            $(".roomChat").html(roomChat);
                        }
                    });

                });


                //isi

                //tanggal
                // <div class="message-divider my-9 mx-lg-5">
                //     <div class="row align-items-center">
                //         <div class="col">
                //             <hr>
                //         </div>
                //         <div class="col-auto">
                //             <small class="text-muted">Today</small>
                //         </div>
                //         <div class="col">
                //             <hr>
                //         </div>
                //     </div>
                // </div>`

            }


        }

        function listChat() {

        }

        function kirim(user) {
            DataChatKirim.nama = "<?= $this->session->userdata('username') ?>";
            DataChatKirim.pesan = $(".write_msg").val();
            socket.emit('chat:pesan', DataChatKirim);
            $('.write_msg').val('');
            let datasend = {
                user_id: user,
                isi: $(".write_msg").val(),
                cs_id: '<?= $this->session->userdata('id_admin') ?>'
            }
            $.ajax({
                url: '<?= base_url() ?>Chat/add/',
                type: 'post',
                dataType: "json",
                data: datasend,
                contentType: "application/json; charset=utf-8",
                success: function(data, text) {
                    console.log(data)
                }
            });
        }

        function beranda() {
            $.ajax({
                url: '<?= base_url() ?>Chat/get/<?= $this->session->userdata('id_admin') ?>',
                type: 'GET',
                data: {},
                dataType: 'json',
                async: true,
                contentType: "application/json; charset=utf-8",
                success: function(data, text) {
                    var kumpulan = ``;
                    console.log(data)
                    data.forEach((element, key) => {
                        kumpulan += ` <a class="text-reset nav-link p-0 mb-6" href="javascript:;" onClick="room(1, ${element.user_id})">
                                        <div class="card card-active-listener">
                                            <div class="card-body">

                                                <div class="media">


                                                    <div class="avatar mr-5">
                                                        <img class="avatar-img" src="<?= base_url() ?>assets/chat/images/avatars/11.jpg" alt="Bootstrap Themes">
                                                    </div>

                                                    <div class="media-body overflow-hidden">
                                                        <div class="d-flex align-items-center mb-1">
                                                            <h6 class="text-truncate mb-0 mr-auto">${element.firstname}</h6>
                                                            <p class="small text-muted text-nowrap ml-4">10:42 am</p>
                                                        </div>
                                                        <div class="text-truncate">${element.isi}</div>
                                                    </div>

                                                </div>


                                            </div>

                                            
                                            <div class="${element.status_chat ==1 ? 'badge badge-circle badge-primary badge-border-light badge-top-right': ''  }">
                                                <span>${element.status_chat ==1 ? element.jumlah:''}</span>
                                            </div>
                                            
                                        </div>
                                    </a>`;
                    });
                    $('.berandaItems').html(kumpulan)
                }
            });
        }
    </script>

</body>

</html>