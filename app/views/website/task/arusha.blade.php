@extends('website.layout.master')

@section('contents')

<div class="pageTitle">
    <div class="container">
        <h2>Tourism</h2>
        <ul class="nav navbar-nav">
            <li><a href="{{url('serengeti')}}">Serengeti National Park</a></li>
            <li><a href="{{url('tarangire')}}">Tarangire National Park</a></li>
            <li><a href="{{url('#')}}">Arusha National Park</a></li>
            <li><a href="{{url('ngorongoro')}}">Ngorongoro Conservation</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="bodyInner">
        <div class="row">
            <div class="col-md-8">
                <p>
                    Arusha National Park is covering 137 sq. kilometres and lies between the peaks of Mountain Kilimanjaro and Mount Meru and ascends from 1500 metres at Momella to 4566 metres at the summit of Mount Meru. Established in 1960 the park had contained Ngurdoto Crater and Momella lakes, until 1967 when Mt. Meru was made part of the Park.
                </p><p>
                    The flora and fauna varies with the topography, which ranges from forest to swamp. The best time for visiting is during the dry season from July-March. The best months to climb Mount Meru are June-February (although there are some rains in November). On clear days magnificent views of Mount Kilimanjaro and Mt. Meru can be seen from almost any part of the park. The best views of Mt. Kilimanjaro are from December-February.
                </p><p><strong>  Location</strong></p><p>

                    The Park is only 25 kilometers East of Arusha, 58 kilometers from Moshi and 35 kilometers from Kilimanjaro International Airport (KIA). It is the nearest National Park to both Arusha and Kilimanjaro International Airport and is thereby and easy day trip. From the main road between Arusha and Moshi it is about 10 kilometers to reach Ngurdoto Gate.
                </p><p>
                    From Tembo Tarangire lodge & camp is 140km to Arusha National Park (2hrs)
                </p>
            </div>
            <div class="col-md-3">
                <img  class="img"  style="width: 400px; height: 300px;box-shadow: 5px 5px 10px #888888"  src="{{asset('website/themes/assets/images/colobus_monkey.jpg')}}" alt="Generic placeholder image">
            </div>
            <div class="col-md-1">

            </div>
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        </div>

    </div>
</div>


@stop