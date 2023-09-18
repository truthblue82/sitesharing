<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    </script>
    <style type="text/css">
		html { height: 100% }
		body { height: 100%; margin: 0; padding: 0 }
		#map-canvas { height: 100% }
    </style>	
    <script type="text/javascript" src="../../js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDofZsp5-Bmqz73rttQWVJ7fK_cX6VtWLo&sensor=true"></script>
    <script type="text/javascript">	
        function initialize() {
            var lat = "10.835222";
            var lng = "106.750778";

            var title = "<?php echo (isset($_GET['title'])) ? $_GET['title']  : "Hamina"; ?>";
            var myLatlng = new google.maps.LatLng(lat, lng);
            var mapOptions = {
                    zoom: 16,
                    center: myLatlng,
                    scrollwheel: false,
                    disableDoubleClickZoom: true,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
              title: title
            });

        }
        google.maps.event.addDomListener(window, 'load', initialize);

        window.onresize = initialize;
    </script>
	
  </head>
  <body>
        <div id="map-canvas" style="width:100%;heght:50%;"/>	
  </body>
</html>