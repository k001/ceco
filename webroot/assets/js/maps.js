function initialize(){function e(){results.innerHTML="<i>Buscando Resultados...</i>";for(var e=0,t=new Array,o=document.getElementById("descripcion").value,a=0;a<n.length;a++){var i=new google.maps.LatLng(n[a][0],n[a][1]);if(google.maps.geometry.poly.containsLocation(i,poly)){var l=new google.maps.Marker({position:i,icon:"../img/pins/celeste.png",title:"Nombre: "+n[a][2]+" | Domicilio: "+n[a][3],map:map});puntos.push(l),e++,t.push([n[a][0],n[a][1],n[a][2],n[a][3],n[a][4],o])}}for(results.innerHTML="<h3>Resultados "+e+"</h3><br>",x=0;x<t.length;x++)$("#tabla tbody").append("<tr>"),$("#tabla tbody").append("<th>"+t[x][4]+"</th><th>"+t[x][2]+"</th><th>"+t[x][3]+"</th>"),$("#tabla tbody").append("</tr>");JSON.stringify(t)}function t(e){for(var t=0;t<p.length;t++)p[t].setMap(e);for(var o=0;o<puntos.length;o++)puntos[o].setMap(e)}var o=$("body");o.hasClass("map-fullscreen")&&($(window).width()>768?$(".map-canvas").height($(window).height()-$(".header").height()):$(".map-canvas #map").height($(window).height()-$(".header").height()));var n,a=document.querySelector("#searchButton"),i=document.querySelector("#delButton"),l=(document.querySelector("#results"),{center:new google.maps.LatLng(-36.893593,-60.313931),zoom:14,mapTypeId:google.maps.MapTypeId.ROADMAP,scrollwheel:!1});map=new google.maps.Map(document.getElementById("map"),l);var r={strokeColor:"#000000",strokeOpacity:1,strokeWeight:3},s={url:"../img/pins/mark_red.png"},p=[];poly=new google.maps.Polyline(r),poly.setMap(map),google.maps.event.addListener(map,"click",function(e){var t=poly.getPath();t.push(e.latLng),p.push(new google.maps.Marker({position:e.latLng,title:"#"+t.getLength(),icon:s,map:map}))}),a.addEventListener("click",function(){var t=document.getElementById("descripcion").value;if(""!=t)return void alert("Ingrese descripcion");var o=poly.getPath();return o.getLength()<4?void alert("Ingrese al menos 4 puntos."):(o.push(p[0].getPosition()),a.setAttribute("disabled","disabled"),e(),void(document.getElementById("descripcion").value=""))}),i.addEventListener("click",function(){poly.setMap(null),a.removeAttribute("disabled"),t(null),poly=new google.maps.Polyline(null),p=[],$("#tabla tbody").html("")}),n=ar,a.removeAttribute("disabled")}var $body=$("body"),map,puntos=[];google.maps.event.addDomListener(window,"load",initialize);