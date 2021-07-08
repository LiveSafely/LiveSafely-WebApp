'use strict"'
// Map  objects eso hacce el mapa 
let map = L.map('mapSivar').setView([13.794185, -88.89653], 8);

// Base map layer
let osmLayer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap<\/a> contributors'
}).addTo(map);

