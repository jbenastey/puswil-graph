$(document).ready(function(){
	var root = window.location.origin + '/dashboardapotik/';

	$('#dt-fakta').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-fakta'
		},
		'columns': [
			{ data: 'id_obat' },
			{ data: 'id_produsen' },
			{ data: 'id_ruang' },
			{ data: 'id_pasien' },
			{ data: 'id_dokter' },
			{ data: 'id_transaksi' },
			{ data: 'id_waktu' },
		]
	});

	$('#dt-excel-dokter').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-dokter'
		},
		'columns': [
			{ data: 'dokter_id' },
			{ data: 'dokter_nama' },
		]
	});

	$('#dt-excel-obat').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-obat'
		},
		'columns': [
			{ data: 'obat_id' },
			{ data: 'obat_kode' },
			{ data: 'obat_nama' },
			{ data: 'obat_golongan' },
			{ data: 'obat_bentuk' },
			{ data: 'obat_depo' },
		]
	});

	$('#dt-excel-pasien').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-pasien'
		},
		'columns': [
			{ data: 'pasien_id' },
			{ data: 'pasien_nama' },
			{ data: 'pasien_jenis_kelamin' },
			{ data: 'pasien_umur' },
		]
	});

	$('#dt-excel-produsen').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-produsen'
		},
		'columns': [
			{ data: 'produsen_id' },
			{ data: 'produsen_nama' },
		]
	});

	$('#dt-excel-ruang').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-ruang'
		},
		'columns': [
			{ data: 'ruang_id' },
			{ data: 'ruang_poliklinik' },
			{ data: 'ruang_jenis_masuk' },
		]
	});

	$('#dt-excel-transaksi').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-transaksi'
		},
		'columns': [
			{ data: 'transaksi_id' },
			{ data: 'transaksi_kelompok' },
			{ data: 'transaksi_harga' },
			{ data: 'transaksi_jumlah' },
			{ data: 'transaksi_cara_bayar' },
			{ data: 'transaksi_tanggal' },
		]
	});

	var tanggal = $('#bulan').text();

	$('#dt-excel-bulan-dokter').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-bulan-dokter/' + tanggal
		},
		'columns': [
			{ data: 'dokter_id' },
			{ data: 'dokter_nama' },
		]
	});

	$('#dt-excel-bulan-obat').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-bulan-obat/' + tanggal
		},
		'columns': [
			{ data: 'obat_id' },
			{ data: 'obat_kode' },
			{ data: 'obat_nama' },
			{ data: 'obat_golongan' },
			{ data: 'obat_bentuk' },
			{ data: 'obat_depo' },
			{ data: 'aksi' },
		]
	});

	$('#dt-excel-bulan-pasien').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-bulan-pasien/' + tanggal
		},
		'columns': [
			{ data: 'pasien_id' },
			{ data: 'pasien_nama' },
			{ data: 'pasien_jenis_kelamin' },
			{ data: 'pasien_umur' },
		]
	});

	$('#dt-excel-bulan-produsen').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-bulan-produsen/' + tanggal
		},
		'columns': [
			{ data: 'produsen_id' },
			{ data: 'produsen_nama' },
		]
	});

	$('#dt-excel-bulan-ruang').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-bulan-ruang/' + tanggal
		},
		'columns': [
			{ data: 'ruang_id' },
			{ data: 'ruang_poliklinik' },
			{ data: 'ruang_jenis_masuk' },
		]
	});

	$('#dt-excel-bulan-transaksi').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-bulan-transaksi/' + tanggal
		},
		'columns': [
			{ data: 'transaksi_id' },
			{ data: 'transaksi_kelompok' },
			{ data: 'transaksi_harga' },
			{ data: 'transaksi_jumlah' },
			{ data: 'transaksi_cara_bayar' },
			{ data: 'transaksi_tanggal' },
		]
	});

	$('#dt-dimensi-dokter').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-dokter'
		},
		'columns': [
			{ data: 'dokter_id' },
			{ data: 'dokter_nama' },
		]
	});

	$('#dt-dimensi-obat').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-obat'
		},
		'columns': [
			{ data: 'obat_id' },
			{ data: 'obat_nama' },
		]
	});

	$('#dt-dimensi-pasien').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-pasien'
		},
		'columns': [
			{ data: 'pasien_id' },
			{ data: 'pasien_nama' },
		]
	});

	$('#dt-dimensi-produsen').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-produsen'
		},
		'columns': [
			{ data: 'produsen_id' },
			{ data: 'produsen_nama' },
		]
	});

	$('#dt-dimensi-ruang').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-ruang'
		},
		'columns': [
			{ data: 'ruang_id' },
			{ data: 'ruang_poliklinik' },
		]
	});

	$('#dt-dimensi-transaksi').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-transaksi'
		},
		'columns': [
			{ data: 'transaksi_id' },
			{ data: 'transaksi_harga' },
			{ data: 'transaksi_jumlah' },
			{ data: 'transaksi_total' },
		]
	});

	$('#dt-dimensi-waktu').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-waktu'
		},
		'columns': [
			{ data: 'waktu_id' },
			{ data: 'waktu_hari' },
			{ data: 'waktu_tanggal' },
			{ data: 'waktu_bulan' },
			{ data: 'waktu_tahun' },
		]
	});

	$('#cetak').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-laporan'
		},
		'columns': [
			{ data: 'obat_kode' },
			{ data: 'obat_nama' },
			{ data: 'obat_golongan' },
			{ data: 'obat_bentuk' },
			{ data: 'obat_depo' },
			{ data: 'produsen_nama' },
			{ data: 'pasien_nama' },
			{ data: 'pasien_jenis_kelamin' },
			{ data: 'pasien_umur' },
			{ data: 'ruang_poliklinik' },
			{ data: 'ruang_jenis_masuk' },
			{ data: 'dokter_nama' },
			{ data: 'transaksi_kelompok' },
			{ data: 'transaksi_harga' },
			{ data: 'transaksi_jumlah' },
			{ data: 'transaksi_total' },
			{ data: 'transaksi_cara_bayar' },
			{ data: 'transaksi_tanggal' },
		]
	});

	$('#pilih-bulan').change(function (){
		var value = $(this).val();
		if (value !== '- Pilih Bulan -'){
			$('#submit-bulan').attr('href',root+'excel-bulan/'+value);
		} else {
			$('#submit-bulan').attr('href','#');
		}
	})

	$('#pilih-laporan-bulan').change(function (){
		var value = $(this).val();
		if (value !== '- Pilih Bulan -'){
			$('#submit-laporan-bulan').attr('href',root+'laporan-bulan/'+value);
		} else {
			$('#submit-laporan-bulan').attr('href','#');
		}
	})

});
