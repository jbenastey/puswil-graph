$(document).ready(function(){
	var root = window.location.origin + '/puswil-graph/';

	$('#dt-fakta').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-fakta'
		},
		'columns': [
			{ data: 'id_anggota' },
			{ data: 'id_peminjam' },
			{ data: 'id_pengunjung' },
			{ data: 'id_buku' },
			{ data: 'id_waktu' },
		]
	});

	$('#dt-excel-anggota').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-anggota'
		},
		'columns': [
			{ data: 'anggota_nama' },
			{ data: 'anggota_nomor' },
			{ data: 'anggota_umum_l' },
			{ data: 'anggota_umum_p' },
			{ data: 'anggota_mahasiswa_l' },
			{ data: 'anggota_mahasiswa_p' },
			{ data: 'anggota_pelajar_l' },
			{ data: 'anggota_pelajar_p' },
		]
	});

	$('#dt-excel-buku').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-buku'
		},
		'columns': [
			{ data: 'buku_id' },
			{ data: 'buku_kode' },
			{ data: 'buku_judul' },
			{ data: 'buku_edisi' },
			{ data: 'buku_penerbit' },
			{ data: 'buku_fisik' },
			{ data: 'buku_subjek' },
		]
	});

	$('#dt-excel-peminjam').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-peminjam'
		},
		'columns': [
			{ data: 'peminjam_nama' },
			{ data: 'peminjam_no_anggota' },
			{ data: 'peminjam_umum_l' },
			{ data: 'peminjam_umum_p' },
			{ data: 'peminjam_mahasiswa_l' },
			{ data: 'peminjam_mahasiswa_p' },
			{ data: 'peminjam_pelajar_l' },
			{ data: 'peminjam_pelajar_p' },
			{ data: 'peminjam_klas_000' },
			{ data: 'peminjam_klas_100' },
			{ data: 'peminjam_klas_200' },
			{ data: 'peminjam_klas_300' },
			{ data: 'peminjam_klas_400' },
			{ data: 'peminjam_klas_500' },
			{ data: 'peminjam_klas_600' },
			{ data: 'peminjam_klas_700' },
			{ data: 'peminjam_klas_800' },
			{ data: 'peminjam_klas_900' },
			{ data: 'time' },
		]
	});

	$('#dt-excel-pengunjung').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-pengunjung'
		},
		'columns': [
			{ data: 'pengunjung_nama' },
			{ data: 'pengunjung_nik' },
			{ data: 'pengunjung_umum_l' },
			{ data: 'pengunjung_umum_p' },
			{ data: 'pengunjung_mahasiswa_l' },
			{ data: 'pengunjung_mahasiswa_p' },
			{ data: 'pengunjung_pelajar_l' },
			{ data: 'pengunjung_pelajar_p' },
		]
	});

	var tanggal = $('#bulan').text();
	console.log(tanggal)

	$('#dt-excel-bulan-anggota').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-bulan-anggota/' + tanggal
		},
		'columns': [
			{ data: 'anggota_nama' },
			{ data: 'anggota_nomor' },
			{ data: 'anggota_umum_l' },
			{ data: 'anggota_umum_p' },
			{ data: 'anggota_mahasiswa_l' },
			{ data: 'anggota_mahasiswa_p' },
			{ data: 'anggota_pelajar_l' },
			{ data: 'anggota_pelajar_p' },
			{ data: 'aksi' },
		]
	});

	$('#dt-excel-bulan-buku').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-bulan-buku/' + tanggal
		},
		'columns': [
			{ data: 'buku_id' },
			{ data: 'buku_kode' },
			{ data: 'buku_judul' },
			{ data: 'buku_edisi' },
			{ data: 'buku_penerbit' },
			{ data: 'buku_fisik' },
			{ data: 'buku_subjek' },
		]
	});

	$('#dt-excel-bulan-peminjam').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-bulan-peminjam/' + tanggal
		},
		'columns': [
			{ data: 'peminjam_nama' },
			{ data: 'peminjam_no_anggota' },
			{ data: 'peminjam_umum_l' },
			{ data: 'peminjam_umum_p' },
			{ data: 'peminjam_mahasiswa_l' },
			{ data: 'peminjam_mahasiswa_p' },
			{ data: 'peminjam_pelajar_l' },
			{ data: 'peminjam_pelajar_p' },
			{ data: 'peminjam_klas_000' },
			{ data: 'peminjam_klas_100' },
			{ data: 'peminjam_klas_200' },
			{ data: 'peminjam_klas_300' },
			{ data: 'peminjam_klas_400' },
			{ data: 'peminjam_klas_500' },
			{ data: 'peminjam_klas_600' },
			{ data: 'peminjam_klas_700' },
			{ data: 'peminjam_klas_800' },
			{ data: 'peminjam_klas_900' },
			{ data: 'time' },
		]
	});

	$('#dt-excel-bulan-pengunjung').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-excel-bulan-pengunjung/' + tanggal
		},
		'columns': [
			{ data: 'pengunjung_nama' },
			{ data: 'pengunjung_nik' },
			{ data: 'pengunjung_umum_l' },
			{ data: 'pengunjung_umum_p' },
			{ data: 'pengunjung_mahasiswa_l' },
			{ data: 'pengunjung_mahasiswa_p' },
			{ data: 'pengunjung_pelajar_l' },
			{ data: 'pengunjung_pelajar_p' },
		]
	});

	$('#dt-dimensi-anggota').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-anggota'
		},
		'columns': [
			{ data: 'id_anggota' },
			{ data: 'nama_anggota' },
			{ data: 'nomor_anggota' },
		]
	});

	$('#dt-dimensi-buku').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-buku'
		},
		'columns': [
			{ data: 'id_buku' },
			{ data: 'kode_buku' },
			{ data: 'judul_buku' },
		]
	});

	$('#dt-dimensi-peminjam').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-peminjam'
		},
		'columns': [
			{ data: 'id_peminjam' },
			{ data: 'nama_peminjam' },
			{ data: 'nomor_anggota' },
		]
	});

	$('#dt-dimensi-pengunjung').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': root + 'data-dimensi-pengunjung'
		},
		'columns': [
			{ data: 'id_pengunjung' },
			{ data: 'nama_pengunjung' },
			{ data: 'nik_pengunjung' },
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
			{ data: 'id_waktu' },
			{ data: 'waktu' },
			{ data: 'hari_waktu' },
			{ data: 'bulan_waktu' },
			{ data: 'tahun_waktu' },
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
			{ data: 'anggota_nama' },
			{ data: 'anggota_nomor' },
			{ data: 'anggota_jenis_kelamin' },
			{ data: 'anggota_status' },
			{ data: 'buku_judul' },
			{ data: 'buku_kode' },
			{ data: 'buku_edisi' },
			{ data: 'buku_penerbit' },
			{ data: 'time' },
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
