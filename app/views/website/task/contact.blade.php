@extends('website.layout.master')

@section('contents')

<div class="pageTitle">
    <div class="container">
        <h2>Contact Us</h2>
    </div>
</div>
    <div class="item active">
        <script
            src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
        </script>
        <script>
            var myCenter=new google.maps.LatLng(51.508742,-0.120850);
            var marker;
            function initialize()
            {
                var mapProp = {
                    center:myCenter,
                    zoom:15,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                };
                var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                marker=new google.maps.Marker({
                    position:myCenter,
                    // icon:'themes/assets/images/nepali-momo.png',
                    animation:google.maps.Animation.BOUNCE
                });

                marker.setMap(map);

                // Info open
                var infowindow = new google.maps.InfoWindow({
                    content:"Hello World!"
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
</div>



<div class="highlightSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="media">
                    <a href="menu/"><img src="{{asset('website/themes/assets/images/nepali-momo.png')}}" alt="Generic placeholder image"> </a>
                    <h3 class="media-heading text-primary-theme">ARUSHA</h3>
                    <div class="col">
                        <p class="pad">Ally Hassan Mwinyi Rd, Oil Com, Opp BMTL</p>
                        <p class="cols"> Freephone:+255 754 319 653<br>
                            Telephone:+255 22273055<br>
                            Fax:+255 22273055<br>
                            Email:panta_com@yahoo.com</p>
                        +255 754 418828<br>
                        <a href="#" class="color1 text-primary-theme">www.butmaninternational.com</a></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="media"><a href="menu/"><img src="{{asset('website/themes/assets/images/gorkha-special-chicken.png')}}" alt="Generic placeholder image"> </a>
                    <h3 class="media-heading text-primary-theme">DAR ES SALAAM</h3>
                    <div class="col">
                        <p class="pad">Ally Hassan Mwinyi Rd, Oil Com, Opp BMTL</p>
                        <p class="cols"> Freephone:+255 754 319 653<br>
                            Telephone:+255 22273055<br>
                            Fax:+255 22273055<br>
                            Email:panta_com@yahoo.com</p>
                        +255 754 418828<br>
                        <a href="#" class="color1 text-primary-theme">www.butmaninternational.com</a></div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="media">
                    <a href="menu/"><img src="{{asset('website/themes/assets/images/znzibar.png')}}" alt="Generic placeholder image"> </a>
                    <h3 class="media-heading text-primary-theme">Zanzibar</h3>
                    <div class="col">
                        <p class="pad">Ally Hassan Mwinyi Rd, Oil Com, Opp BMTL</p>
                        <p class="cols"> Freephone:+255 754 319 653<br>
                            Telephone:+255 22273055<br>
                            Fax:+255 22273055<br>
                            Email:panta_com@yahoo.com</p>
                        +255 754 418828<br>
                        <a href="#" class="color1 text-primary-theme">www.butmaninternational.com</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop