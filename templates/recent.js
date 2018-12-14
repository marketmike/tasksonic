var maprecent;
function init_maprecent() {
function createMarker(point, myHtml) { var marker = new GMarker(point); GEvent.addListener(marker, "click", function() { maprecent.openInfoWindowHtml(point, myHtml, {maxWidth:200}); }); return marker; }
var markerindex = 0; var markers = new Array();
function animate_marker() {if (markerindex==markers.length) {markerindex=0;} GEvent.trigger(markers[markerindex], "click"); markerindex++; setTimeout(animate_marker, 5000);}
var bottomLeft = new GControlPosition(G_ANCHOR_BOTTOM_LEFT);
maprecent = new GMap2(document.getElementById("smallmaprecent"));
maprecent.addControl(new GSmallZoomControl());
maprecent.addControl(new GMapTypeControl(), bottomLeft);
maprecent.setCenter(new GLatLng(34.051072,-118.259961), 5);


var m0 = createMarker(new GLatLng(40.7142657,-111.9403254), '<b>demo project</b><br>demo<br><a href=http://www.tasksonic.com/project_2_demo-project.html>View Task</a><br>268 Philadelphia Avenue West V  ');
maprecent.addOverlay(m0);
markers.push(m0);
maprecent.addOverlay(new GPolygon([new GLatLng(40.7142657,-111.9403254), new GLatLng(40.7142657,-111.9403254), new GLatLng(40.7142657,-111.9403254), new GLatLng(40.7142657,-111.9403254), new GLatLng(40.7142657,-111.9403254)], "#000000", 1, 0.5, "#444488", 0.1));
animate_marker();
}