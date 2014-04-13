<!DOCTYPE html>
<html lang="en"git >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="website/themes/assets/ico/.ico">
    <title>Tembo Tarangire</title>

    <!-- Bootstrap core CSS -->
    {{HTML::style("website/themes/dist/css/bootstrap.min.css")}}
    {{ HTML::style("website/font-awesome/css/font-awesome.css") }}
    {{ HTML::style("website/jqueryui/css/start/jquery-ui.css") }}
    {{ HTML::style("website/style/delta.grey.css") }}
    {{ HTML::style("website/style/delta.main.css") }}
    <link href="http://fonts.googleapis.com/css?family=Chewy" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Terminal+Dosis+Light" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    {{HTML::script("website/themes/assets/js/ie8-responsive-file-warning.js")}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <![endif]-->

  <!-- Custom styles for this template -->
    {{HTML::style("website/themes/assets/css/carousel.css")}}

    {{ HTML::script("website/js/jquery-1.9.1.js") }}
</head>
<!-- NAVBAR
================================================== -->
<body style="font-family: Maven Pro;">
<div class="navbar-wrapper" >
    <div class="container" >

        <div class="navbar navbar-inverse navbar-static-top" role="navigation" style="border-radius:10px;background-image: url(<?php echo asset("pattern/pattern111.jpg") ?>)">
            <div class="container" >
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="font-size: 25px">Tembo Tarangire</a>
                </div>
                <div class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav"  style="font-size: 18px;padding-left: 100px">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('about')}}">About Us</a></li>
                        <li><a href="{{url('service')}}">Services</a></li>
                        <li><a href="{{url('activity')}}">Activities</a></li>
                        <li><a href="{{url('room')}}">Room Booking</a></li>
                        <li><a href="{{url('gallery')}}">Gallery</a></li>
                        <li><a href="{{url('contact')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
   @yield('contents')
<div class="introSection">
    <div class="container" style="font-family: Maven Pro;">
        <div class="row">
            <div class="col-lg-5">
                <h3>Welcome to Tembo Tarangire</h3>
                <p>
                    Butman International Ltd is a legally registered Company in Tanzania with a certificate of Incorporation
                    No. 48251, registration was done in February 2004.  The Company has engaged itself in tourism, accommodation,
                    Nature Conservation Research and Construction since registered.
                    One of the major objectives is to be an active player in the tourism industry aiming to become substantial
                    contributor to the economical well being of its stakeholders in particular, and the country in general.
                </p>
            </div>

            <div class="col-lg-4">
                <h2>Tourism</h2>
                <p>
                    Tanzania's oldest and most popular national park, the Serengeti is famed for its annual migration,
                    when some six million hooves pound the open plains, as more than 200,000 zebra and 300,000 Thomson's
                    gazelle join the wildebeest’s trek for fresh grazing.<br>

                </p>
                <p><a class="btn btn-default" href="{{url('tourism')}}" role="button">Read More &raquo;</a></p>
            </div>

            <div class="col-lg-3">
                <h3>Special Offers</h3>
                <p>
                    At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can take
                </p>
                <a href="menu/"><img src="{{asset('website/themes/assets/images/offer.png')}}" alt="Generic placeholder image"> </a>
            </div>

        </div>
    </div>
</div>


<div class="container marketing">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Fish and Chips <span class="text-muted">It's very very testy</span></h2>
                        <p class="lead">At Tembop Tarangire lodge we also accommodate camping, whereby the area for camping can tak</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('website/themes/assets/images/fish-and-chips.png')}}" alt="Fish and Chips">
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img src="{{asset('website/themes/assets/images/burger.png')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Oh yeah, very nice Burger. <span class="text-muted">Delicious.</span></h2>
                        <p class="lead">At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can tak</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Try yourself <span class="text-muted">Testy</span></h2>
                        <p class="lead">At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can tak</p>
                    </div>
                    <div class="col-md-5">
                        <img class="img-circle" src="{{asset('website/themes/assets/images/drinks.png')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.carousel -->
</div><!-- /.container -->
<!-- /END THE FEATURETTES -->


<!-- FOOTER -->
<footer>
    <div class="container">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 African Tourism Services International Ltd. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{HTML::script("website/themes/dist/js/bootstrap.min.js")}}
{{HTML::script("website/themes/assets/js/holder.js")}}
{{ HTML::script("website/js/jquery.form.js") }}
{{ HTML::script("website/jqueryui/js/jquery-ui-1.10.3.custom.js") }}
{{ HTML::script("website/bootstrap/js/bootstrap.js") }}
</body>
</html>
