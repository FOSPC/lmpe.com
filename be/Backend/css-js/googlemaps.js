// JavaScript Document

function initialize()
{
  var mapOpt =
  {
      center:new google.maps.LatLng(51.508742,-0.120850),
      zoom:5,
      mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOpt);
}
  var marker=new google.maps.Marker({position:myCenter,animation:google.maps.Animation.BOUNCE,icon:'img/menuLogo.png'});
  marker.setMap(map);
  google.maps.event.addDomListener(window, 'load', initialize);