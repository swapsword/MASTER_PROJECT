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
            var loca = ["", "Faisalabad, Pakistan", "", "karachi,pakistan", "", "New Delhi", "", "", "", "Hyderabad Sindh!", "", "Karachi, Pakistan", "bangalore,india", "", "Pakistan", "City of Lights", "pakistan,islamabad", "", "some where under sky :) ", "Islamabad", "Denmark", "Jaranwala.PAKISTAN ", "", "FOLLOWS YOU ", "Karachi, Pakistan", "", "Pakistan", "Karachi - Pakistan", "Islamabad ", "Worldwide", "", "islamabad", "Pakistan", "Karachi, Pakistan", "Iraq | Uk•London | Lebowakgomo", "Selfiestan ", "kolkata", "", "", "", "KARACHI", "", "", "Karachi", "مصر", "Islamabad", "مصر", "مصر", "", "Delhi", "", "Undercover", "", "", "Riyadh Saudi Arabia ", "Islamabad", "Pakistan", "South Korea", "", "Karachi ", "Sri Lanka", "Lahore Pakistan", "Bombay", "Islamabad ", "Na Maloom Maqaam", "Dubai, United Arab Emirates", "Worldwide", "", "Shj - Dubai ♥", "", "Indian Occupied Kashmir", "", "", "madina", "♥Santiago Bernabéu♥ ", "", "Karachi - Pakistan", "Mirpur, Pakistan", "AUS", "US", "Hyderabad, India", "Delhi, India", "", "The Chi", "Lahore Pakistan", "iN tHe heaRts Of aLL ###", "Gotham City | Earth.", "Faisalabad", "BPI Main Campus", "Karachi, Pakistan", "Islamabad", "Jeddah / Karachi ", "Hyderabad", "Sheffield", "", "Pakistan", "", "karachi,pakistan", "Karachi - Pakistan", "12 year Kid "];
            for(index in loca) {
            var result =loca[index];
                if(result != ""){
            codeAddress(result);
                }

            }
        }

        var geocoder;
        var map;
        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var mapOptions = {
                zoom: 8,
                center: latlng
            }
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        }

function codeAddress(result) {
    var address = result;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
            marker.setTitle(index);
            attachSecretMessage(marker, index);
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
<div id="panel">
    <input type="button" value="Geocode" onclick="loc()">
</div>
<div id="map-canvas"></div>
</body>
</html>