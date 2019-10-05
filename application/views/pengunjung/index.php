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
						Data Pengunjung
						<a href="<?=base_url('pengunjung/tambah')?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Tambah Data Pengunjung</a><span class="float-right">&nbsp;</span>
						<a href="<?=base_url('pengunjung/grafik')?>" class="btn btn-secondary btn-sm float-right"><i class="fa fa-bar-chart"></i> Lihat Grafik</a>

					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered table-responsive">
							<thead>
							<tr>
								<th>No</th>
								<th>Uraian</th>
								<th>Tahun</th>
								<th>Pelajar LK</th>
								<th>Pelajar PR</th>
								<th>Mahasiswa LK</th>
								<th>Mahasiswa PR</th>
								<th>Umum LK</th>
								<th>Umum PR</th>
								<th>Jumlah LK</th>
								<th>Jumlah PR</th>
								<th>Total</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($pengunjung as $key=>$value):
							?>
							<tr>
								<td><?=$no?></td>
								<td><?=$value['pengunjung_tipe']?></td>
								<td><?=$value['pengunjung_tahun']?></td>
								<td><?=$value['pengunjung_pelajar_lk']?></td>
								<td><?=$value['pengunjung_pelajar_pr']?></td>
								<td><?=$value['pengunjung_mahasiswa_lk']?></td>
								<td><?=$value['pengunjung_mahasiswa_pr']?></td>
								<td><?=$value['pengunjung_umum_lk']?></td>
								<td><?=$value['pengunjung_umum_pr']?></td>
								<td><?=$value['pengunjung_umum_lk'] + $value['pengunjung_mahasiswa_lk'] + $value['pengunjung_pelajar_lk']?>  </td>
								<td><?=$value['pengunjung_umum_pr'] + $value['pengunjung_mahasiswa_pr'] + $value['pengunjung_pelajar_pr']?>  </td>
								<td><?=$value['pengunjung_umum_lk'] + $value['pengunjung_mahasiswa_lk'] + $value['pengunjung_pelajar_lk'] + $value['pengunjung_umum_pr'] + $value['pengunjung_mahasiswa_pr'] + $value['pengunjung_pelajar_pr']?></td>
								<td>
									<a href="<?=base_url('pengunjung/edit/'.$value['pengunjung_id'])?>" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pencil"></i></a>
									<a href="<?=base_url('pengunjung/hapus/'.$value['pengunjung_id'])?>" class="btn btn-danger btn-sm" title="hapus" onclick="return confirm('hapus data pengunjung?')"><i class="fa fa-trash"></i></a>
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
