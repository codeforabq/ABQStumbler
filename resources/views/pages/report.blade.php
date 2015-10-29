@extends('layouts.empty')

@section('title', 'Report')

@section('heading', 'Report')

@section('secondary', 'report something dangerous')

@section('content')
    {!! Form::open(['url' => 'maincs']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}  
    </div>  
    <div class="form-group">
        {!! Form::label('summary', 'Summary:') !!}
        {!! Form::textarea('summary', null, ['class' => 'form-control', 'rows' => '2']) !!}  
    </div>  
    <div class="form-group">
        {!! Form::label('body', 'Grumble:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'maincbod']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}<small>(separate with #symbol)</small>
        {!! Form::text('tags', null, ['class' => 'form-control', 'placeholder' => 'Type tags here (e.g. #pharmacy #levothyroxine #endocrinology #cardiology)']) !!}  
    </div>  
    <div class="form-group">
        {!! Form::submit('Submit Grumble', ['class' => 'btn btn-primary form-control subclass']) !!}
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

@stop