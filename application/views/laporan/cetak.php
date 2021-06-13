<?php
function toBulan($tanggal){
	$tanggal = explode('-',$tanggal);
	$bulan = $tanggal[0];
	$tahun = $tanggal[1];

	$bulan = str_replace('0','',$bulan);

	$namaBulan = array(
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember',
	);

	return $namaBulan[$bulan].' '.$tahun;
}
?>
<style type="text/css" media="print">
	@page { size: landscape; }
	.cetak-laporan-bulan {
		font-size: 10px;
	}
</style>

<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Laporan Perbulan</h1>
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
					<div class="card-header d-print-none">
						<button type="button" class="btn btn-outline-primary btn-sm"
						   style="float: left;" onclick="window.print()"> <i class="fa fa-file-excel-o"></i> Cetak</button>
					</div><!-- /.card-header -->
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
							<h5>Laporan Bulan <?= toBulan($bulan) ?></h5>
						</div>

						<table class="table table-bordered table-responsive cetak-laporan-bulan" style="width: 100%;">
							<thead>
							<tr>
								<th>Nama</th>
								<th>Nomor Anggota</th>
								<th>Jenis Kelamin</th>
								<th>Status</th>
								<th>Judul Buku</th>
								<th>Kode Buku</th>
								<th>Edisi </th>
								<th>Penerbit</th>
								<th>Tanggal Pinjam</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach ($laporan as $key => $value):
								?>
								<tr>
									<td><?= $value['anggota_nama'] ?></td>
									<td><?= $value['anggota_nomor'] ?></td>
									<td><?= ucwords($jenis_kelamin[$key]) ?></td>
									<td><?= ucwords($status[$key]) ?></td>
									<td><?= $value['buku_judul'] ?></td>
									<td><?= $value['buku_kode'] ?></td>
									<td><?= $value['buku_edisi'] ?></td>
									<td><?= $value['buku_penerbit'] ?></td>
									<td><?= $value['time'] ?></td>
								</tr>
							<?php
							endforeach;
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
