var map;
var infoWindow = new google.maps.InfoWindow();
google.maps.event.addDomListener(window, 'load', function() {
  map = new google.maps.Map(document.getElementById('input-map'), {
    center: {
      lat: 37.4,
      lng: -119.509444
    },
    zoom: 6,
    scrollwheel: false,
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });

});
