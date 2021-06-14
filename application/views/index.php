<style type="text/css" media="print">
	@page { size: landscape; }
	.cetak-grafik{
		display: block;
	}
</style>
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6 col-lg-12">
				<h1 class="m-0 text-dark">Beranda</h1>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content" >
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row d-print-none">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h3>Selamat Datang Petugas</h3>
						<hr>
						<div class="row">
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box">
									<div class="inner">
										<img src="<?= base_url('assets/dist/img/beranda/1486505253-folder-folder-up-folder-upload-update-folder-upload_81427.png') ?>" alt="" style="width: 100%;padding: 7%">
									</div>
									<a class="small-box-footer" data-toggle="modal" data-target="#exampleModal">
										Upload Data <i class="fa fa-arrow-circle-right"></i>
									</a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box">
									<div class="inner">
										<img src="<?= base_url('assets/dist/img/beranda/Excel2_35735.png') ?>" alt="" style="width: 100%;padding: 6%">
									</div>
									<a href="<?= base_url('mentah') ?>" class="small-box-footer text-dark">Data Excel <i
											class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box">
									<div class="inner">
										<img src="<?= base_url('assets/dist/img/beranda/book_open_book_read_icon_186999.png') ?>" alt="" style="width: 100%;padding: 7%">
									</div>
									<a href="<?= base_url('dimensi') ?>" class="small-box-footer text-dark">Data Dimensi <i
											class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box">
									<div class="inner">
										<img src="<?= base_url('assets/dist/img/beranda/book_open_book_read_icon_186989.png') ?>" alt="" style="width: 100%;padding: 7%">
									</div>
									<a href="<?= base_url('fakta') ?>" class="small-box-footer text-dark">Data Fakta <i
											class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Excel</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('upload') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<a href="<?= base_url() . 'excel/formats/data.xlsx' ?>" class="btn btn-outline-primary"><i
								class="fa fa-download"></i> Download Format</a>
					</div>
					<div class="form-group">
						<label>Upload</label>
						<input type="file" class="form-control" name="excel" placeholder="Kategori"><br>
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h6><i class="icon fa fa-info"></i> Pastikan jumlah baris data pada setiap sheet sama!</h6>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="upload" class="btn btn-primary">Upload</button>
				</div>
			</form>
		</div>
	</div>
</div>
