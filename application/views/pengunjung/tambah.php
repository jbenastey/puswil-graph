<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Pengunjung</h1>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						Tambah Data Pengunjung
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url('pengunjung/tambah')?>">
							<div class="card-body">
								<div class="form-group">
									<label>Kategori</label>
									<input type="text" class="form-control" name="kategori" placeholder="Kategori">
								</div>
								<div class="form-group">
									<label>Kode Klasifikasi</label>
									<input type="number" class="form-control" name="kode" placeholder="Kode">
								</div>
								<div class="form-group">
									<label>Jumlah Judul</label>
									<input type="number" class="form-control" name="judul" placeholder="Jumlah Judul">
								</div>
								<div class="form-group">
									<label>Jumlah Eksemplar</label>
									<input type="number" class="form-control" name="eksemplar" placeholder="Jumlah Eksemplar">
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
