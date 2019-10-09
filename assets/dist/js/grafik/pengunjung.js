$(document).ready(function () {
	'use strict';
	var root = window.location.origin + '/puswil-graph/';
	var getUrl = root + 'pengunjung/data-grafik';

	var ticksStyle = {
		fontColor: '#495057',
		fontStyle: 'bold'
	};

	var mode      = 'index';
	var intersect = true;

	var $visitorChart = $('#visitor-chart');
	var $visitorChart2 = $('#visitor-chart2');
	var $visitorChart3 = $('#visitor-chart3');
	var $visitorChart4 = $('#visitor-chart4');
	$.ajax({
		url : getUrl,
		type : 'GET',
		async : true,
		cache : false,
		dataType : 'json',
		success: function (response) {
			console.log(response);
			var visitorChart  = new Chart($visitorChart, {
				type   : 'bar',
				data   : {
					labels  : response.label,
					datasets: [
						{
							label		   : 'Pelajar Laki-laki',
							backgroundColor: '#007bff',
							borderColor    : '#007bff',
							data           : response.pelajar_lk
						},
						{
							label		   : 'Pelajar Perempuan',
							backgroundColor: '#ced4da',
							borderColor    : '#ced4da',
							data           : response.pelajar_pr
						},
						{
							label		   : 'Mahasiswa Laki-laki',
							backgroundColor: '#48da0a',
							borderColor    : '#48da0a',
							data           : response.mahasiswa_lk
						},
						{
							label		   : 'Mahasiswa Perempuan',
							backgroundColor: '#da09ca',
							borderColor    : '#da09ca',
							data           : response.mahasiswa_pr
						},
						{
							label		   : 'Umum Laki-laki',
							backgroundColor: '#da1015',
							borderColor    : '#da1015',
							data           : response.umum_lk
						},
						{
							label		   : 'Umum Perempuan',
							backgroundColor: '#dac300',
							borderColor    : '#dac300',
							data           : response.umum_pr
						}
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
					legend             : {
						display: true,
						position: 'bottom',
					},
				}
			});


			var visitorChart2  = new Chart($visitorChart2, {
				type   : 'line',
				data   : {
					labels  : response.label,
					datasets: [
						{
							label		   : 'Pelajar Laki-laki',
							// backgroundColor: '#007bff',
							borderColor    : '#007bff',
							data           : response.pelajar_lk
						},
						{
							label		   : 'Pelajar Perempuan',
							// backgroundColor: '#ced4da',
							borderColor    : '#ced4da',
							data           : response.pelajar_pr
						},
						{
							label		   : 'Mahasiswa Laki-laki',
							// backgroundColor: '#48da0a',
							borderColor    : '#48da0a',
							data           : response.mahasiswa_lk
						},
						{
							label		   : 'Mahasiswa Perempuan',
							// backgroundColor: '#da09ca',
							borderColor    : '#da09ca',
							data           : response.mahasiswa_pr
						},
						{
							label		   : 'Umum Laki-laki',
							// backgroundColor: '#da1015',
							borderColor    : '#da1015',
							data           : response.umum_lk
						},
						{
							label		   : 'Umum Perempuan',
							// backgroundColor: '#dac300',
							borderColor    : '#dac300',
							data           : response.umum_pr
						}
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
					legend             : {
						display: true,
						position: 'bottom',
					},
				}
			});


			var visitorChart3  = new Chart($visitorChart3, {
				type   : 'pie',
				data   : {
					labels  : response.label,
					datasets: [
						{
							label		   : 'Pengunjung',
							backgroundColor:
								[
									"#DEB887",
									"#A9A9A9",
									"#DC143C",
									"#F4A460",
									"#2E8B57",
									"#1D7A46",
									"#CDA776",
								],
							borderColor    : [
								"#CDA776",
								"#989898",
								"#CB252B",
								"#E39371",
								"#1D7A46",
								"#F4A460",
								"#CDA776",
							],
							data           : response.pelajar_lk
						}
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
					legend             : {
						display: true,
						position: 'bottom',
					},
					title: {
						display: true,
						text: 'Berdasarkan Judul'
					}
				}
			});

			var visitorChart4  = new Chart($visitorChart4, {
				type   : 'pie',
				data   : {
					labels  : response.kategori,
					datasets: [
						{
							label		   : 'Eksemplar',
							backgroundColor:
								[
									"#DEB887",
									"#A9A9A9",
									"#DC143C",
									"#F4A460",
									"#2E8B57",
									"#1D7A46",
									"#CDA776",
								],
							borderColor    : [
								"#CDA776",
								"#989898",
								"#CB252B",
								"#E39371",
								"#1D7A46",
								"#F4A460",
								"#CDA776",
							],
							data           : response.eksemplar
						}
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
					legend             : {
						display: true,
						position: 'bottom',
					},
					title: {
						display: true,
						text: 'Berdasarkan Eksemplar'
					}
				}
			});
		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	});
})
