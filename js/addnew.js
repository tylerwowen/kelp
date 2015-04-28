var x = document.getElementById("location");
(function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
})()

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude +
    "<br>Longitude: " + position.coords.longitude;
}

function showError(error) {
  switch (error.code) {
    case error.PERMISSION_DENIED:
      console.warn( "User denied the request for Geolocation.")
      break;
    case error.POSITION_UNAVAILABLE:
      console.warn( "Location information is unavailable.")
      break;
    case error.TIMEOUT:
      console.warn( "The request to get user location timed out.")
      break;
    case error.UNKNOWN_ERROR:
      console.warn( "An unknown error occurred.")
      break;
  }
}
