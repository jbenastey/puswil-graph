<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pustaka Wilayah</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/iCheck/square/blue.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="icon" href="<?= base_url() ?>assets/image/download.jpg" type="image/x-icon"/>
</head>
<body class="hold-transition login-page" style="background-image: url('<?=base_url('assets/dist/img/16400502962_31bc7c31ae_b.jpg')?>'); background-repeat: no-repeat;background-size:100% auto;">
<div class="login-box">
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<div class="login-logo">
				<a href="<?= base_url() ?>"><b>Sistem Informasi </b>Pustaka Wilayah</a>
			</div>
			<?php if ($this->session->flashdata('alert') == 'gagalLogin') { ?>
				<div class="alert alert-danger animated fadeInDown" role="alert">
					<button type="button" class="close" data-dismiss="alert"></button>
					Password / Username salah. Periksa kembali
				</div>
			<?php } ?>
			<p class="login-box-msg">Silahkan Login</p>

			<?php echo form_open('login', array('id' => 'formValidation')) ?>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="Username" name="username">
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder=" Masukkan Password" name="password">
			</div>
			<div class="row">
				<!-- /.col -->
				<div class="col-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Login</button>
				</div>
				<!-- /.col -->
			</div>
			</form>


			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- iCheck -->
	<script src="<?= base_url() ?>/assets/plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			})
		})
	</script>
</body>
</html>

