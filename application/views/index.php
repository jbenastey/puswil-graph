<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Beranda</h1>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-4 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>&nbsp;</h3>

						<p>Upload </p>
					</div>
					<div class="icon">
						<i class="ion ion-upload"></i>
					</div>
					<a class="small-box-footer" data-toggle="modal" data-target="#exampleModal">
						Upload Data <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div><div class="col-lg-4 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>&nbsp;</h3>

						<p>Data Excel</p>
					</div>
					<div class="icon">
						<i class="fa fa-file-o"></i>
					</div>
					<a href="#" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div><div class="col-lg-4 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>&nbsp;</h3>

						<p>Data Hasil </p>
					</div>
					<div class="icon">
						<i class="fa fa-file"></i>
					</div>
					<a href="#" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					<a href="<?=base_url().'excel/format/data.xlsx'?>" class="btn btn-outline-primary"><i class="fa fa-download"></i> Download Format</a>
				</div>
				<div class="form-group">
					<label>Upload</label>
					<input type="file" class="form-control" name="excel" placeholder="Kategori">
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
