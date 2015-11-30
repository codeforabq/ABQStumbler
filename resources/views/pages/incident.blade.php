@extends('layouts.empty')

@section('title', 'Incident Map')

@section('hscripts')

    <link rel="stylesheet" href="http://libs.cartocdn.com/cartodb.js/v3/3.15/themes/css/cartodb.css" />


{{--<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />--}}
{{--<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>--}}
{{--<script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.2.0/leaflet-omnivore.min.js'></script>--}}

@stop


@section('heading', 'Incident Map')

@section('secondary', 'past pedestrian incidents')

@section('content')

    {{--<iframe width='100%' height='520' frameborder='0' src='https://codeforabq.cartodb.com/viz/069f5818-95e0-11e5-9fec-0ef7f98ade21/embed_map' allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>--}}

 <div id="map"></div>

@stop

@section('scripts')
    <script src="http://libs.cartocdn.com/cartodb.js/v3/3.15/cartodb.js"></script>
    <script>
        // get the viz.json url from the CartoDB Editor
        // - click on visualize
        // - create new visualization
        // - make visualization public
        // - click on publish
        // - go to API tab

        window.onload = function() {
            cartodb.createVis('map', 'https://codeforabq.cartodb.com/api/v2/viz/069f5818-95e0-11e5-9fec-0ef7f98ade21/viz.json');
        }
    </script>

    {{--<script>--}}
{{--$(function() {--}}
    {{--var map = L.map('map').setView([35.097, -106.616], 12);--}}
    {{----}}
    {{----}}
    {{--var runLayer = omnivore.kml('/film.kml')--}}
        {{--.on('ready', function() {--}}
            {{--map.fitBounds(runLayer.getBounds());--}}
        {{--})--}}
        {{--.addTo(map);--}}
    {{----}}
    {{----}}
    {{----}}
    {{--L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {--}}
    {{--attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',--}}
    {{--maxZoom: 18,--}}
    {{--id: 'egross.o1afeb6b',--}}
    {{--accessToken: 'pk.eyJ1IjoiZWdyb3NzIiwiYSI6ImNpZ2N1b3hvdTBla2x1MW02djhvMGpnZTQifQ.WylLm2WsWB0Dt1ak62-Omw'--}}
{{--}).addTo(map);--}}
    {{----}}
{{--});--}}
{{--</script>--}}
@stop