// Donation Stats
(function($) {
	$.getJSON(wpvars.dataurl + '?ver=' + wpvars.dataversion , function( data ){
		console.log(data);
		var total_donations = data.total_donations;
		var statsSince = 'Since 2012, ' + number_format( total_donations ) + ' donations submitted valued at ' + data.total_donations_value;
		$('#stats-since').html( statsSince );

		var donations_last_month = number_format( data.donations_by_interval.last_month );
		var donations_last_month_value = data.donations_by_value.last_month;
		$('#donations-last-month').html( donations_last_month );
		$('#donations-last-month-value').html( donations_last_month_value );

		var donations_this_year = number_format( data.donations_by_interval.this_year );
		var donations_this_year_value = data.donations_by_value.this_year;
		$('#donations-this-year').html( donations_this_year );
		$('#donations-this-year-value').html( donations_this_year_value );
	});

	number_format = function(number, decimals, decPoint, thousandsSep) {

	  number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
	  var n = !isFinite(+number) ? 0 : +number
	  var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
	  var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
	  var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
	  var s = ''

	  var toFixedFix = function (n, prec) {
	    var k = Math.pow(10, prec)
	    return '' + (Math.round(n * k) / k)
	      .toFixed(prec)
	  }

	  // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
	  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
	  if (s[0].length > 3) {
	    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
	  }
	  if ((s[1] || '').length < prec) {
	    s[1] = s[1] || ''
	    s[1] += new Array(prec - s[1].length + 1).join('0')
	  }

	  return s.join(dec)
	}
})(jQuery);
