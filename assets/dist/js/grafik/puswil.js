$(document).ready(function () {
	'use strict';
	var root = window.location.origin + '/puswil-graph/';

	var ticksStyle = {
		fontColor: '#495057',
		fontStyle: 'bold'
	};

	var mode = 'index';
	var intersect = true;

	$.ajax({
		url: root + 'grafik_anggota',
		type: 'GET',
		async: true,
		cache: false,
		dataType: 'json',
		success: function (response) {
			console.log(response.mahasiswa,response.pelajar,response.umum);
			var anggotaMax = Math.max(response.mahasiswa,response.pelajar,response.umum);
			var anggotaBanyak = '';
			if (anggotaMax === response.mahasiswa){
				anggotaBanyak = 'Mahasiswa';
			} else if (anggotaMax === response.pelajar){
				anggotaBanyak = 'Pelajar';
			} else if (anggotaMax === response.umum){
				anggotaBanyak = 'Umum';
			}

			$('#anggota-banyak').html(anggotaBanyak);
			console.log(Math.max(response.mahasiswa,response.pelajar,response.umum));
			var anggota_bar = $('#anggota-bar-chart');
			var salesChart = new Chart(anggota_bar, {
				type: 'bar',
				data: {
					labels: ["Mahasiswa", "Umum", "Pelajar"],
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:[
								"#ffd200",
								"#00a902",
								"#DC143C",
							],
							borderColor:[
								"#ffd200",
								"#00a902",
								"#DC143C",
							],
							data: [
								response.mahasiswa,
								response.umum,
								response.pelajar,]
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Anggota Berdasarkan Kategori',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						yAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});
			var anggota_pie = $('#anggota-pie-chart');
			var salesChart2 = new Chart(anggota_pie, {
				type: 'pie',
				data: {
					labels: ["Mahasiswa", "Umum", "Pelajar"],
					datasets: [
						{
							label: 'bentuk',
							backgroundColor: [
								"#ffd200",
								"#00a902",
								"#DC143C",],
							borderColor: [
								"#ffd200",
								"#00a902",
								"#DC143C",],
							data: [
								response.mahasiswa,
								response.umum,
								response.pelajar,
							]
						}]

				},
				options: {
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect,
						callbacks: {
							label: function(tooltipItem, data) {
								var dataset = data.datasets[tooltipItem.datasetIndex];
								var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
									return previousValue + currentValue;
								});
								var currentValue = dataset.data[tooltipItem.index];
								var percentage = Math.floor(((currentValue/total) * 100)+0.5);
								return percentage + "%";
							}
						}
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Persentasi Anggota Berdasarkan Kategori'
					},
					legend: {
						display: true,
						position: 'bottom',
					},
				}
			});
			var anggota_bar2 = $('#anggota-bar-chart2');
			var salesChart = new Chart(anggota_bar2, {
				type: 'bar',
				data: {
					labels: ["Laki-laki", "Perempuan"],
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:[
								"#0011de",
								"#ff00d8",,
							],
							borderColor:[
								"#0011de",
								"#ff00d8",,
							],
							data: [
								response.pria,
								response.wanita,]
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Anggota Berdasarkan Jenis Kelamin',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						yAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});
			var anggota_pie2 = $('#anggota-pie-chart2');
			var salesChart2 = new Chart(anggota_pie2, {
				type: 'pie',
				data: {
					labels: ["Laki-laki", "Perempuan"],
					datasets: [
						{
							label: 'bentuk',
							backgroundColor: [
								"#0011de",
								"#ff00d8",],
							borderColor: [
								"#0011de",
								"#ff00d8",],
							data: [
								response.pria,
								response.wanita,
							]
						}]

				},
				options: {
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect,
						callbacks: {
							label: function(tooltipItem, data) {
								var dataset = data.datasets[tooltipItem.datasetIndex];
								var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
									return previousValue + currentValue;
								});
								var currentValue = dataset.data[tooltipItem.index];
								var percentage = Math.floor(((currentValue/total) * 100)+0.5);
								return percentage + "%";
							}
						}
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Persentasi Anggota Berdasarkan Jenis Kelamin'
					},
					legend: {
						display: true,
						position: 'bottom',
					},
				}
			});
		}
	});

	$.ajax({
		url: root + 'grafik_pengunjung',
		type: 'GET',
		async: true,
		cache: false,
		dataType: 'json',
		success: function (response) {
			console.log(response);

			var pengunjungMax = Math.max(response.mahasiswa,response.pelajar,response.umum);
			var pengunjungBanyak = '';
			if (pengunjungMax === response.mahasiswa){
				pengunjungBanyak = 'Mahasiswa';
			} else if (pengunjungMax === response.pelajar){
				pengunjungBanyak = 'Pelajar';
			} else if (pengunjungMax === response.umum){
				pengunjungBanyak = 'Umum';
			}

			$('#pengunjung-banyak').html(pengunjungBanyak);

			var anggota_bar = $('#pengunjung-bar-chart');
			var salesChart = new Chart(anggota_bar, {
				type: 'bar',
				data: {
					labels: ["Mahasiswa", "Umum", "Pelajar"],
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:[
								"#ffd200",
								"#00a902",
								"#DC143C",
							],
							borderColor:[
								"#ffd200",
								"#00a902",
								"#DC143C",
							],
							data: [
								response.mahasiswa,
								response.umum,
								response.pelajar,]
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Pengunjung Berdasarkan Kategori',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						yAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});
			var anggota_pie = $('#pengunjung-pie-chart');
			var salesChart2 = new Chart(anggota_pie, {
				type: 'pie',
				data: {
					labels: ["Mahasiswa", "Umum", "Pelajar"],
					datasets: [
						{
							label: 'bentuk',
							backgroundColor: [
								"#ffd200",
								"#00a902",
								"#DC143C",],
							borderColor: [
								"#ffd200",
								"#00a902",
								"#DC143C",],
							data: [
								response.mahasiswa,
								response.umum,
								response.pelajar,
							]
						}]

				},
				options: {
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect,
						callbacks: {
							label: function(tooltipItem, data) {
								var dataset = data.datasets[tooltipItem.datasetIndex];
								var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
									return previousValue + currentValue;
								});
								var currentValue = dataset.data[tooltipItem.index];
								var percentage = Math.floor(((currentValue/total) * 100)+0.5);
								return percentage + "%";
							}
						}
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Persentasi Pengunjung Berdasarkan Kategori'
					},
					legend: {
						display: true,
						position: 'bottom',
					},
				}
			});
		}
	});

	var d = new Date();
	grafik_tahun(d.getFullYear());

	$('#tahun').change(function () {
		var tahun = $(this).val();
		grafik_tahun(tahun);
	});

	function grafik_tahun(tahun){
		$.ajax({
			url: root + 'grafik_waktu/'+tahun,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				var peminjam_line = $('#peminjam-line-chart');
				var salesChart = new Chart(peminjam_line, {
					type: 'line',
					data: {
						labels: ["Januari", "Februari", "Maret", "April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
						datasets: [
							{
								label: 'jumlah',
								backgroundColor:
									"rgba(222,184,135,0.4)",
								borderColor:
									"#DEB887",
								data: [
									response.jan,
									response.feb,
									response.mar,
									response.apr,
									response.mei,
									response.jun,
									response.jul,
									response.agu,
									response.sep,
									response.okt,
									response.nov,
									response.des,
								]
							}]
					},
					options: {
						onClick: function (event, array) {
							let element = this.getElementAtEvent(event);
							if (element.length > 0) {
								var series = element[0]._model.datasetLabel;
								var label = element[0]._model.label;
								var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
								obat_tahun(label);
							}
						}
						,
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Jumlah Peminjaman Tahun '+tahun,
						},
						legend: {
							display: true,
							position: 'bottom',
						},
						scales: {
							yAxes:[{
								ticks: {
									beginAtZero : true
								}
							}]
						}
					}
				});
			}
		});
	}

	$.ajax({
		url: root + 'banyak',
		type: 'GET',
		async: true,
		cache: false,
		dataType: 'json',
		success: function (response) {
			console.log(response.anggota[0]);
			console.log(response.pengunjung[0]);
			var anggotaBanyak = null;
			if (response.anggota[0].anggota_umum_l == 1){
				anggotaBanyak = 'Umum';
				if (response.anggota[0].anggota_umum_p == 1){
					anggotaBanyak = 'Umum';
				}
			}else if (response.anggota[0].anggota_mahasiswa_l == 1){
				anggotaBanyak = 'Mahasiswa';
				if (response.anggota[0].anggota_mahasiswa_p == 1){
					anggotaBanyak = 'Mahasiswa';
				}
			}else if (response.anggota[0].anggota_pelajar_l == 1){
				anggotaBanyak = 'Pelajar';
				if (response.anggota[0].anggota_pelajar_p == 1){
					anggotaBanyak = 'Pelajar';
				}
			}
			var pengunjungBanyak = null;
			if (response.pengunjung[0].pengunjung_umum_l == 1){
				pengunjungBanyak = 'Umum';
				if (response.pengunjung[0].pengunjung_umum_p == 1){
					pengunjungBanyak = 'Umum';
				}
			}else if (response.pengunjung[0].pengunjung_mahasiswa_l == 1){
				pengunjungBanyak = 'Mahasiswa';
				if (response.pengunjung[0].pengunjung_mahasiswa_p == 1){
					pengunjungBanyak = 'Mahasiswa';
				}
			}else if (response.pengunjung[0].pengunjung_pelajar_l == 1){
				pengunjungBanyak = 'Pelajar';
				if (response.pengunjung[0].pengunjung_pelajar_p == 1){
					pengunjungBanyak = 'Pelajar';
				}
			}
			console.log(anggotaBanyak);
			console.log(pengunjungBanyak);
			$('#buku-banyak').html(response.buku[0].buku_judul +'<br>'+response.buku[0].buku_kode);
			$('#pinjam-banyak').html(response.pinjam[0].peminjam_nama);

			var buku = [];
			var jumlahBuku = [];
			if (response.buku.length < 10){
				for (var i = 0; i < response.buku.length; i++) {
					buku.push(response.buku[i].buku_judul+'/'+response.buku[i].buku_kode);
					jumlahBuku.push(response.buku[i].total)
				}
			} else {
				for (var i = 0; i < 10; i++) {
					buku.push(response.buku[i].buku_judul+'/'+response.buku[i].buku_kode);
					jumlahBuku.push(response.buku[i].total)
				}
			}

			var pinjam = [];
			var jumlahPinjam = [];
			if (response.pinjam.length < 10){
				for (var i = 0; i < response.pinjam.length; i++) {
					pinjam.push(response.pinjam[i].peminjam_nama);
					jumlahPinjam.push(response.pinjam[i].total)
				}
			} else {
				for (var i = 0; i < 10; i++) {
					pinjam.push(response.pinjam[i].peminjam_nama);
					jumlahPinjam.push(response.pinjam[i].total)
				}
			}

			var anggota = [];
			var jumlahAnggota = [];
			if (response.anggota.length < 10){
				for (var i = 0; i < response.anggota.length; i++) {
					anggota.push(response.anggota[i].anggota_nama);
					jumlahAnggota.push(response.anggota[i].total)
				}
			} else {
				for (var i = 0; i < 10; i++) {
					anggota.push(response.anggota[i].anggota_nama);
					jumlahAnggota.push(response.anggota[i].total)
				}
			}

			var pengunjung = [];
			var jumlahPengunjung = [];
			if (response.pengunjung.length < 10){
				for (var i = 0; i < response.pengunjung.length; i++) {
					pengunjung.push(response.pengunjung[i].pengunjung_nama);
					jumlahPengunjung.push(response.pengunjung[i].total)
				}
			} else {
				for (var i = 0; i < 10; i++) {
					pengunjung.push(response.pengunjung[i].pengunjung_nama);
					jumlahPengunjung.push(response.pengunjung[i].total)
				}
			}

			var buku_chart = $('#buku-banyak-chart');
			var salesChart = new Chart(buku_chart, {
				type: 'horizontalBar',
				data: {
					labels: buku,
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
							data:
								jumlahBuku
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Buku Terpinjam',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						xAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});

			var pinjam_chart = $('#pinjam-banyak-chart');
			var salesChart = new Chart(pinjam_chart, {
				type: 'horizontalBar',
				data: {
					labels: pinjam,
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
							data:
								jumlahPinjam
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Nama Peminjam',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						xAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});

			var anggota_chart = $('#anggota-banyak-chart');
			var salesChart = new Chart(anggota_chart, {
				type: 'horizontalBar',
				data: {
					labels: pinjam,
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
							data:
								jumlahAnggota
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Nama Anggota',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						xAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});

			var pengunjung_chart = $('#pengunjung-banyak-chart');
			var salesChart = new Chart(pengunjung_chart, {
				type: 'horizontalBar',
				data: {
					labels: pinjam,
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
							data:
								jumlahPengunjung
						}]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							obat_tahun(label);
						}
					}
					,
					maintainAspectRatio: false,
					tooltips: {
						mode: mode,
						intersect: intersect
					},
					hover: {
						mode: mode,
						intersect: intersect
					},
					title: {
						display: true,
						text: 'Jumlah Nama Pengunjung',
					},
					legend: {
						display: true,
						position: 'bottom',
					},
					scales: {
						xAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});
		}
	})

	var $salesChart = $('#transaksi-chart');
	var $salesChart1 = $('#transaksi-chart1');
	$.ajax({
		url : root + 'grafik-tahun',
		type : 'GET',
		async : true,
		cache : false,
		dataType : 'json',
		success: function (response) {
			console.log(response);
			var salesChart  = new Chart($salesChart, {
				type   : 'line',
				data   : {
					labels  : ["2015","2016","2017","2018","2019","2020"],
					datasets: [
						{
							label		   : 'Jumlah Transaksi',
							// backgroundColor: '#007bff',
							borderColor    : '#007bff',
							data           : [
								response.data2015,
								response.data2016,
								response.data2017,
								response.data2018,
								response.data2019,
								response.data2020,
							]
						},
					]
				},
				options: {
					maintainAspectRatio: false,
					tooltips           : {
						mode     : mode,
						intersect: intersect
					},
					hover              : {
						mode     : mode,
						intersect: intersect
					},
					title:{ display: true,
						text: 'Data Transaksi'},
					legend             : {
						display: true,
						position: 'bottom',
					},
					scales: {
						yAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});
			var salesChart2  = new Chart($salesChart1, {
				type   : 'bar',
				data   : {
					labels  : ["2015","2016","2017","2018","2019","2020"],
					datasets: [
						{
							label		   : 'Jumlah Transaksi',
							backgroundColor: '#00ff32',
							borderColor    : '#00ff32',
							data           : [
								response.data2015,
								response.data2016,
								response.data2017,
								response.data2018,
								response.data2019,
								response.data2020,
							]
						},

					]
				},
				options: {
					onClick: function (event, array) {
						let element = this.getElementAtEvent(event);
						if (element.length > 0) {
							var series = element[0]._model.datasetLabel;
							var label = element[0]._model.label;
							var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
							// transaksi_tahun(label);
							transaksi_bulan(label);
						}
					},
					maintainAspectRatio: false,
					tooltips           : {
						mode     : mode,
						intersect: intersect
					},
					hover              : {
						mode     : mode,
						intersect: intersect
					},
					title:{ display: true,
						text: 'Jumlah seluruh transaksi berdasarkan tahun'},
					legend             : {
						display: true,
						position: 'bottom',
					},
					scales: {
						yAxes:[{
							ticks: {
								beginAtZero : true
							}
						}]
					}
				}
			});
		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	});

	function transaksi_bulan(tahun) {
		console.log(tahun);
		var html = '';
		$.ajax({
			url: root + 'grafik-bulan/' + tahun,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				html += '' +
					'<h3>Grafik Peminjaman Tahun ' + tahun + '</h3>' +
						'<div class="chart">' +
						'<canvas id="obat-chart6" width="1000" height="280"></canvas>' +
					'</div>'+
					'<div class="chart">' +
						'<canvas id="obat-chart7" width="1000" height="280"></canvas>' +
					'</div>'
					;
				$('#detail3').html(html);

				var $salesChart = $('#obat-chart6');
				var salesChart3 = new Chart($salesChart, {
					type: 'bar',
					data: {
						labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
						datasets: [
							{
								label: 'Jumlah',
								backgroundColor:
									"#ff00ff",
								borderColor:
									"#ff00ff",
								data:
									[
										response.jan.length,
										response.feb.length,
										response.mar.length,
										response.apr.length,
										response.mei.length,
										response.jun.length,
										response.jul.length,
										response.agu.length,
										response.sep.length,
										response.okt.length,
										response.nov.length,
										response.des.length,
									]
							}

						]
					},
					options: {
						onClick: function (event, array) {
							let element = this.getElementAtEvent(event);
							if (element.length > 0) {
								var series = element[0]._model.datasetLabel;
								var label = element[0]._model.label;
								var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
								transaksi_tahun(tahun,label);
							}
						},
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						legend: {
							display: true,
							position: 'bottom',
						},
					}
				});

				var $salesChart1 = $('#obat-chart7');
				var salesChart4 = new Chart($salesChart1, {
					type: 'line',
					data: {
						labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
						datasets: [
							{
								label: 'Jumlah',
								borderColor:
									"#ff00ff",
								data:
									[
										response.jan.length,
										response.feb.length,
										response.mar.length,
										response.apr.length,
										response.mei.length,
										response.jun.length,
										response.jul.length,
										response.agu.length,
										response.sep.length,
										response.okt.length,
										response.nov.length,
										response.des.length,
									]
							}

						]
					},
					options: {
						onClick: function (event, array) {
							let element = this.getElementAtEvent(event);
							if (element.length > 0) {
								var series = element[0]._model.datasetLabel;
								var label = element[0]._model.label;
								var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
								transaksi_tahun(tahun,label);
							}
						},
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						legend: {
							display: true,
							position: 'bottom',
						},
					}
				});
			}
		});
	}

	function transaksi_tahun(tahun,bulan) {
		console.log(tahun);
		console.log(bulan);
		var bulannya = angkaBulan(bulan);
		console.log(bulannya);
		var html = '';
		$.ajax({
			url: root + 'grafik-bulan-anggota/' + tahun + '/' + bulannya,
			type: 'GET',
			async: true,
			cache: false,
			dataType: 'json',
			success: function (response) {
				console.log(response);
				html += '' +
					'<h3>Grafik Transaksi '+bulan+' ' + tahun + '</h3>' +
					'<div class="row" id="banyak2">\n' +
					'\t\t\t\t<div class="col-8">\n' +
					'\t\t\t\t\t<div class="card">\n' +
					'\t\t\t\t\t\t<div class="card-body">\n' +
					'\t\t\t\t\t\t\t<div class="chart">\n' +
					'\t\t\t\t\t\t\t\t<canvas id="anggota-bulan-bar-chart" width="auto" height="280"></canvas>\n' +
					'\t\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t</div>\n' +
					'\t\t\t\t</div>\n' +
					'\t\t\t\t<div class="col-4">\n' +
					'\t\t\t\t\t<div class="card">\n' +
					'\t\t\t\t\t\t<div class="card-body">\n' +
					'\t\t\t\t\t\t\t<div class="chart">\n' +
					'\t\t\t\t\t\t\t\t<canvas id="anggota-bulan-pie-chart" width="auto" height="280"></canvas>\n' +
					'\t\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t</div>\n' +
					'\t\t\t\t</div>\n' +
					'\t\t\t</div>\n' +
					'\t\t\t<div class="row">\n' +
					'\t\t\t\t<div class="col-8">\n' +
					'\t\t\t\t\t<div class="card">\n' +
					'\t\t\t\t\t\t<div class="card-body">\n' +
					'\t\t\t\t\t\t\t<div class="chart">\n' +
					'\t\t\t\t\t\t\t\t<canvas id="anggota-bulan-bar-chart2" width="auto" height="280"></canvas>\n' +
					'\t\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t</div>\n' +
					'\t\t\t\t</div>\n' +
					'\t\t\t\t<div class="col-4">\n' +
					'\t\t\t\t\t<div class="card">\n' +
					'\t\t\t\t\t\t<div class="card-body">\n' +
					'\t\t\t\t\t\t\t<div class="chart">\n' +
					'\t\t\t\t\t\t\t\t<canvas id="anggota-bulan-pie-chart2" width="auto" height="280"></canvas>\n' +
					'\t\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t</div>\n' +
					'\t\t\t\t</div>\n' +
					'\t\t\t</div>' +
					'\t\t\t<div class="row">\n' +
					'\t\t\t\t<div class="col-8">\n' +
					'\t\t\t\t\t<div class="card">\n' +
					'\t\t\t\t\t\t<div class="card-body">\n' +
					'\t\t\t\t\t\t\t<div class="chart">\n' +
					'\t\t\t\t\t\t\t\t<canvas id="pengunjung-bulan-bar-chart" width="auto" height="280"></canvas>\n' +
					'\t\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t</div>\n' +
					'\t\t\t\t</div>\n' +
					'\t\t\t\t<div class="col-4">\n' +
					'\t\t\t\t\t<div class="card">\n' +
					'\t\t\t\t\t\t<div class="card-body">\n' +
					'\t\t\t\t\t\t\t<div class="chart">\n' +
					'\t\t\t\t\t\t\t\t<canvas id="pengunjung-bulan-pie-chart" width="auto" height="280"></canvas>\n' +
					'\t\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t\t</div>\n' +
					'\t\t\t\t\t</div>\n' +
					'\t\t\t\t</div>\n' +
					'\t\t\t</div>'
				;

				$('#transaksi-detail').html(html);

				var anggota_bar = $('#anggota-bulan-bar-chart');
				var salesChart = new Chart(anggota_bar, {
					type: 'bar',
					data: {
						labels: ["Mahasiswa", "Umum", "Pelajar"],
						datasets: [
							{
								label: 'jumlah',
								backgroundColor:[
									"#ffd200",
									"#00a902",
									"#DC143C",
								],
								borderColor:[
									"#ffd200",
									"#00a902",
									"#DC143C",
								],
								data: [
									response.mahasiswa,
									response.umum,
									response.pelajar,]
							}]
					},
					options: {
						onClick: function (event, array) {
							let element = this.getElementAtEvent(event);
							if (element.length > 0) {
								var series = element[0]._model.datasetLabel;
								var label = element[0]._model.label;
								var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
								obat_tahun(label);
							}
						}
						,
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Jumlah Anggota Berdasarkan Kategori',
						},
						legend: {
							display: true,
							position: 'bottom',
						},
						scales: {
							yAxes:[{
								ticks: {
									beginAtZero : true
								}
							}]
						}
					}
				});
				var anggota_pie = $('#anggota-bulan-pie-chart');
				var salesChart2 = new Chart(anggota_pie, {
					type: 'pie',
					data: {
						labels: ["Mahasiswa", "Umum", "Pelajar"],
						datasets: [
							{
								label: 'bentuk',
								backgroundColor: [
									"#ffd200",
									"#00a902",
									"#DC143C",],
								borderColor: [
									"#ffd200",
									"#00a902",
									"#DC143C",],
								data: [
									response.mahasiswa,
									response.umum,
									response.pelajar,
								]
							}]

					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect,
							callbacks: {
								label: function(tooltipItem, data) {
									var dataset = data.datasets[tooltipItem.datasetIndex];
									var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
										return previousValue + currentValue;
									});
									var currentValue = dataset.data[tooltipItem.index];
									var percentage = Math.floor(((currentValue/total) * 100)+0.5);
									return percentage + "%";
								}
							}
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Persentasi Anggota Berdasarkan Kategori'
						},
						legend: {
							display: true,
							position: 'bottom',
						},
					}
				});
				var anggota_bar2 = $('#anggota-bulan-bar-chart2');
				var salesChart = new Chart(anggota_bar2, {
					type: 'bar',
					data: {
						labels: ["Laki-laki", "Perempuan"],
						datasets: [
							{
								label: 'jumlah',
								backgroundColor:[
									"#0011de",
									"#ff00d8",,
								],
								borderColor:[
									"#0011de",
									"#ff00d8",,
								],
								data: [
									response.pria,
									response.wanita,]
							}]
					},
					options: {
						onClick: function (event, array) {
							let element = this.getElementAtEvent(event);
							if (element.length > 0) {
								var series = element[0]._model.datasetLabel;
								var label = element[0]._model.label;
								var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
								obat_tahun(label);
							}
						}
						,
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Jumlah Anggota Berdasarkan Jenis Kelamin',
						},
						legend: {
							display: true,
							position: 'bottom',
						},
						scales: {
							yAxes:[{
								ticks: {
									beginAtZero : true
								}
							}]
						}
					}
				});
				var anggota_pie2 = $('#anggota-bulan-pie-chart2');
				var salesChart2 = new Chart(anggota_pie2, {
					type: 'pie',
					data: {
						labels: ["Laki-laki", "Perempuan"],
						datasets: [
							{
								label: 'bentuk',
								backgroundColor: [
									"#0011de",
									"#ff00d8",],
								borderColor: [
									"#0011de",
									"#ff00d8",],
								data: [
									response.pria,
									response.wanita,
								]
							}]

					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect,
							callbacks: {
								label: function(tooltipItem, data) {
									var dataset = data.datasets[tooltipItem.datasetIndex];
									var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
										return previousValue + currentValue;
									});
									var currentValue = dataset.data[tooltipItem.index];
									var percentage = Math.floor(((currentValue/total) * 100)+0.5);
									return percentage + "%";
								}
							}
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Persentasi Anggota Berdasarkan Jenis Kelamin'
						},
						legend: {
							display: true,
							position: 'bottom',
						},
					}
				});

				var pengunjung_bar = $('#pengunjung-bulan-bar-chart');
				var salesChart = new Chart(pengunjung_bar, {
					type: 'bar',
					data: {
						labels: ["Mahasiswa", "Umum", "Pelajar"],
						datasets: [
							{
								label: 'jumlah',
								backgroundColor:[
									"#ffd200",
									"#00a902",
									"#DC143C",
								],
								borderColor:[
									"#ffd200",
									"#00a902",
									"#DC143C",
								],
								data: [
									response.mahasiswa,
									response.umum,
									response.pelajar,]
							}]
					},
					options: {
						onClick: function (event, array) {
							let element = this.getElementAtEvent(event);
							if (element.length > 0) {
								var series = element[0]._model.datasetLabel;
								var label = element[0]._model.label;
								var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
								obat_tahun(label);
							}
						}
						,
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Jumlah Pengunjung Berdasarkan Kategori',
						},
						legend: {
							display: true,
							position: 'bottom',
						},
						scales: {
							yAxes:[{
								ticks: {
									beginAtZero : true
								}
							}]
						}
					}
				});
				var pengunjung_pie = $('#pengunjung-bulan-pie-chart');
				var salesChart2 = new Chart(pengunjung_pie, {
					type: 'pie',
					data: {
						labels: ["Mahasiswa", "Umum", "Pelajar"],
						datasets: [
							{
								label: 'bentuk',
								backgroundColor: [
									"#ffd200",
									"#00a902",
									"#DC143C",],
								borderColor: [
									"#ffd200",
									"#00a902",
									"#DC143C",],
								data: [
									response.mahasiswa,
									response.umum,
									response.pelajar,
								]
							}]

					},
					options: {
						maintainAspectRatio: false,
						tooltips: {
							mode: mode,
							intersect: intersect,
							callbacks: {
								label: function(tooltipItem, data) {
									var dataset = data.datasets[tooltipItem.datasetIndex];
									var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
										return previousValue + currentValue;
									});
									var currentValue = dataset.data[tooltipItem.index];
									var percentage = Math.floor(((currentValue/total) * 100)+0.5);
									return percentage + "%";
								}
							}
						},
						hover: {
							mode: mode,
							intersect: intersect
						},
						title: {
							display: true,
							text: 'Persentasi Pengunjung Berdasarkan Kategori'
						},
						legend: {
							display: true,
							position: 'bottom',
						},
					}
				});
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	}

})

function angkaBulan(bulan) {
	if (bulan === 'Januari'){
		return '01';
	}else if (bulan === 'Februari'){
		return '02';
	}else if (bulan === 'Maret'){
		return '03';
	}else if (bulan === 'April'){
		return '04';
	}else if (bulan === 'Mei'){
		return '05';
	}else if (bulan === 'Juni'){
		return '06';
	}else if (bulan === 'Juli'){
		return '07';
	}else if (bulan === 'Agustus'){
		return '08';
	}else if (bulan === 'September'){
		return '09';
	}else if (bulan === 'Oktober'){
		return '10';
	}else if (bulan === 'November'){
		return '11';
	}else if (bulan === 'Desember'){
		return '12';
	}
}


