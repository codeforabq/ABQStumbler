<!-- Sidebar Widgets Column -->
<div class="col-md-3 col-sm-12 col-xs-12">
    <!-- Search Well -->
    <div class="well">
        <h4>Stumble Search</h4>
        <form role="form" method="POST" action="{{ url('/search/show') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="usearch">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                    <span class="fa fa-search"></span>
                    </button>
                    </span>
                </div>
            </div>
        </form>
        <!-- /.input-group -->
        <hr>
        <div class="input-group">
            <a class="btn btn-primary" href="{{ URL::to('/maincs/create') }}" role="button">Report</a>
        </div>
    </div>
    <!-- Categories Well -->
    <div class="well">
        <h4>Popular Tags</h4>
        <div class="row">
            <?php  
            $tags = DB::table('tags')
            ->select('tags.name', 'tags.id')
            ->where(DB::raw('LENGTH(tags.name)'), '<', 15)
            ->where(DB::raw('LENGTH(tags.name)'), '>', 5)
            ->take(6)
            ->get();
            $i=0
            ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            @foreach($tags as $tag)
            <?php $i++ ?>
            {!! Form::open(['url' => '/tag/show', 'tagid' => "$tag->id"]) !!}
            {!! Form::hidden('tagid', $tag->id) !!}
                <div class="form-group">
                    {!! Form::submit("#$tag->name", ['class' => 'btn btn-info btn-xs']) !!}
                </div>
            {!! Form::close() !!}
            @if($i == 3)
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <ul class="list-unstyled">
                @endif
                @endforeach
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- Side Widget Well -->
<!--
    <div class="well">
    <p class="lead">Extra Well!</p>
    <a class="btn btn-sm btn-primary" href="/badge">Extra Well!</a>
        Ads
    </div>
-->
</div>