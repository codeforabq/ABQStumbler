<!DOCTYPE html>
<html lang="en">
@include('partials.head')
    <body>
        @include('partials.nav')
        <!-- Page Content -->
        <div class="container darkp">
            <div class="row">    
                <!-- Main Entries Column -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <h1 class="page-header">
                    @yield('heading')
                    <small>@yield('secondary')</small>
                    </h1>
                    @include('partials.flash')
                    @yield('content')
                </div>
                @include('partials.widgets')
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        @include('partials.footer')
        @include('partials.scripts')
    </body>
</html>