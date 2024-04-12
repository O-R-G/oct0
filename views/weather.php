<?
    // relies on existing #weather-block div in dom
	if (isset($_SERVER['HTTPS']) &&
	    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
	    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
	    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
	  $protocol = 'https://';
	}
	else {
	  $protocol = 'http://';
	}
?>
<script>
    function requestIpinfo(){
	    // let token_ipinfo = 'ef0cd4231b0dc5'; 
	    let token_ipinfo = '3ec057cf2163cb'; //real
	    let request_url_ipinfo = 'https://ipinfo.io/json?token=' + token_ipinfo;
	    let httpRequest_ipinfo = new XMLHttpRequest();
	    httpRequest_ipinfo.onreadystatechange = function(){
			if (httpRequest_ipinfo.readyState === 4 && httpRequest_ipinfo.status === 200) {
				try{
                    var data = JSON.parse(httpRequest_ipinfo.responseText);
                    var city = data['city'];
					console.log(data);
                    requestWeather(city);
					// requestWeather();
					// console.log(data);
				}
				catch(err)
				{
					console.log('Error!');
					console.log(err);
					requestWeather();
					return false;
				}
			}
		};
		httpRequest_ipinfo.open('GET', request_url_ipinfo);
		httpRequest_ipinfo.send();
	}
    function requestWeather(requestLocation = ''){
    	if(requestLocation =='')
    		var api_url = '<?= $protocol; ?>api.weatherapi.com/v1/current.json?key=5262904081d248dc9d6134509221701&q=Marseille';
    	else
    		var api_url = '<?= $protocol; ?>api.weatherapi.com/v1/current.json?key=5262904081d248dc9d6134509221701&q='+requestLocation;
		var sWeather_block = document.getElementById('weather-block');
		var httpRequest = new XMLHttpRequest();
		httpRequest.onreadystatechange = function(){
			if (httpRequest.readyState === 4) {
				if (httpRequest.status === 200) { 
					try{
	                    var data = JSON.parse(httpRequest.responseText);
						console.log(data);
						if (typeof badge !== 'undefined') {
							badge.set_temperature(data['current']['temp_f']);
						}
						// let temp = data['current']['temp_f'];
						// sWeather_block.innerHTML = temp + '°';
						/*
                        if(requestLocation != '')
							sWeather_block.innerHTML += '<br>' + requestLocation;
                        */
					}
					catch(err)
					{
						console.log('Error!');
						console.log(err);
						return false;
					}
				}
			}
		};
		httpRequest.open('GET', api_url);
		httpRequest.send();
    }
	// requestIpinfo();
	requestWeather();
</script>
