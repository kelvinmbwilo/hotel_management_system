﻿<!DOCTYPE html>
<html lang="en">
<head>
    <title>ATSIL</title>
    <meta charset="utf-8">
    {{ HTML::style("css/reset.css") }}
    {{ HTML::style("css/layout.css") }}
    {{ HTML::style("css/style.css") }}
    {{ HTML::script("js/jquery-1.6.js") }}
    {{ HTML::script("js/cufon-yui.js") }}
    {{ HTML::script("js/cufon-replace.js") }}
    {{ HTML::script("js/Adamina_400.font.js") }}
    {{ HTML::script("js/jquery.jqtransform.js") }}
    {{ HTML::script("js/script.js") }}
    {{ HTML::script("js/kwicks-1.5.1.pack.js") }}
    {{ HTML::script("js/atooltip.jquery.js") }}

    {{ HTML::style("font-awesome/css/font-awesome.css") }}
    {{ HTML::style("jqueryui/css/start/jquery-ui.css") }}
<!--    {{ HTML::style("DataTables/media/css/jquery.dataTables.css") }}-->
<!--    {{ HTML::style("DataTables/media/css/jquery.dataTables_themeroller.css") }}-->

    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5.js"></script>
    {{ HTML::style("css/ie.css") }}
    <![endif]-->


</head>
<body id="page1">
<div class="bg1">
    <div class="bg2">
        <div class="main">
            <!-- header -->
            <header>
                <h1><a href="index.html"><img src="{{ asset('img/logo.png') }}" alt=""></a></h1>
                <div class="department"> Headquarters
                    P.O. Box 11209, Arusha, Tanzania.
                    <br>
          <span>Tel/Fax: 255 27 2506236<br>
            Tel (mobile): +255 754 418828<br>&nbsp;&nbsp;
            e-mail addresses:
            info@butmaninternational.com<br>
            website: www.butmaninternational.com</span> </div>
            </header>
            <div class="box">
                <nav>
                    <ul id="menu">
                        <li class="active"><a href="index.html">About Us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="{{ url('rooms') }}">Rooms</a></li>
                        <li><a href="locations.html">Locations</a></li>
                        <li class="last"><a href="gallery.html">Gallery</a></li>
                    </ul>
                </nav>
                <!-- header end -->

                <!-- content -->
                @yield('contents')

                <!--content end-->
            </div>
        </div>
    </div>
</div>
<div class="main">
    <!-- footer -->
    <footer>
        <div class="col2">Copyright &copy; <a href="#">Domain Name</a> All Rights Reserved | Design by <a target="_blank" href="http://www.dotphics.com/">dotphics.com</a>
            <nav>
                <ul id="footer_menu">
                    <li class="active"><a href="index.html">About Us</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="rooms.html">Rooms</a></li>
                    <li><a href="booking.html">Gallery</a></li>
                    <li class="last"><a href="locations.html">Locations</a></li>
                </ul>
            </nav>
        </div>
        <div class="col1 pad_left1">
            <ul id="icons">
                <li><a href="#" class="normaltip"><img src="img/icon1.jpg" alt=""></a></li>
                <li><a href="#" class="normaltip"><img src="img/icon2.jpg" alt=""></a></li>
                <li><a href="#" class="normaltip"><img src="img/icon3.jpg" alt=""></a></li>
                <li><a href="#" class="normaltip"><img src="img/icon4.jpg" alt=""></a></li>
            </ul>
        </div>
        <!-- {%FOOTER_LINK} -->
    </footer>
    <!-- footer end -->
</div>
<script type="text/javascript">Cufon.now();</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.kwicks').kwicks({
            max: 500,
            spacing: 0,
            event: 'mouseover'
        });
    })


</script>

</body>
</html>