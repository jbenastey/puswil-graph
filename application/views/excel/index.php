<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Excel</h1>
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
					<div class="card-header d-flex p-0">
						<h3 class="card-title p-3">Data Excel</h3>
						<ul class="nav nav-pills ml-auto p-2">
							<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Anggota</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Buku</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Peminjam</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Pengunjung</a></li>
							<li class="nav-item"><a class="nav-link btn-danger text-white btn-sm" href="<?= base_url('hapus-semua') ?>" onclick="return confirm('Hapus semua data?')">Hapus Semua Data</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<table class="table table-bordered table-striped example1" id="dt-excel-anggota">
									<thead class="text-center">
									<tr>
										<th rowspan="3">Nama</th>
										<th rowspan="3">Nomor</th>
										<th colspan="6">Status</th>
									</tr>
									<tr>
										<th colspan="2">Umum</th>
										<th colspan="2">Mahasiswa</th>
										<th colspan="2">Pelajar</th>
									</tr>
									<tr>
										<th>L</th>
										<th>P</th>
										<th>L</th>
										<th>P</th>
										<th>L</th>
										<th>P</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_2">
								<table class="table table-bordered table-striped example1" id="dt-excel-buku" style="width: 100%">
									<thead>
									<tr>
										<th>ID Buku</th>
										<th>Kode Buku</th>
										<th>Judul</th>
										<th>Edisi</th>
										<th>Penerbit</th>
										<th>Deskripsi Fisik</th>
										<th>Subjek</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_3">
								<table class="table table-bordered table-striped example1 table-responsive" id="dt-excel-peminjam" width="100%">
									<thead class="text-center">
									<tr>
										<th rowspan="3">Nama</th>
										<th rowspan="3">No Anggota</th>
										<th colspan="6">Status</th>
										<th rowspan="3">000</th>
										<th rowspan="3">100</th>
										<th rowspan="3">200</th>
										<th rowspan="3">300</th>
										<th rowspan="3">400</th>
										<th rowspan="3">500</th>
										<th rowspan="3">600</th>
										<th rowspan="3">700</th>
										<th rowspan="3">800</th>
										<th rowspan="3">900</th>
										<th rowspan="3">Waktu</th>
									</tr>
									<tr>
										<th colspan="2">Umum</th>
										<th colspan="2">Mahasiswa</th>
										<th colspan="2">Pelajar</th>
									</tr>
									<tr>
										<th>L</th>
										<th>P</th>
										<th>L</th>
										<th>P</th>
										<th>L</th>
										<th>P</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_4">
								<table class="table table-bordered table-striped example1" width="100%" id="dt-excel-pengunjung">
									<thead class="text-center">
									<tr>
										<th rowspan="3">Nama</th>
										<th rowspan="3">NIK</th>
										<th colspan="6">Status</th>
									</tr>
									<tr>
										<th colspan="2">Umum</th>
										<th colspan="2">Mahasiswa</th>
										<th colspan="2">Pelajar</th>
									</tr>
									<tr>
										<th>L</th>
										<th>P</th>
										<th>L</th>
										<th>P</th>
										<th>L</th>
										<th>P</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
			</div>
		</div>
	</div>
</section>
