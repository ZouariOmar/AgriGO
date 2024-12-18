let mapDestination, mapCurrent;

function initMap() {
    const defaultLocation = { lat: 0, lng: 0 };

    mapDestination = new google.maps.Map(document.getElementById('map-destination'), {
        center: defaultLocation,
        zoom: 13
    });

    mapCurrent = new google.maps.Map(document.getElementById('map-current'), {
        center: defaultLocation,
        zoom: 13
    });

    const input = document.getElementById('pac-input');
    const searchBox = new google.maps.places.SearchBox(input);
    mapDestination.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    mapDestination.addListener('bounds_changed', function() {
        searchBox.setBounds(mapDestination.getBounds());
    });

    searchBox.addListener('places_changed', function() {
        const places = searchBox.getPlaces();
        if (places.length === 0) return;

        const bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) return;

            new google.maps.Marker({
                map: mapDestination,
                title: place.name,
                position: place.geometry.location
            });

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        mapDestination.fitBounds(bounds);
    });

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            const pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            mapCurrent.setCenter(pos);
            new google.maps.Marker({
                position: pos,
                map: mapCurrent,
                title: 'Your Location'
            });
        }, () => {
            handleLocationError(true, mapCurrent.getCenter());
        });
    } else {
        handleLocationError(false, mapCurrent.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, pos) {
    const infoWindow = new google.maps.InfoWindow();
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(mapCurrent);
}