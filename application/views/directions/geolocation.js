var xmlHttp;
function getLocation()
{//ask for lat lng from brower
	if (navigator.geolocation){
		navigator.geolocation.getCurrentPosition(savePosition,showError);
	}else{
		alert("Geolocation is not supported by this browser.");
	}
}

function savePosition(position)
{//runs on succesful location of position
	lat=position.coords.latitude;
	lng=position.coords.longitude;
	createXMLHttpRequest();
	xmlHttp.onreadystatechange = locationReturn;
	url = "include/location_ajax.php?lat=" + lat + "&lng=" + lng + "&ts=" + new Date().getTime();
	xmlHttp.open("GET",url, true);
	xmlHttp.send(null);
}

function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
}

function locationReturn() {
    if(xmlHttp.readyState == 4) {
        if(xmlHttp.status == 200) {
          alert(xmlHttp.responseText);
            
        }
    }
}

function showError(error)
{
	switch(error.code) 
	{
		case error.PERMISSION_DENIED:
			msg="User denied the request for Geolocation."
			break;
		case error.POSITION_UNAVAILABLE:
			msg="Location information is unavailable."
			break;
		case error.TIMEOUT:
			msg="The request to get user location timed out."
			break;
		case error.UNKNOWN_ERROR:
			msg="An unknown error occurred."
			break;
	}
	alert(msg);
}
	