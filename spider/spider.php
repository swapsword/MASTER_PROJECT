<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Overlapping Marker Spiderfier demo</title>
    <style>
        html { height: auto; }
        body { height: auto; margin: 0; padding: 0; font-family: Georgia, serif; font-size: 0.9em; }
        table { border-collapse: collapse; border-spacing: 0; }
        p { margin: 0.75em 0; }
        #map_canvas { height: auto; position: absolute; bottom: 0; left: 0; right: 0; top: 0; }
        @media print { #map_canvas { height: 950px; } }
    </style>
    <script src="http://maps.google.com/maps/api/js?v=3.9&amp;sensor=false"></script>
    <script src="oms.min.js"></script>
    <script>
        window.onload = function() {
            var gm = google.maps;
            var map = new gm.Map(document.getElementById('map_canvas'), {
                mapTypeId: gm.MapTypeId.SATELLITE,
                center: new gm.LatLng(50, 0), zoom: 6,  // whatevs: fitBounds will override
                scrollwheel: false
            });
            var iw = new gm.InfoWindow();
            var oms = new OverlappingMarkerSpiderfier(map,
                {markersWontMove: true, markersWontHide: true});
            var usualColor = 'eebb22';
            var spiderfiedColor = 'ffee22';
            var iconWithColor = function(color) {
                return 'http://chart.googleapis.com/chart?chst=d_map_xpin_letter&chld=pin|+|' +
                color + '|000000|ffff00';
            }
            var shadow = new gm.MarkerImage(
                'https://www.google.com/intl/en_ALL/mapfiles/shadow50.png',
                new gm.Size(37, 34),  // size   - for sprite clipping
                new gm.Point(0, 0),   // origin - ditto
                new gm.Point(10, 34)  // anchor - where to meet map location
            );

            oms.addListener('click', function(marker) {
                iw.setContent(marker.desc);
                iw.open(map, marker);
            });
            oms.addListener('spiderfy', function(markers) {
                for(var i = 0; i < markers.length; i ++) {
                    markers[i].setIcon(iconWithColor(spiderfiedColor));
                    markers[i].setShadow(null);
                }
                iw.close();
            });
            oms.addListener('unspiderfy', function(markers) {
                for(var i = 0; i < markers.length; i ++) {
                    markers[i].setIcon(iconWithColor(usualColor));
                    markers[i].setShadow(shadow);
                }
            });

            var bounds = new gm.LatLngBounds();
            for (var i = 0; i < window.mapData.length; i ++) {
                var datum = window.mapData[i];
                var loc = new gm.LatLng(datum.lat, datum.lon);
                bounds.extend(loc);
                var marker = new gm.Marker({
                    position: loc,
                    title: datum.h,
                    map: map,
                    icon: iconWithColor(usualColor),
                    shadow: shadow
                });
                marker.desc = datum.d;
                oms.addMarker(marker);
            }
            map.fitBounds(bounds);
            // for debugging/exploratory use in console
            window.map = map;
            window.oms = oms;
        }
    </script>
</head>
<body><div id="map_canvas"></div></body>
<script>
    // randomize some overlapping map data -- more normally we'd load some JSON data instead
    var baseJitter = 2.5;
    var clusterJitterMax = 0.1;
    var rnd = Math.random;
    var data = [];
    var clusterSizes = [1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2,2, 3, 3, 4, 5, 6, 7, 8, 9, 12, 18, 24];
    for (var i = 0; i < clusterSizes.length; i++) {
        var baseLon = -1 - baseJitter / 2 + rnd() * baseJitter;
        var baseLat = 52 - baseJitter / 2 + rnd() * baseJitter;
        var clusterJitter = clusterJitterMax * rnd();
        for (var j = 0; j < clusterSizes[i]; j ++) data.push({
            lon: baseLon - clusterJitter + rnd() * clusterJitter,
            lat: baseLat - clusterJitter + rnd() * clusterJitter,
            h:   new Date(1E12 + rnd() * 1E11).toString(),
            d:   Math.round(rnd() * 100) + '% happy'
        });
    }
    window.mapData = data;
</script>
</html>