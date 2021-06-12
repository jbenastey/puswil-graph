<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Dimensi</h1>
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
						<a href="<?= base_url('refresh') ?>" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-refresh"></i> Refresh</a>
						<ul class="nav nav-pills ml-auto">
							<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">dim_anggota</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">dim_buku</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">dim_peminjam</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">dim_pengunjung</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">dim_waktu</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<table class="table table-bordered table-striped example1" id="dt-dimensi-anggota" style="width: 100%">
									<thead class="text-center">
									<tr>
										<th>id_anggota</th>
										<th>nama_anggota</th>
										<th>nomor_anggota</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_2">
								<table class="table table-bordered table-striped example1" id="dt-dimensi-buku" style="width: 100%">
									<thead>
									<tr>
										<th>id_buku</th>
										<th>kode_buku</th>
										<th>judul_buku</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_3">
								<table class="table table-bordered table-striped example1" id="dt-dimensi-peminjam" style="width: 100%">
									<thead class="text-center">
									<tr>
										<th>id_peminjam</th>
										<th>nama_peminjam</th>
										<th>nomor_anggota</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_4">
								<table class="table table-bordered table-striped example1" id="dt-dimensi-pengunjung" style="width: 100%">
									<thead class="text-center">
									<tr>
										<th>id_pengunjung</th>
										<th>nama_pengunjung</th>
										<th>nik_pengunjung</th>
									</tr>
									</thead>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_5">
								<table class="table table-bordered table-striped example1" id="dt-dimensi-waktu" style="width: 100%">
									<thead class="text-center">
									<tr>
										<th>id_waktu</th>
										<th>waktu</th>
										<th>hari_waktu</th>
										<th>bulan_waktu</th>
										<th>tahun_waktu</th>
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
