var map;
var infoWindow = new google.maps.InfoWindow();

function initialize() {
  var mapOptions = {
    center: {
      lat: 34.42,
      lng: -119.845
    },
    zoom: 11,
    scrollwheel: false,
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);

  // Load a GeoJSON from project API.
  // Get all tags with the parameter "1"
  map.data.loadGeoJson('http://kelp.ucsb.edu/api/v1/tags/1');

  map.data.addListener('click', function(event) {
    //show an infowindow on mouseover
    //var date = new Date(event.feature.getProperty('date'));
    infoWindow.setContent('<div style="line-height:1.35;overflow:hidden;white-space:nowrap;">'+
    'Date: '+event.feature.getProperty('date')+
    '<br>Tag Number: '+event.feature.getProperty('tagnumber')+
    '<br>Location: '+event.feature.getProperty('location')+
    '<br>Coordinates: '+event.latLng.lat().toFixed(3)+'N, '+(-event.latLng.lng().toFixed(3))+'W');
    infoWindow.setPosition(event.latLng);
    infoWindow.open(map);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
