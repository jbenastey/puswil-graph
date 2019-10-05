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
									<label>Tahun</label>
									<input type="number" max="2100" min="2000" class="form-control" name="tahun" placeholder="Tahun" required>
								</div>
								<div class="form-group">
									<label>Uraian</label>
									<select name="uraian" class="form-control" required>
										<option selected disabled>- Pilih Uraian -</option>
										<option value="PENGUNJUNG">Pengunjung</option>
										<option value="PEMINJAMAN">Peminjaman</option>
										<option value="PENGEMBALIAN">Pengembalian</option>
										<option value="ANGGOTA">Anggota</option>
									</select>
								</div>
								<div class="form-group">
									<label>Jumlah Pelajar Laki-Laki</label>
									<input type="number" class="form-control" name="pelajar-lk" placeholder="Pelajar Laki-Laki" required>
								</div>
								<div class="form-group">
									<label>Jumlah Pelajar Perempuan</label>
									<input type="number" class="form-control" name="pelajar-pr" placeholder="Pelajar Perempuan" required>
								</div>
								<div class="form-group">
									<label>Jumlah Mahasiswa Laki-Laki</label>
									<input type="number" class="form-control" name="mahasiswa-lk" placeholder="Mahasiswa Laki-Laki" required>
								</div>
								<div class="form-group">
									<label>Jumlah Mahasiswa Perempuan</label>
									<input type="number" class="form-control" name="mahasiswa-pr" placeholder="Mahasiswa Perempuan" required>
								</div>
								<div class="form-group">
									<label>Jumlah Pengunjung Umum Laki-Laki</label>
									<input type="number" class="form-control" name="umum-lk" placeholder="Pengunjung Laki-Laki" required>
								</div>
								<div class="form-group">
									<label>Jumlah Pengunjung Umum Perempuan</label>
									<input type="number" class="form-control" name="umum-pr" placeholder="Pengunjung Perempuan" required>
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
