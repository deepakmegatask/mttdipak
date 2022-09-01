//[Dashboard Javascript]

//Project:	Unique Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';

	var options = {
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'	
                },
            },
            dataLabels: {
                enabled: false
            },
			legend: {
				position: 'top',
				horizontalAlign: 'left', 
			  },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
		    colors:['#00c292', '#f96197', '#fec107'],
            series: [{
                name: 'Assigned',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Closed',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Pending',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#dayreport"),
            options
        );

        chart.render();
	
	
	var options = {
            chart: {
                width: 480,
                type: 'pie',
            },
			colors:['rgb(31, 119, 180)', 'rgb(174, 199, 232)', 'rgb(255, 127, 14)', 'rgb(255, 187, 120)', 'rgb(44, 160, 44)', 'rgb(152, 223, 138)', 'rgb(214, 39, 40)'],
			legend: {
				position: 'top',
				horizontalAlign: 'left', 
			  },
            labels: ['Open', 'Pending', 'Closed', 'Assigned', 'Approving', 'Approved', 'Denied'],
            series: [35, 2, 12, 3, 1, 4, 1],
            responsive: [{
                breakpoint: 1500,
                options: {
                    chart: {
                        width: 350
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        }

        var chart = new ApexCharts(
            document.querySelector("#ticketsbystatus"),
            options
        );

        chart.render();
	
	
	var options = {
            chart: {
				width: 480,
                type: 'donut',
            },
			colors:['rgb(31, 119, 180)', 'rgb(174, 199, 232)', 'rgb(255, 127, 14)', 'rgb(255, 187, 120)'],
			legend: {
				position: 'top',
				horizontalAlign: 'left', 
			  },
			labels: ['No Alerts', 'First Alert Level', 'Third Alert Level', 'Second Alert Level'],
            series: [5, 7, 19, 15],
            responsive: [{
                breakpoint: 1500,
                options: {
                    chart: {
                        width: 350
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        }

       var chart = new ApexCharts(
            document.querySelector("#ticketsbyalertlevel"),
            options
        );
        
        chart.render();
	
	
	 var options = {
            chart: {
                height: 250,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false,
            },
			colors:['rgb(31, 119, 180)', 'rgb(174, 199, 232)'],
		    labels: ['No Alerts', 'No Completed'],
            series: [{
                data: [5, 41]
            }],
            xaxis: {
                categories: ['No Alert', 'No Completed'],
            }
        }

       var chart = new ApexCharts(
            document.querySelector("#ticketsbyalertcondition"),
            options
        );
	
	
        
        chart.render();
	
	
	
		var options = {
            chart: {
                height: 410,
                type: 'bar'
            },
            plotOptions: {
                bar: {
                    barHeight: '100%',
                    distributed: true,
                    horizontal: true,
                    dataLabels: {
                        position: 'bottom'
                    },
                }
            },
            colors:['rgb(31, 119, 180)', 'rgb(174, 199, 232)', 'rgb(255, 127, 14)', 'rgb(255, 187, 120)', 'rgb(44, 160, 44)', 'rgb(152, 223, 138)', 'rgb(214, 39, 40)', 'rgb(197, 176, 213)'],
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                style: {
                    colors: ['#fff']
                },
                formatter: function(val, opt) {
                    return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                },
                offsetX: 0,
                dropShadow: {
                  enabled: false
                }
            },
            series: [{
                data: [7, 4, 3, 2, 5, 9, 3, 10]
            }],
            stroke: {
                width: 1,
              colors: ['#fff']
            },
            xaxis: {
                categories: ['General', 'Installation Request', 'Web', 'Insurance', 'Phone', 'Procurement Request', 'Repair Request', '401K'],
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function() {
                            return ''
                        }
                    }
                }
            }
        }

       var chart = new ApexCharts(
            document.querySelector("#ticketsbyrequesttype"),
            options
        );
        
        chart.render();
	
	

}); // End of use strict
