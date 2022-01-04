function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function expireCookie(name) {
	if (getCookie(name) != "")
	{
		document.cookie = name+"=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
		return true;
	} 
	else
		return false;
}

function getCookie(name) {
	var cname = name + "=";
	var ca = document.cookie.split(';');
	for(var i = 0; i < ca.length; i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ')
			c = c.substring(1);
		if (c.indexOf(cname) != -1) 
			return c.substring(cname.length,c.length);
	}
	return "";
}

function checkCookie(name) {
	if (getCookie(name) != "")
		return true;
	else
		return false;
}
var isNight = false;
// sunset sunrise
fetch("https://api.sunrise-sunset.org/json?lat=43.300251&lng=5.385448&date=today")
.then(response =>  response.json())
.then(function(data){
	console.log(data);
	let sunset_time = data.results.sunset;
	let now = new Date();
	now = now.toLocaleTimeString();
	now = now.split(' ');
	sunset_time = sunset_time.split(' ');
	if(now[1] == 'PM')
	{
		now = now[0].split(':');
		sunset_time = sunset_time[0].split(':');
		if(parseInt(now[0]) > parseInt(sunset_time[0]))
			isNight = true;
		else if(
			parseInt(now[0]) == parseInt(sunset_time[0]) && 
			parseInt(now[1]) >= parseInt(sunset_time[1])
		)
			isNight = true;
		else if(
			parseInt(now[0]) == parseInt(sunset_time[0]) && 
			parseInt(now[1]) == parseInt(sunset_time[1]) &&
			parseInt(now[2]) >= parseInt(sunset_time[2])
		)
			isNight = true;
	}
	console.log(sunset_time);
	console.log(now);
	console.log(isNight);
	if(isNight)
		document.body.classList.add('night');
})
.catch((error) => {
	console.log(error);
});
