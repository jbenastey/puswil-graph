<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Buku</h1>
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
						Data Buku
						<a href="<?=base_url('buku/tambah')?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Tambah Data Buku</a><span class="float-right">&nbsp;</span>
						<a href="<?=base_url('buku/grafik')?>" class="btn btn-secondary btn-sm float-right"><i class="fa fa-bar-chart"></i> Lihat Grafik</a>
					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered">
							<thead>
							<tr>
								<th>No</th>
								<th>Kategori</th>
								<th>Kode</th>
								<th>Jumlah Judul</th>
								<th>Jumlah Eksemplar</th>
								<th>Total</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($buku as $key=>$value):
							?>
							<tr>
								<td><?=$no?></td>
								<td><?=$value['buku_kategori']?></td>
								<td><?=$value['buku_kode_klasifikasi']?></td>
								<td><?=$value['buku_jumlah_judul']?></td>
								<td><?=$value['buku_jumlah_eksemplar']?></td>
								<td><?=$value['buku_jumlah_judul'] + $value['buku_jumlah_eksemplar']?></td>
								<td>
									<a href="<?=base_url('buku/edit/'.$value['buku_id'])?>" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pencil"></i></a>
									<a href="<?=base_url('buku/hapus/'.$value['buku_id'])?>" class="btn btn-danger btn-sm" title="hapus" onclick="return confirm('hapus data buku?')"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<?php
							$no++;
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
