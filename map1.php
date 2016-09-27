<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Using closures in event listeners</title>
    <style>
        html, body, #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script>
        function initialize() {
            var mapOptions = {
                zoom: 4,
                center: new google.maps.LatLng(-25.363882, 131.044922)
            };

            var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

            // Add 5 markers to the map at random locations
            var southWest = new google.maps.LatLng(-31.203405, 125.244141);
            var northEast = new google.maps.LatLng(-25.363882, 131.044922);

            var bounds = new google.maps.LatLngBounds(southWest, northEast);
            map.fitBounds(bounds);

            var lngSpan = northEast.lng() - southWest.lng();
            var latSpan = northEast.lat() - southWest.lat();

            for (var i = 0; i < 5; i++) {
                var position = new google.maps.LatLng(
                    southWest.lat() + latSpan * Math.random(),
                    southWest.lng() + lngSpan * Math.random());
                var marker = new google.maps.Marker({
                    position: position,
                    map: map
                });

                marker.setTitle((i + 1).toString());
                attachSecretMessage(marker, i);
            }
        }

        // The five markers show a secret message when clicked
        // but that message is not within the marker's instance data
        function attachSecretMessage(marker, num) {
            var message = ["Gideon Haigh in great form http://t.co/Wq3IMw2QMm", "4:20. PAKISTAN CRICKET TEAM.", "@The_Sleigher I found this app Vidmate can downloa…sports!Great!You can visit http://t.co/gLd2tf9FUb", "Mashonaland Eagles 133; Mid West Rhinos 118/3 (35 ov) #cricket 477", "@dwirahays I found this app Vidmate can download c…sports!Great!You can visit http://t.co/gLd2tf9FUb", "Can't wait to play midweek cricket matches again! Bring on the summer", "Cricket is nothing more than a broken record of "Phyllis is bad bad bad" #YR", "RT @CricketAus: Meet the man behind the war paint … hurry up in Perth: http://t.co/UExIYFWKRg http:…", "#bdnews #bangladesh Bangladesh Vs. Scotland Cricke…15 ICC Cricket World Cu... http://t.co/AahrYMdCUa", "@KANWALanalyst @ZarrarKhuhro @omar_quraishi @taniyamuneeer @MajydAziz O they are watching cricket 😃", "The cricket kit is getting hung up for an indefinite period of time! This has made me smile!", "Cricket looks as though it'd be really interesting…. As I don't, it remains a bore. #ICCWorldCup2015", "RT @MENnewsdesk: Full story on @LancsCCC getting £…tp://t.co/9E5ytqBK1d #lccc http://t.co/k7Cg0tMZ8Z", "RT @teddy63927: India made light work of winning a…ting the United Arab Emirates by nine wickets in…", "Watching the cricket highlights of South Africa vs…hen we got to take on the bottom group #Runaround"];
            var infowindow = new google.maps.InfoWindow({
                content: message[num]
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(marker.get('map'), marker);
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>
<body>
<div id="map-canvas"></div>
</body>
</html>