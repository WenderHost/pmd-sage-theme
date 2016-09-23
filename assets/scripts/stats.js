// Donation Stats
(function($) {
	$.getJSON(wpvars.dataurl + '?ver=' + wpvars.dataversion , function( data ){
		console.log(data);

		var options = {
			separator: ','
		};

		if($('#total-donations').length > 0){
			var totalDonations = new CountUp('total-donations', 0, data.donations.alltime.number, 0, 2, options );
			totalDonations.start();
		}

		if($('#total-donations-value').length > 0){
			var totalDonationsVal = new CountUp('total-donations-value', 0, data.donations.alltime.value, 0, 2.5, {separator: ',', prefix: '$'} );
			totalDonationsVal.start();
		}

		if($('#donations-last-month').length >0){
			var donationsLastMonth = new CountUp('donations-last-month', 0, data.donations.lastmonth.number, 0, 2, options );
		}
		if($('#donations-last-month-value').length >0){
			var donationsLastMonthVal = new CountUp('donations-last-month-value', 0, data.donations.lastmonth.value, 0, 2, {separator: ',', prefix: '$'} );
		}

		if($('#donations-last-month').length >0){
			var waypoints = $('#partner-cta').waypoint({
			  offset: '50%',
			  handler: function(direction) {
			    donationsLastMonth.start();
			    donationsLastMonthVal.start();
			  }
			});
		}

	});

})(jQuery);
