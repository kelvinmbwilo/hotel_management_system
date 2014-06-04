@extends('website.layout.master')

@section('contents')

<div class="pageTitle">
    <div class="container">
        <h2>Tourism</h2>
        <ul class="nav navbar-nav" style="color: #79c9ec">
            <li><a href="{{url('serengeti')}}">Serengeti National Park</a></li>
            <li><a href="{{url('tarangire')}}">Tarangire National Park</a></li>
            <li><a href="{{url('arusha')}}">Arusha National Park</a></li>
            <li><a href="{{url('#')}}">Ngorongoro Conservation</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="bodyInner">
        <div class="row">
            <div class="col-md-8">
                <p>
                    To Create and Promote Sustainable Tourism and Quality Construction.
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                    The Ngorongoro Conservation Area is huge area with a total of 8,288 sq kms. The areaincludes some other small craters known as Empakai, Olmoti, together with mountains, the archeological sites of Olduvai Gorge, rolling plains, forests, lakes, dunes and of course Ngorongoro Crater. The highest peak of the area stands at 3,600 mts above the sea level known as mount Lolmalasin. Active volcanoes of mt. Oldonyo Lengai is located on the North East side of the Area, Ngorongoro Crater, the first view of it is absolute splendor. The most striking feature, the Eden of Africa, one of the wonders of the world!. The Crater has an area of about 260sq Km, that is 19 km across. It stands 2,286mt. above the sea level, the floor lies about 610mt. below the rim.
                </p><p>
                    The crater has a spectacular concentration of wildlife. Within the crater there is shallow soda lake (Magadi) and flamingos who dwell around the lake which remains dry sometimes. The best place to see rhinos throughout the year, the bird life is also rich and the hunting ground for lions, cheetahs and hyenas.
                </p><p>
                    Ngorongoro crater has graduated a bowl known as "Caldera", which is formed when the molten core of the volcano subsides into the earth and the steep crater sides fall inward.
                </p>
            </div>
            <div class="col-md-3">
                <img  class="img"  style="width: 400px; height: 300px;box-shadow: 5px 5px 10px #888888"  src="{{asset('website/themes/assets/images/ngorongoro.jpg')}}" alt="Generic placeholder image">
            </div>
            <div class="col-md-1">

            </div>

        </div><p>
            The crater has a spectacular concentration of wildlife. Within the crater there is shallow soda lake (Magadi) and flamingos who dwell around the lake which remains dry sometimes. The best place to see rhinos throughout the year, the bird life is also rich and the hunting ground for lions, cheetahs and hyenas.
        </p><p>
            From Tembo Tarangire lodge & camp is 120km to Ngorongoro Crater and conservation is (about 1:5hrs)
        </p>

    </div>
</div>


@stop