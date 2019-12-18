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
			console.log(response);
			var anggota_bar = $('#anggota-bar-chart');
			var salesChart = new Chart(anggota_bar, {
				type: 'bar',
				data: {
					labels: ["Mahasiswa", "Umum", "Pelajar"],
					datasets: [
						{
							label: 'jumlah',
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
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
								"#DEB887",
								"#A9A9A9",
								"#DC143C",],
							borderColor: [
								"#DEB887",
								"#A9A9A9",
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
							backgroundColor:
								"#DEB887",
							borderColor:
								"#DEB887",
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
								"#DEB887",
								"#A9A9A9",],
							borderColor: [
								"#DEB887",
								"#A9A9A9",],
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
			console.log(response.pinjam);
			$('#buku-banyak').html(response.buku[0].buku_judul);
			$('#pinjam-banyak').html(response.pinjam[0].peminjam_nama);
			$('#anggota-banyak').html(response.anggota[0].anggota_nama);
			$('#pengunjung-banyak').html(response.pengunjung[0].pengunjung_nama);

			var buku = [];
			var jumlahBuku = [];
			if (response.buku.length < 10){
				for (var i = 0; i < response.buku.length; i++) {
					buku.push(response.buku[i].buku_judul);
					jumlahBuku.push(response.buku[i].total)
				}
			} else {
				for (var i = 0; i < 10; i++) {
					buku.push(response.buku[i].buku_judul);
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
})
