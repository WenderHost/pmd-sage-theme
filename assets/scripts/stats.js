// Donation Stats
(function($) {
	$.getJSON(wpvars.dataurl + '?ver=' + wpvars.dataversion , function( data ){
		console.log(data);

		var options = {
			separator: ','
		};

		var totalDonations = new CountUp('total-donations', 0, data.donations.alltime.number, 0, 2, options );
		totalDonations.start();
		var totalDonationsVal = new CountUp('total-donations-value', 0, data.donations.alltime.value, 0, 2.5, {separator: ',', prefix: '$'} );
		totalDonationsVal.start();

		var donationsLastMonth = new CountUp('donations-last-month', 0, data.donations.lastmonth.number, 0, 2, options );
		var donationsLastMonthVal = new CountUp('donations-last-month-value', 0, data.donations.lastmonth.value, 0, 2, {separator: ',', prefix: '$'} );

		var waypoints = $('#partner-cta').waypoint({
		  handler: function(direction) {
		    console.log(this.element.id + ' hit');
		    donationsLastMonth.start();
		    donationsLastMonthVal.start();
		  }
		});

	});

})(jQuery);
