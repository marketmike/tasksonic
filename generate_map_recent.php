var data = [
<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
$z=0;

$dbmap = mysql_connect($config['DB_Host'], $config['DB_User'],$config['DB_Passwd']);
mysql_select_db($config['DB_Name'],$dbmap);
$task_results = mysql_query("SELECT * from project_master  WHERE city != '' AND project_city = '$citycurrent' AND project_status = 1 ORDER BY project_id desc",$dbmap);
if (mysql_num_rows($task_results)==0){
echo "{ title: 'Task Sonic', info: '<br><b>No Open Task Posted For This City Yet</b>', lat:'29.04282', lng:'-81.939902' },";
}else{ // If results
while ($myrow = mysql_fetch_array($task_results)) {
    $title=$myrow['project_title'];
    $title2=str_replace(" ","-",$title);
    $title2link=strtolower($title2);	
    $linkid=$myrow['project_id'];
	$address=$myrow['city'];
	$latitude=$myrow['latitude'];
	$longitude=$myrow['longitude'];
	$posted_by=$myrow['project_posted_by'];
	
$mainlink=$config[WC_SITE_URL] . "/task_".$linkid."_".$title2link.".html";
$address=stripslashes($address);
$address=substr($address,0,30);
if ($longitude!="")
{
?>
 {title: '<?php echo $title;?>', info: '<br><b>Posted by:</b> <?php echo $posted_by;?><br><a href=<?php echo $mainlink;?>>View Task</a><br><?php echo $address;?>', lat:'<?php echo $latitude;?>', lng:'<?php echo $longitude;?>' },  
<?php
} // If longitude
  
} // End while
} // End results check
?>

];
var map, iw, route;
var gmarkers = [];
var count = -1;
var stopClick = false;
var marker = null;
 
 
function createMarker(point, icon, name, content, i) {
 
  var g = google.maps;
  var image = new g.MarkerImage(icon,
   new g.Size(32, 32),
   new g.Point(0, 0),
   new g.Point(15, 32));
 
  var shadow = new g.MarkerImage("http://maps.gstatic.com/mapfiles/kml/paddle/A_maps.shadow.png",
    new g.Size(59, 32),
    new g.Point(0, 0),
    new g.Point(15, 32));
 
  var marker = new g.Marker({ position: point, map: map,
    title: name, clickable: true, draggable: false,
    icon: image, shadow: shadow
  });
 
  // Add a click listener to the markers
  g.event.addListener(marker, "click", function() {
   iw.setContent(content);
   iw.open(map, marker);
   /* Change count to continue animation
   * from the last manually clicked marker
   */
   count = i;
  });
  return marker;
}
 
 
function init_maprecent() {
 
  var g = google.maps;
  var routePath = [];
 
  var opts_map = {
    center: new g.LatLng(-81.939902, 29.04282),
    zoom: 10,
    mapTypeId: g.MapTypeId.ROADMAP,
    streetViewControl: false,
	mapTypeControl: false,
  mapTypeControlOptions: {
    mapTypeIds: [ g.MapTypeId.ROADMAP, g.MapTypeId.SATELLITE, g.MapTypeId.TERRAIN]
  },
  navigationControlOptions: {
     style: g.NavigationControlStyle.SMALL
  }};
 
  map = new g.Map(document.getElementById("maprecent"), opts_map);
  iw = new g.InfoWindow({maxWidth: 200});
 
  // v2 behaviour
  g.event.addListener(map, "click", function() {
   if (iw) iw.close();
  });
 
  // Light blue marker icon
  var icon = "http://maps.google.com/mapfiles/ms/micons/blue.png";
 
  for (var i = 0, m; m = data[i]; i++) {
   var point = new g.LatLng(parseFloat(m.lat), parseFloat(m.lng));
   routePath[i] = point;
   var title = m.title;
   var html ="<div class=infowindow>" +
   "<strong>"+ title + "<\/strong>" + m.info + "<\/div>";
   marker = createMarker(point, icon, title, html, i);
   // Store content as marker property
   marker.content = html;
   gmarkers.push(marker);
  }

 
  g.event.addListenerOnce(map, "tilesloaded", function() {
   // Call animation
   route =setTimeout("anim()", 1500);
 });
}
  
function anim() {
 
 count++;
 if(count < gmarkers.length) {
  // Use counter as array index
  map.panTo(gmarkers[count].getPosition());
 
  iw.setContent(gmarkers[count].content);
  iw.open(map, gmarkers[count]);
 
  var delay = 5000;
  route = setTimeout("anim()", delay);
 }
  else {
 if(route) clearTimeout(route);
 if (iw) iw.close();
 stopClick = false;
 count = -1;
 map.setOptions({center: gmarkers[0].getPosition(), zoom: 10 });
 route =setTimeout("anim()", 1200);
 }
}