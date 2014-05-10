$(document).ready(function(){
	function load_data(lat, lon) { // lat is the smaller number for india
		// use lat = 13.070905, lon = 77.468515
		$.get('/cfi/?lat=' + lat + '&lon=' + lon, function(data){
			console.log(data);
			return data;
		})
	}
	load_data(13.070905, 77.468515);
})