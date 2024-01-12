<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{!! asset('admin/dist/img/1.jpg') !!}" />
    <title>Dr Rina</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/fontawesome-free/css/all.min.css') !!}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('admin/dist/css/adminlte.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/jqvmap/jqvmap.min.css') !!}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/daterangepicker/daterangepicker.css') !!}">
    <!-- summernote -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/summernote/summernote-bs4.min.css') !!}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/select2/css/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">
</head>
<body class="hold-transition sidebar-mini layout-fixed"">

<div id="app">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{!! asset('admin/dist/img/1.jpg') !!}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{!! route('home') !!}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=url('tipe_kontak/list/-1');?>" class="nav-link">Kontak</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <!--<form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>-->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{!! asset('admin/dist/img/user1-128x128.jpg') !!}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{!! asset('admin/dist/img/user1-128x128.jpg') !!}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{!! asset('admin/dist/img/user1-128x128.jpg') !!}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('logout') !!}" role="button">
                        <i class="nav-icon fa fa-door-closed"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-white elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{!! asset('admin/dist/img/1.jpg') !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dr Rina</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{!! asset('/images/user/'.Auth::User()->images) !!}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{!! Auth::User()->username !!}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <!--<li class="nav-header">Master Data</li>-->
                        <?php
                        $user = \Illuminate\Foundation\Auth\User::find(Auth::user()->id);
                        $conn=\Illuminate\Support\Facades\DB::connection();
                        $sqlMenu="SELECT m_menu_detail.m_menu_group_id,
                        m_menu_group.nama AS grup,
                        m_menu_detail.m_menu_sub_id,
                        m_menu_sub.nama AS sub,
                        m_menu_detail.nama AS menu,
                        m_menu_detail.route_name,
                        m_menu_detail.icon
                        FROM users_menu
                        INNER JOIN m_menu_detail ON m_menu_detail.m_menu_detail_id=users_menu.m_menu_detail_id AND m_menu_detail.active=1
                        LEFT JOIN m_menu_group ON m_menu_group.m_menu_group_id=m_menu_detail.m_menu_group_id AND m_menu_group.active=1
                        LEFT JOIN m_menu_sub ON m_menu_sub.m_menu_sub_id=m_menu_detail.m_menu_sub_id AND m_menu_sub.active=1
                        WHERE users_menu.users_id=".$user->id."
                        AND users_menu.read_=1
                        AND m_menu_detail.m_menu_group_id IS NULL
                        ORDER BY m_menu_group.nama ASC,
                        m_menu_sub.nama ASC,
                        m_menu_detail.nama ASC";
                        $dataMenu=$conn->select($sqlMenu);
                        //echo $dataMenu;die;

                        $sqlGrup="SELECT m_menu_detail.m_menu_group_id,
                    m_menu_group.nama AS grup,m_menu_group.icon
                    FROM users_menu
                    INNER JOIN m_menu_detail ON m_menu_detail.m_menu_detail_id=users_menu.m_menu_detail_id AND m_menu_detail.active=1 AND m_menu_detail.m_menu_group_id IS NOT NULL
                    INNER JOIN m_menu_group ON m_menu_group.m_menu_group_id=m_menu_detail.m_menu_group_id AND m_menu_group.active=1
                    WHERE users_menu.users_id=".$user->id."
                    AND users_menu.read_=1
                    GROUP BY m_menu_detail.m_menu_group_id,
                    m_menu_group.nama,m_menu_group.icon
                    ORDER BY m_menu_detail.m_menu_group_id";
                        $dataGroup=$conn->select($sqlGrup);

                        $sqlSub="SELECT m_menu_detail.m_menu_group_id,
                    m_menu_group.nama AS grup,
                    m_menu_detail.m_menu_sub_id,
                    m_menu_sub.nama AS sub,
                    m_menu_sub.icon
                    FROM users_menu
                    INNER JOIN m_menu_detail ON m_menu_detail.m_menu_detail_id=users_menu.m_menu_detail_id AND m_menu_detail.active=1 AND m_menu_detail.m_menu_group_id IS NOT NULL AND m_menu_detail.m_menu_sub_id IS NOT NULL
                    INNER JOIN m_menu_group ON m_menu_group.m_menu_group_id=m_menu_detail.m_menu_group_id AND m_menu_group.active=1
                    INNER JOIN m_menu_sub ON m_menu_sub.m_menu_sub_id=m_menu_detail.m_menu_sub_id AND m_menu_sub.active=1
                    WHERE users_menu.users_id=".$user->id."
                    AND users_menu.read_=1
                    GROUP BY m_menu_sub.no_urut, m_menu_sub.nama,m_menu_detail.m_menu_group_id,
                    m_menu_group.nama,m_menu_sub.icon,
                    m_menu_detail.m_menu_sub_id
                    ORDER BY m_menu_sub.no_urut, m_menu_sub.nama asc";
                        $dataSub=$conn->select($sqlSub);

                        $sqlMenu="SELECT m_menu_detail.m_menu_group_id,
                    m_menu_group.nama AS grup,
                    m_menu_detail.m_menu_sub_id,
                    m_menu_sub.nama AS sub,
                    m_menu_detail.nama AS menu,
                    m_menu_detail.route_name,
                    m_menu_detail.icon
                    FROM users_menu
                    INNER JOIN m_menu_detail ON m_menu_detail.m_menu_detail_id=users_menu.m_menu_detail_id AND m_menu_detail.active=1
                    LEFT JOIN m_menu_group ON m_menu_group.m_menu_group_id=m_menu_detail.m_menu_group_id AND m_menu_group.active=1
                    LEFT JOIN m_menu_sub ON m_menu_sub.m_menu_sub_id=m_menu_detail.m_menu_sub_id AND m_menu_sub.active=1
                    WHERE users_menu.users_id=".$user->id."
                    AND users_menu.read_=1
                    AND m_menu_detail.m_menu_group_id IS NOT NULL
                    ORDER BY m_menu_detail.no_urut, m_menu_group.nama ASC,
                    m_menu_sub.nama ASC,
                    m_menu_detail.nama ASC";
                        $dataMenu=$conn->select($sqlMenu);

                        foreach ($dataGroup AS $dg){
                        ?>
                        <li class="nav-header"><i class=" {!! $dg->icon !!} "></i> {!! $dg->grup !!}</li>
                        <li class="nav-item">
                            <?php
                            $sqlMenuDetail="SELECT m_menu_detail.m_menu_group_id,
                                            m_menu_group.nama AS grup,
                                            m_menu_detail.m_menu_sub_id,
                                            m_menu_detail.nama AS menu,
                                            m_menu_detail.route_name,
                                            m_menu_detail.icon
                                            FROM users_menu
                                            INNER JOIN m_menu_detail ON m_menu_detail.m_menu_detail_id=users_menu.m_menu_detail_id AND m_menu_detail.active=1
                                            LEFT JOIN m_menu_group ON m_menu_group.m_menu_group_id=m_menu_detail.m_menu_group_id AND m_menu_group.active=1
                                            WHERE users_menu.users_id=".$user->id."
                                            AND users_menu.read_=1 AND m_menu_detail.m_menu_sub_id is null
                                            AND m_menu_detail.m_menu_group_id=".$dg->m_menu_group_id."
                                            ORDER BY m_menu_detail.no_urut,m_menu_group.nama ASC,
                                            m_menu_detail.nama ASC";
                            $dataMenuDetail=$conn->select($sqlMenuDetail);

                            foreach ($dataMenuDetail as $dmd){
                            ?>
                            <a href="{!! url($dmd->route_name)!!}" class="nav-link">
                                <i class=" {!! $dmd->icon !!} "></i>
                                <p> {!! $dmd->menu !!} </p>
                            </a>
                        <?php
                        }

                        foreach ($dataSub as $ds){
                        if($ds->m_menu_group_id==$dg->m_menu_group_id){
                        ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class=" {!! $ds->icon !!} "></i>
                                <p> {!! $ds->sub !!} <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <?php
                            $sqlMenuSub="SELECT m_menu_detail.m_menu_group_id,
                                                    m_menu_group.nama AS grup,
                                                    m_menu_detail.m_menu_sub_id,
                                                    m_menu_sub.nama AS sub,
                                                    m_menu_detail.nama AS menu,
                                                    m_menu_detail.route_name,
                                                    m_menu_detail.icon
                                                    FROM users_menu
                                                    INNER JOIN m_menu_detail ON m_menu_detail.m_menu_detail_id=users_menu.m_menu_detail_id AND m_menu_detail.active=1
                                                    LEFT JOIN m_menu_group ON m_menu_group.m_menu_group_id=m_menu_detail.m_menu_group_id AND m_menu_group.active=1
                                                    LEFT JOIN m_menu_sub ON m_menu_sub.m_menu_sub_id=m_menu_detail.m_menu_sub_id AND m_menu_sub.active=1
                                                    WHERE users_menu.users_id=".$user->id."
                                                    AND users_menu.read_=1 AND m_menu_detail.m_menu_sub_id=".$ds->m_menu_sub_id."
                                                    AND m_menu_detail.m_menu_group_id IS NOT NULL
                                                    ORDER BY m_menu_sub.no_urut asc,m_menu_detail.no_urut asc,m_menu_sub.nama ASC,
                                                    m_menu_group.nama ASC,
                                                    m_menu_detail.nama ASC";
                            $dataMenuSub=$conn->select($sqlMenuSub);

                            foreach($dataMenuSub as $dms){
                            ?>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=" {!! url($dms->route_name) !!} " class="nav-link">
                                        <i class=" {!! $dms->icon !!} "></i>
                                        <p> {!! $dms->menu !!} </p>
                                    </a>
                                </li>
                            </ul>
                            <?php
                            }
                            ?>
                        </li>
                        <?php
                        }
                        }
                        ?>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <main class="py-4">
                                @yield('content')
                            </main>
                        </div>
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 - {!! date('Y') !!} <a href="">Dr Rina</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.1
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
</div>


<!-- jQuery -->
<script src="{!! asset('admin/plugins/jquery/jquery.min.js') !!}"></script>
<!-- Bootstrap 4 -->
<script src="{!! asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('admin/dist/js/adminlte.min.js') !!}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{!! asset('admin/plugins/jquery-ui/jquery-ui.min.js') !!}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="{!! asset('admin/plugins/chart.js/Chart.min.js') !!}"></script>
<!-- Sparkline -->
<script src="{!! asset('admin/plugins/sparklines/sparkline.js') !!}"></script>
<!-- JQVMap -->
<script src="{!! asset('admin/plugins/jqvmap/jquery.vmap.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') !!}"></script>
<!-- jQuery Knob Chart -->
<script src="{!! asset('admin/plugins/jquery-knob/jquery.knob.min.js') !!}"></script>
<!-- daterangepicker -->
<script src="{!! asset('admin/plugins/moment/moment.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{!! asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}"></script>
<!-- Summernote -->
<script src="{!! asset('admin/plugins/summernote/summernote-bs4.min.js') !!}"></script>
<!-- overlayScrollbars -->
<script src="{!! asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! asset('admin/dist/js/pages/dashboard.js') !!}"></script>
<!-- Select2 -->
<script src="{!! asset('admin/plugins/select2/js/select2.full.min.js') !!}"></script>
<!-- DataTables  & Plugins -->
<script src="{!! asset('admin/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/jszip/jszip.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/pdfmake/pdfmake.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/pdfmake/vfs_fonts.js') !!}"></script>
<script src="{!! asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') !!}"></script>
<script src="{!! asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}"></script>
<script>
    $(function () {
        $('#example1').DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example3').DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

        $('#example4').DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>
</body>
</html>
