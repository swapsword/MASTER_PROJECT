<?php include 'main.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Geocoding service</title>
    <style>
        html, body, #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
        }
        #panel {
            position: absolute;
            top: 5px;
            left: 50%;
            margin-left: -180px;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script>
        function loc() {
            var alllocation = <?php echo json_encode($data); ?>;
            console.log(alllocation);
            var loca = alllocation.map( function( el ){
                return el.location;
            });
            console.log(loca);
            var index;
            for(index in loca) {
                var result =loca[index];
                if(result != ""){
                    codeAddress(result,index);
                }

            }

        }
        var geocoder;
        var map;
        function initialize() {                                              //2
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var mapOptions = {
                zoom: 2,
                center: latlng
            }
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions); //3
        }

        function codeAddress(result,index) {
            var address = String(result);
            console.log(typeof address);
            var marker;
            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                    marker.setTitle(index);
                    attachSecretMessage(marker, index);
                }
            });
        }

        function attachSecretMessage(marker, i) {
            var alltext = <?php echo json_encode($text); ?>;
            console.log(alltext);
            var tex = alltext.map( function( el ){
                return el.text;
            });
            console.log(tex);
            var infowindow = new google.maps.InfoWindow({
                content: tex[i]
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(marker.get('map'), marker);
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize); //1
    </script>
</head>
<body>
<div id="panel">
    <input type="button" value="Geocode" onclick="loc()">
</div>
<div id="map-canvas"></div>
</body>
</html>