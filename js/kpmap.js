  var map;
  var infoWindow = new google.maps.InfoWindow();
  google.maps.event.addDomListener(window, 'load', function() {
    map = new google.maps.Map(document.getElementById('map-canvas'), {
      center: {
        lat: 34.42,
        lng: -119.845
      },
      zoom: 9,
      scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.TERRAIN
    });

  });
