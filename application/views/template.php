<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Apotek Anti Corona</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Data Tables-->
        <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    
    <body class="hold-transition skin-blue sidebar-mini <?=$this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null?>">
        <!-- Site wrapper -->
        <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?=site_url('dashboard')?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>AC</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Apotek</b> Anti Corona</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav"> 
                <!-- Tasks: style can be found in dropdown.less -->
                 <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="label label-danger">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">
                            Nama Kelompok :
                            <br>1. M. Fitra Abdillah
                            <br>2. Ravly Triwardana
                            <br>3. Muhammad Fadli Fahreza
                            <br>4. Dedy Rahmat Zalukhu
                        </li>
                        <li> 
                            <ul class="menu">
                        </li> 
                    </ul>
                </li> 
                        <!-- <li class="footer">
                            <a href="#">View all tasks</a>
                        </li> -->
                    </ul>
                </li> 
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?=base_url()?>assets/dist/img/foto.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?=ucfirst($this->fungsi->user_login()->username)?></span>
                    </a>
                    <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="<?=base_url()?>assets/dist/img/foto.jpg" class="img-circle" alt="User Image">

                        <p>
                        <?=$this->fungsi->user_login()->name?>
                        <small><?=$this->fungsi->user_login()->address?></small>
                        </p>
                    </li>
                        <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                        <a href="<?=site_url('auth/logout')?>" class="btn btn-danger btn-flat">Sign out</a>
                        </div>
                    </li>
                    </ul>
                </li>
                </ul>
            </div>
            </nav>
        </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                <img src="<?=base_url()?>assets/dist/img/foto.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                <p><?=$this->fungsi->user_login()->name?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <!-- <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form> -->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                    <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('dashboard')?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li> 
                <li class="treeview <?=$this->uri->segment(1) == 'stock' || $this->uri->segment(1) == 'sale' ? 'active' : ''?>">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Transaksi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li <?=$this->uri->segment(1) == 'sale' ? 'class="active"' : ''?>>
                            <a href="<?=site_url('sale')?>"><i class="fa fa-circle-o"></i> Penjualan</a>
                        </li>
                        <li <?=$this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : ''?>>
                            <a href="<?=site_url('stock/in')?>"><i class="fa fa-circle-o"></i> Stok Masuk</a>
                        </li>
                        <li <?=$this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : ''?>>
                            <a href="<?=site_url('stock/out')?>"><i class="fa fa-circle-o"></i> Stok Keluar</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview <?=$this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active' : ''?>">
                    <a href="#">
                        <i class="fa fa-archive"></i>
                        <span>Produk</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li <?=$this->uri->segment(1) == 'category' ? 'class="active"' : ''?>><a href="<?=site_url('category')?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
                        <li <?=$this->uri->segment(1) == 'unit' ? 'class="active"' : ''?>><a href="<?=site_url('unit')?>"><i class="fa fa-circle-o"></i> Satuan</a></li>
                        <li <?=$this->uri->segment(1) == 'item' ? 'class="active"' : ''?>><a href="<?=site_url('item')?>"><i class="fa fa-circle-o"></i> Barang</a></li>
                    </ul>
                </li>
                <li <?=$this->uri->segment(1) == 'customer' ? 'class="active"' : ''?>>
                    <a href="<?=site_url('customer')?>">
                        <i class="fa fa-group"></i> <span>Pelanggan</span>
                    </a>
                </li>
                <li <?=$this->uri->segment(1) == 'supplier' ? 'class="active"' : ''?>>
                    <a href="<?=site_url('supplier')?>">
                        <i class="fa fa-truck"></i> <span>Supplier</span>
                    </a>
                </li>
                </li>
                <li class="treeview <?=$this->uri->segment(1) == 'report' ? 'active' : ''?>">
                    <a href="#">
                        <i class="fa fa-file-text"></i>
                        <span>Laporan</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li <?=$this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'sale' ? 'class="active"' : ''?>>
                            <a href="<?=site_url('report/sale')?>"><i class="fa fa-circle-o"></i> Penjualan</a>
                        </li>
                        <!-- <li><a href="<?=site_url('report/resep')?>"><i class="fa fa-circle-o"></i> Resep Dokter</a></li> -->
                    </ul>
                </li>
                <!-- ATURAN LEVEL ADMIN/KASIR -->
                <?php if($this->fungsi->user_login()->level == 1) { ?>
                <li class="header">SETTINGS</li>
                <li <?=$this->uri->segment(1) == 'user' ? 'class="active"' : ''?>><a href="<?=site_url('user')?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
                <?php } ?>
            </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- jQuery 3 -->
        <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php echo $contents ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- <footer class="main-footer">
            <div class="pull-right hidden-xs">
            <b></b>
            </div>
            <strong>Copyright &copy; 2020 <a href="https://apotekanticorona.000webhostapp.com">Apotek Anti Corona</a>.</strong> All rights
            reserved.
        </footer> -->
        
        <!-- Bootstrap 3.3.7 -->
        <script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?=base_url()?>assets/dist/js/demo.js"></script>

        <!-- Data Tables -->
        <script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <script>
        $(document).ready(function () {
            $('#table1').DataTable()
        })
        </script>

        <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })
        </script>
    </body>
</html>
