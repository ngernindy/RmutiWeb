<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      var position={lat:16.428576, lng:102.8634619};
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {

            //set long & lat

            center:position,
            zoom: 17


            

        //   center: {lat: -34.397, lng: 150.644},
        //   zoom: 8
        });
        var marker = new google.maps.Marker({
          position: position,
          map:map,
        })
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClN9BQptnCg0FkA_aJ7eNPb4_9KmHvF28&callback=initMap"
    async defer></script>
  </body>
</html>