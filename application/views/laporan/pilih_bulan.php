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
					<div class="card-header d-flex p-0">
						<h3 class="card-title p-3">Data Laporan Perbulan</h3>
					</div><!-- /.card-header -->
					<div class="card-body">
						<form>
							<div class="modal-body">
								<fieldset class="form-group">
									<label for="basicInput">Pilih Bulan</label><br>
									<select name="bulan" class="form-control" id="pilih-laporan-bulan">
										<option selected disabled>- Pilih Bulan -</option>
										<?php
										foreach($getHapus as $key=>$value):
											?>
											<option value="<?= $value['bulan_waktu'] ?>-<?= $value['tahun_waktu'] ?>">Bulan <?= $value['bulan_waktu'] ?>, Tahun <?= $value['tahun_waktu'] ?></option>
										<?php
										endforeach;
										?>
									</select>
								</fieldset>
							</div>
							<div class="float-left">
								<button type="button" class="btn bg-light-secondary" data-dismiss="modal">Tutup</button>
								<a href="#" id="submit-laporan-bulan" type="submit" class="btn btn-primary">Lihat</a>
							</div>
						</form>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
			</div>
		</div>
</section>
