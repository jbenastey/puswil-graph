<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pustaka Wilayah</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/flat/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="shortcut icon" href="<?=base_url()?>assets/dist/img/iconBuku2.png">
</head>
<body class="hold-transition sidebar-mini" style="">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand bg-success navbar-dark border-bottom">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
			</li>

		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
						class="fa fa-th-large"></i></a>
			</li>
			<li class="nav-item">
				<a href="<?=base_url('logout')?>" class="btn btn-outline-success" onclick="return confirm('Logout? ')"><i class="fa fa-sign-out"></i></a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-light-success elevation-4">
		<!-- Brand Logo -->
		<a href="<?= base_url() ?>" class="brand-link bg-success">
			<img src="<?=base_url()?>assets/dist/img/iconBuku2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				 style="opacity: .8">
			<span class="brand-text font-weight-light">Pustaka Wilayah</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?=base_url()?>assets/dist/img/beranda/user.png" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block">Petugas</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
					<li class="nav-item">
						<a href="<?=base_url()?>" class="nav-link <?php if ($this->uri->segment('1') == null) echo 'active'?>">
							<i class="nav-icon fa fa-home"></i>
							<p class="text">Beranda</p>
						</a>
					</li>
					<li class="nav-item has-treeview <?php if ($this->uri->segment('1') == 'mentah') echo 'menu-open'?>">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-file-excel-o"></i>
							<p>
								Data Excel
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?=base_url('mentah')?>" class="nav-link <?php if ($this->uri->segment('1') == 'mentah') echo 'active'?>">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Semua Data</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?=base_url('pilih-bulan')?>" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Data Perbulan</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('dimensi')?>" class="nav-link <?php if ($this->uri->segment('1') == 'dimensi') echo 'active'?>">
							<i class="nav-icon fa fa-file-o"></i>
							<p>Tabel Dimensi</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('fakta')?>" class="nav-link <?php if ($this->uri->segment('1') == 'fakta') echo 'active'?>">
							<i class="nav-icon fa fa-file"></i>
							<p>Tabel Fakta</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-files-o"></i>
							<p>
								Laporan
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?=base_url('laporan')?>" class="nav-link <?php if ($this->uri->segment('1') == 'laporan') echo 'active'?>">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Semua Data</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?=base_url('pilih-laporan-bulan')?>" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Data Perbulan</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('grafik')?>" class="nav-link <?php if ($this->uri->segment('1') == 'grafik') echo 'active'?>">
							<i class="nav-icon fa fa-bar-chart"></i>
							<p>Grafik</p>
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<img src="<?=base_url('assets/dist/img/16400502962_31bc7c31ae_b.jpg')?>" style="width: 100%;position: absolute;opacity: 0.1;height: max-content" alt="" class="d-print-none">
