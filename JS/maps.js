            function myMap() {
                var myCenter = new google.maps.LatLng(52.254053, 21.001073);
                var mapCanvas = document.getElementById("googleMap");
                var mapOptions = { center: myCenter, zoom: 18 };
                var map = new google.maps.Map(mapCanvas, mapOptions);
                var marker = new google.maps.Marker({ position: myCenter });
                marker.setMap(map);
            }
