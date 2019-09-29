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
			})
		},
		error: function (response) {
			console.log(response.status + 'error');
		}
	});
})
