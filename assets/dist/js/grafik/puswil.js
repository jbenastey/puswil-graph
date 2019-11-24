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
			var $salesChart = $('#anggota-pie-chart');
			var salesChart2 = new Chart($salesChart, {
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
						text: 'Presentasi Anggota Berdasarkan Kategori'
					},
					legend: {
						display: true,
						position: 'bottom',
					},
				}
			});
		}
	})
})
