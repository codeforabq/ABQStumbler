@extends('layouts.empty')

@section('title', 'Report')

@section('heading', 'Report')

@section('secondary', 'report something dangerous')

@section('content')
    {!! Form::open(['url' => 'maincs']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Report:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}  
    </div>  
    <div class="form-group">
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image', null, ['class' => 'form-control']) !!}  
    </div>
    <div class="form-group">
        {!! Form::label('location', 'Location:') !!}
        {!! Form::text('location', null, ['class' => 'form-control', 'value' => '30']) !!}
        <p id="demo"></p>
    </div>  
    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}<small>(separate with #symbol)</small>
        {!! Form::text('tags', null, ['class' => 'form-control', 'placeholder' => 'Type tags here (e.g. #sidewalk #tree #bikelane)']) !!}  
    </div>  
    <div class="form-group">
        {!! Form::submit('Submit Report', ['class' => 'btn btn-primary form-control subclass']) !!}
    </div>
    {!! Form::close() !!}
    @if($errors->any())
        <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">- {{ $error }}</li>
        @endforeach
        </ul>
    @endif
@stop

@section('scripts')
<script>
$(function() {
    
    navigator.geolocation.getCurrentPosition(showPosition);
    
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude + 
        "<br>Longitude: " + position.coords.longitude;	
    }
});
</script>
@stop