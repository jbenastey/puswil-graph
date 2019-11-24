<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Tabel Fakta</h1>
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
						<a href="<?= base_url('refresh_fakta') ?>" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-refresh"></i> Refresh</a>
					</div><!-- /.card-header -->
					<div class="card-body">
						<table class="table table-bordered example1">
							<thead>
							<tr>
								<th>id_anggota</th>
								<th>id_peminjam</th>
								<th>id_pengunjung</th>
								<th>id_buku</th>
								<th>id_waktu</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach($fakta as $key=>$value):
							?>
							<tr>
								<td><?= $value['id_anggota'] ?></td>
								<td><?= $value['id_peminjam'] ?></td>
								<td><?= $value['id_pengunjung'] ?></td>
								<td><?= $value['id_buku'] ?></td>
								<td><?= $value['id_waktu'] ?></td>
							</tr>
							<?php
							endforeach;
							?>
							</tbody>
						</table>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
			</div>
		</div>
</section>
