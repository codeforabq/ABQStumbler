<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-control" content="public">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="@yield('description').">
<meta name="keywords" content="@yield('keywords')pedestrian, pedestrian safety, abq pedestrians">

<meta property="og:url"                content="http://www.abqstumbler.com/@yield('slug')" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="@yield('title')" />
<meta property="og:description"        content="@yield('summary')" />
<meta property="og:image"              content="http://www.abqstumbler.com/aspost.png" />

<title>@yield('title')</title>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('hscripts')
</head>
