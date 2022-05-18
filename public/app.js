const latitude = 48.856614;
    longitude = 2.3522219

var map = L.map('map', {
    center: [latitude, longitude],
    zoom:4
});


// var popup = L.popup()
//     .setLatLng([latitude, longitude])
//     .setContent("I am in Paris")
//     .openOn(map);

//     var popup = L.popup();

L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    
}).addTo(map);