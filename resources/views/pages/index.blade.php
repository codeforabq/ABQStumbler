@extends('layouts.master')

@section('title', 'ABQ Stumbler')

@section('description', 'help make Albuquerque a safer place!')

@section('summary', 'Stumble')

@section('heading', 'Stumble')

@section('secondary', 'watch out for dangerous situations!')

@section('maincs')
    @if($userquests->isEmpty())
       <div class="alert alert-danger" role="alert">No Results found</div>
    @endif

    @foreach($userquests as $userquest)
        <?php  
        $summary = strip_tags($userquest->summary);
        $body = strip_tags($userquest->body);  
        $bodyst = str_limit($body, 350);
        $qid = $userquest->id;
        $uid = $userquest->uid;
        $tags = DB::table('tags')
        ->join('mainctags', 'tags.id', '=', 'mainctags.tag_id')
        ->where('mainctags.mainc_id', '=', $qid)
        ->select('tags.name', 'tags.id')
        ->get();
        ?>
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <h2 class="user-display"><a href="{{url('/maincs', $userquest->slug )}}">{{ $userquest->title }}</a></h2>
                <p> by <strong>{{ $userquest->name }}</strong> 
                @if(empty($userbadge->badge))
                @else
                <span class="fa {{ $userbadge->badge }}"></span></p>
                @endif
                <p><span class="fa fa-clock-o"></span> Posted {{ \Carbon\Carbon::parse($userquest->created_at)->diffForHumans()}}</p>
                <hr>
                <h3 class="user-display">{{ $summary }}</h3>
                <p class="user-display">{{ $bodyst }}...<a href="{{url('/maincs', $userquest->slug )}}">Read More</a></p>
                <a class="btn btn-primary" href=" {{url('/maincs', $userquest->slug)}}#maincommainc">ReGrumble</a>
                <h5>
                @foreach($tags as $tag)
                {!! Form::open(['url' => '/tag/show', 'tagid' => "$tag->id"]) !!}
                {!! Form::hidden('tagid', $tag->id) !!}
                <div class="form-group form-inline">
                    {!! Form::submit("#$tag->name", ['class' => 'btn btn-info btn-xs']) !!}
                </div>
                {!! Form::close() !!}
                @endforeach
                </h5>
            </div>
        </div>
        <hr>
    @endforeach
@stop

@section('scripts')

<script>

</script>

@stop



