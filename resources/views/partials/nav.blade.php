<!--Nav Begin-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('/') }}"><span class="fa fa-road text-primary"></span> ABQ Stumbler</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('/maincs/create') }}">Report</a>
                </li>
                <li>
                    <a href="{{ URL::to('/education') }}">Education</a>
                </li>
                <li>
                    <a href="{{ URL::to('/incident') }}">Incident Map</a>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse<span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="/browse/new"><i class="fa fa-hourglass-start"></i> Newest</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/browse/tags"><i class="fa fa-tags"></i> Tags</a></li>
                </ul>
                </li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (Auth::check()) {
                $user = Auth::user()->name;
                echo'<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
                echo $user;
                echo'<span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="/profile"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="/profile#posts"><i class="fa fa-file-text"></i> Your Posts</a></li>
                <li><a href="/profile#settings"><i class="fa fa-cog"></i> Settings</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/auth/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
                </li>';
                }
                else 
                echo '<li><a href="/auth/register">Sign Up</a></li>
                <li><a href="/auth/login">Login</a></li>
                ';
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!--Nav End-->