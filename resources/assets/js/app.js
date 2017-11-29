require('./bootstrap');

// window.Vue = require('vue');
// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
	el : '#app',
});


function floatHoursToMinutes(time) {
	return parseInt(time) * 60 + parseInt(time % 1 * 60);
}

/**
 * Append staff div by id to staff wrapper div
 *
 * @param wrapperDivId
 * @param staffId
 */
function appendStaffDivToWrapperDiv(wrapperDivId, staffId) {
	$(wrapperDivId).append($('<div>', {id: 'staff_' + staffId, class: 'col-sm-3 staff-pie-chart'}));
}

/**
 * Generate a staff pie chart from given data to staff by id
 *
 * @param staffId
 * @param data
 */
function createStaffPieChart(staffId, data) {
	$('#staff_' + staffId).highcharts({

		chart: {
			type: 'pie'
		},

		title: {
			text: 'Staff by Id: ' + staffId
		},

		tooltip: {
			pointFormat: '{series.name} <b>{point.y}</b>'
		},

		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},

		series: [{
			name: 'Minutes worked:',
			colorByPoint: true,
			data: data
		}]
	});
}