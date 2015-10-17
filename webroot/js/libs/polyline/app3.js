function initialize() {

	var locData;
	
	var searchButton = document.querySelector("#searchButton");
	var resultsDiv = document.querySelector("#results");
	
	var mapOptions = {
		center: new google.maps.LatLng(30.223178, -92.024231),
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

	var polyOptions = {
		strokeColor: '#000000',
		strokeOpacity: 1.0,
		strokeWeight: 3
	}

	var blueIcon = {
		url:"http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png"
	};
	
	var markers = [];
	
	poly = new google.maps.Polyline(polyOptions);
	poly.setMap(map);
	
	google.maps.event.addListener(map, 'click', function(event) {

		var path = poly.getPath();

		path.push(event.latLng);
		
		markers.push(new google.maps.Marker({
			position: event.latLng,
			title: '#' + path.getLength(),
			icon:blueIcon,
			map: map
		}));
		
	});
	
	searchButton.addEventListener("click", function(e) {
		var path = poly.getPath();
		if(path.getLength() < 4) {
			alert('Ingrese al menos 4 puntos.');
			return;
		}
		path.push(markers[0].getPosition());
		searchButton.setAttribute("disabled","disabled");
		doSearch();
	});
	
	$.get("data.json", {}, function(res) {
		locData=res;
		searchButton.innerText = "Search";
		searchButton.removeAttribute("disabled");;
	});
	
	function doSearch() {
		results.innerHTML = "<i>Searching for matches...</i>";
		var totalFound = 0;
		var Founds = new Array;//aca guardo la informacion de los encontrados
		for(var i=0; i<locData.length; i++) {
			var point = new google.maps.LatLng(locData[i][0],locData[i][1]);
			if(google.maps.geometry.poly.containsLocation(point,poly)) {
				var m = new google.maps.Marker({
					position: point,
					title: 'Location '+i,
					map: map
				});
				totalFound++;
				Founds.push([locData[i][0],locData[i][1]]);
			} 
		}
		results.innerHTML = "Resultados " + totalFound + "<hr><br>";
		
		for (x=0;x<Founds.length;x++){
		    $("#encontrados").append("<hr> Lat: " + Founds[x][0] + " Long:" + Founds[x][1] + "<hr>");
		}	
		
	}
	
}

google.maps.event.addDomListener(window, 'load', initialize);