@extends('layouts.empty')

@section('title', 'Incident Map')

@section('hscripts')

<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.2.0/leaflet-omnivore.min.js'></script>

@stop


@section('heading', 'Incident Map')

@section('secondary', 'past pedestrian incidents')

@section('content')
 <div id="map"></div>
<hr>
@stop

@section('scripts')
<script>
$(function() {
    var map = L.map('map').setView([35.097, -106.616], 12);
    
    
    var runLayer = omnivore.kml('/film.kml')
        .on('ready', function() {
            map.fitBounds(runLayer.getBounds());
        })
        .addTo(map);
    
    
    
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'egross.o1afeb6b',
    accessToken: 'pk.eyJ1IjoiZWdyb3NzIiwiYSI6ImNpZ2N1b3hvdTBla2x1MW02djhvMGpnZTQifQ.WylLm2WsWB0Dt1ak62-Omw'
}).addTo(map);
    
});
</script>
@stop