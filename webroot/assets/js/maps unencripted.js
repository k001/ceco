// Set map height to 100% ----------------------------------------------------------------------------------------------
var $body = $('body');
var map;//variable global para poder acceder desde otras futuras funciones al mapa
var puntos =[];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Homepage map - Google
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function initialize() {
            var $body = $('body');
            if( $body.hasClass('map-fullscreen') ) {
                if( $(window).width() > 768 ) {
                    $('.map-canvas').height( $(window).height() - $('.header').height() );
                }
                else {
                    $('.map-canvas #map').height( $(window).height() - $('.header').height() );
                }
            }
            
            var locData;
            //var locData2;
            
            var searchButton = document.querySelector("#searchButton");
            var delButton = document.querySelector("#delButton");//delete points mark
            
            var resultsDiv = document.querySelector("#results");
            
            var mapOptions = {
                center: new google.maps.LatLng(-36.893593, -60.313931),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            };
        
             map = new google.maps.Map(document.getElementById("map"),mapOptions);
            
            var polyOptions = {
                strokeColor: '#000000',
                strokeOpacity: 1.0,
                strokeWeight: 3
            }
        
            var blueIcon = {
                url:"../img/pins/mark_red.png"
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
                var descripcion = document.getElementById("descripcion").value;
                if(descripcion == ''){//para no dejar sin nombre         
                    var path = poly.getPath();
                    if(path.getLength() < 4) {
                        alert('Ingrese al menos 4 puntos.');
                        return;
                    }
                    path.push(markers[0].getPosition());
                    searchButton.setAttribute("disabled","disabled");
                    doSearch();
                    
                   //document.getElementById("ultimo").innerHTML = 'Ultimo: ' + document.getElementById("descripcion").value; 
                   document.getElementById("descripcion").value = '';//borro descripcion
                }else{
                       alert('Ingrese descripcion'); return;
                }//fin if  
            });
            
            delButton.addEventListener("click", function(e) {
                poly.setMap(null);
                searchButton.removeAttribute("disabled");
                setAllMap(null);
                poly = new google.maps.Polyline(null);
                markers = [];
                
                $("#tabla tbody").html("");
            });
            
           //$.get("/geopadron/site/data.json", {}, function(res) {
                locData=ar;
               // locData2=ar2;
                searchButton.innerText = "Search";
                searchButton.removeAttribute("disabled");
            //});
            //console.log(locData[0][0]);
            //console.log(locData);
            
            function doSearch() {
                results.innerHTML = "<i>Buscando Resultados...</i>";
                var totalFound = 0;
                var Founds = new Array;//aca guardo la informacion de los encontrados
                var nombre_lonja = document.getElementById("descripcion").value;
              
                //ar
                for(var i=0; i<locData.length; i++) {
                    var point = new google.maps.LatLng(locData[i][0],locData[i][1]);
                    if(google.maps.geometry.poly.containsLocation(point,poly)) {
                        var m = new google.maps.Marker({
                            position: point,
                            icon: '../img/pins/celeste.png',
                            title: 'Nombre: '+ locData[i][2] + ' | Domicilio: ' + locData[i][3],
                            map: map
                        });
                        puntos.push(m);
                        //var markerCluster = new MarkerClusterer(map, markers);
                        totalFound++;
                        Founds.push([locData[i][0],locData[i][1],locData[i][2],locData[i][3],locData[i][4],nombre_lonja]);
                    }
                }
                
                
               /* 
                //ar2
                for(var i=0; i<locData2.length; i++) {
                    var point = new google.maps.LatLng(locData2[i][0],locData2[i][1]);
                    if(google.maps.geometry.poly.containsLocation(point,poly)) {
                        var m = new google.maps.Marker({
                            position: point,
                            icon: '../img/pins/rosa.png',
                            title: 'Nombre: '+ locData2[i][2] + ' | Domicilio: ' + locData2[i][3],
                            map: map
                        });
                        puntos.push(m);
                        //var markerCluster = new MarkerClusterer(map, markers);
                        totalFound++;
                        Founds.push([locData2[i][0],locData2[i][1],locData2[i][2],locData2[i][3],locData2[i][4],locData2[i][5]]);
                    } 
                }
                
                */
                results.innerHTML = "<h3>Resultados " + totalFound + "</h3><br>";
                
                for (x=0;x<Founds.length;x++){
                    $("#tabla tbody").append('<tr>');
                    $("#tabla tbody").append("<th>"+Founds[x][4]+"</th><th>" + Founds[x][2] +"</th><th>" + Founds[x][3] +"</th>");
                    $("#tabla tbody").append('</tr>');
                }   
                
                //salvo en la db
                var arrjson = JSON.stringify(Founds);
               // saveLonjas(arrjson);
                
            }
            
            
            
            function saveLonjas(dato){
                
                 $.ajax({
                    type: 'POST',
                    url: '/geopadron/site/maps/save_lonja',
                    data: {data:dato},
                    cache: false,
                    dataType: 'json',
                    success: function (html){
                        //alert('Guardado en la base de datos correctamente');
                 }});
                
                /*
                $.ajax({
                  url: 'http://resto/api30/grabarlonja.php'
                , type: 'POST'
                , contentType: 'application/json'
                , dataType: 'json',
                 data: dato
            
                });
                */
            }
            
            function setAllMap(map) {
              for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
              }
              for (var j = 0;j<puntos.length;j++){
                  puntos[j].setMap(map);
              }
            }
            
        }//end initialize
        
        
        
        
 /*     agregar marcadores al mapa  
        
           function addmarker(latilongi) {
                var marker = new google.maps.Marker({
                    position: latilongi,
                    title: 'new marker',
                    draggable: true,
                    map: map
                });
                map.setCenter(marker.getPosition());
            }
        
        function init2(){
            var location = new google.maps.LatLng(-36.91785812, -60.31276321);
                addmarker(location);
        }
        
*/





