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
				<h1 class="m-0 text-dark">Grafik</h1>
				<button type="button" onclick="window.print()" class="btn btn-sm btn-outline-primary float-right"><i class="fa fa-print"></i> Cetak</button>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content" >
	<div class="container-fluid">

		<div class="cetak-grafik d-print-block" style="display: none">

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-2 float-left ml-5 mt-1">
									<img src="http://localhost/puswil-graph/assets/dist/img/riau.png" class="logo" width="110px">
								</div>
								<div class="col-9 text-center p-0 ">
									<h4 style="margin-left: -150px">PEMERINTAH DAERAH PROVINSI RIAU</h4>
									<h4 style="margin-left: -150px">DINAS PERPUSTAKAAN DAN KEARSIPAN</h4>
									<h4 style="margin-left: -150px">PERPUSTAKAAN SOEMAN HS</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-12 ml-3 mr-3 mb-0">
									<p style="margin-top: -5px;margin-bottom: -5px;font-size: 9pt;" class="text-center">Jl. Sudirman No. 462 28126 Telp/Fax (0761) 34068</p>
									<p style="margin-top: -5px;margin-bottom: -5px;font-size: 9pt;" class="text-center">Website: https://dipersip.riau.go.id Email: dipersip@riau.go.id</p>
									<p style="margin-top: -5px;font-size: 9pt;" class="text-center">PEKANBARU</p></div>
							</div>
							<hr style=" margin-top: -10px;width: 100%;border:2px solid black;background-color: black; ">
							<div class="col-12 text-center pb-2">
								<h5>Grafik</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Small boxes (Stat box) -->
		<div>
			<div class="row">
				<div class="col-lg-3 col-6">
					<div class="small-box bg-success-gradient">
						<div class="inner">
							<h4>&nbsp;<span id="buku-banyak"></span></h4>

							<p>Buku Terbanyak </p>
						</div>
						<div class="icon">
							<i class="fa fa-book"></i>
						</div>
						<a href="#banyak" class="small-box-footer d-print-none">Lihat Data <i
									class="fa fa-arrow-circle-down"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-success-gradient">
						<div class="inner">
							<h4>&nbsp;<span id="pinjam-banyak"></span></h4>
							<br>
							<br>
							<p>Peminjam Terbanyak </p>
						</div>
						<div class="icon">
							<i class="fa fa-user"></i>
						</div>
						<a href="#banyak" class="small-box-footer d-print-none">Lihat Data <i
									class="fa fa-arrow-circle-down"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-success-gradient">
						<div class="inner">
							<h4>&nbsp;<span id="anggota-banyak"></span></h4>
							<br>
							<p>Kategori Anggota Peminjam Terbanyak</p>
						</div>
						<div class="icon">
							<i class="fa fa-user"></i>
						</div>
						<a href="#banyak2" class="small-box-footer d-print-none">Lihat Data <i
									class="fa fa-arrow-circle-down"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-success-gradient">
						<div class="inner">
							<h4>&nbsp;<span id="pengunjung-banyak"></span></h4>
							<br>

							<p>Kategori Pengunjung Peminjam Terbanyak </p>
						</div>
						<div class="icon">
							<i class="fa fa-user"></i>
						</div>
						<a href="#banyak3" class="small-box-footer d-print-none">Lihat Data <i
									class="fa fa-arrow-circle-down"></i></a>
					</div>
				</div>
			</div>
			<div class="row" id="banyak2">
				<div class="col-8">
					<div class="card">
						<div class="card-body">
							<div class="chart">
								<canvas id="anggota-bar-chart" width="auto" height="280"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card">
						<div class="card-body">
							<div class="chart">
								<canvas id="anggota-pie-chart" width="auto" height="280"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="card">
						<div class="card-body">
							<div class="chart">
								<canvas id="anggota-bar-chart2" width="auto" height="280"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card">
						<div class="card-body">
							<div class="chart">
								<canvas id="anggota-pie-chart2" width="auto" height="280"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="banyak3">
				<div class="col-8">
					<div class="card">
						<div class="card-body">
							<div class="chart">
								<canvas id="pengunjung-bar-chart" width="auto" height="280"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card">
						<div class="card-body">
							<div class="chart">
								<canvas id="pengunjung-pie-chart" width="auto" height="280"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="chart">
								<canvas id="transaksi-chart" width="1000" height="280"></canvas>
							</div>
							<hr>
							<div class="chart">
								<canvas id="transaksi-chart1" width="1000" height="280"></canvas>
							</div>
							<hr>
							<div id="detail3">

							</div>
							<hr>
							<div id="transaksi-detail">

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="banyak">
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<div class="chart">
								<canvas id="buku-banyak-chart" height="1000"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<div class="chart">
								<canvas id="pinjam-banyak-chart" height="1000"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--		<div class="row" id="banyak2">-->
			<!--			<div class="col-6">-->
			<!--				<div class="card">-->
			<!--					<div class="card-body">-->
			<!--						<div class="chart">-->
			<!--							<canvas id="anggota-banyak-chart" height="1000"></canvas>-->
			<!--						</div>-->
			<!--					</div>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--			<div class="col-6">-->
			<!--				<div class="card">-->
			<!--					<div class="card-body">-->
			<!--						<div class="chart">-->
			<!--							<canvas id="pengunjung-banyak-chart" height="1000"></canvas>-->
			<!--						</div>-->
			<!--					</div>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--		</div>-->
		</div>
	</div>
</section>


