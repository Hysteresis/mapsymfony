let latitude 
let longitude 


latitude = document.querySelector('#lat').innerText
longitude = document.querySelector('#lon').innerText

console.log(latitude)
console.log(longitude)


var map = L.map('map', {
    center: [latitude, longitude],
    zoom:12
});


// var popup = L.popup()
//     .setLatLng([latitude, longitude])
//     .setContent("I am in Paris")
//     .openOn(map);

//     var popup = L.popup();

L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    
}).addTo(map);


