$(document).ready(function () {
	'use strict';
	var root = window.location.origin + '/puswil-graph/';
	var getUrl = root + 'buku/data-grafik';

	var ticksStyle = {
		fontColor: '#495057',
		fontStyle: 'bold'
	};

	var mode      = 'index';
	var intersect = true;

	var $salesChart = $('#sales-chart');
	var $salesChart2 = $('#sales-chart2');
	var $salesChart3 = $('#sales-chart3');
	var $salesChart4 = $('#sales-chart4');
	$.ajax({
		url : getUrl,
		type : 'GET',
		async : true,
		cache : false,
		dataType : 'json',
		success: function (response) {
			console.log(response);
			var salesChart  = new Chart($salesChart, {
				type   : 'bar',
				data   : {
					labels  : response.kategori,
					datasets: [
						{
							label		   : 'Judul',
							backgroundColor: '#007bff',
							borderColor    : '#007bff',
							data           : response.judul
						},
						{
							label		   : 'Eksemplar',
							backgroundColor: '#ced4da',
							borderColor    : '#ced4da',
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
				}
			});


			var salesChart2  = new Chart($salesChart2, {
				type   : 'line',
				data   : {
					labels  : response.kategori,
					datasets: [
						{
							label		   : 'Judul',
							// backgroundColor: '#007bff',
							borderColor    : '#007bff',
							data           : response.judul
						},
						{
							label		   : 'Eksemplar',
							// backgroundColor: '#ced4da',
							borderColor    : '#ced4da',
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
				}
			});


			var salesChart3  = new Chart($salesChart3, {
				type   : 'pie',
				data   : {
					labels  : response.kategori,
					datasets: [
						{
							label		   : 'Judul',
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
							data           : response.judul
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

			var salesChart4  = new Chart($salesChart4, {
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
