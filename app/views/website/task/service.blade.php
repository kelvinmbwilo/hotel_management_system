@extends('website.layout.master')

@section('contents')
<div class="pageTitle">
    <div class="container">
        <div class="col-md-1">

            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        </div><!-- end /.col-md-1 -->

        <h2>Services</h2>
    </div>
</div>

<div class="container marketing"> <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-md-1">

            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        </div><!-- end /.col-md-1 -->

       <div class="col-md-4">

           <img class="img-circle" src="{{asset('website/themes/assets/images/lodge.jpg')}}" alt="Generic placeholder image">
       </div><!-- end /.col-md-4 -->
       <div class="col-md-4">
           <img class="img-circle" style="height: 170px" src="{{asset('website/themes/assets/images/Restaurant-Blue-2-icon.png')}}" alt="Generic placeholder image">
       </div><!-- end /.col-md-4 -->
       <div class="col-md-3">
           <img class="img-circle" style="width: 200px; height: 170px" src="{{asset('website/themes/assets/images/activitiesIcon.jpg')}}" alt="Generic placeholder image">
       </div><!-- end /.col-md-4 -->

    </div><!-- end row -->

    <div class="row">
        <div class="col-md-1">

            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        </div><!-- end /.col-md-1 -->


        <div class="col-md-4">
            <h2 class="text-info"><img class="img-circle " src="{{asset('website/themes/assets/images/title_marker1.jpg')}}" alt="Generic placeholder image">Lodge</h2>
        </div><!-- end /.col-md-4 -->

        <div class="col-md-4">
            <h2 class="text-info"><img class="img-circle" src="{{asset('website/themes/assets/images/title_marker2.jpg')}}" alt="Generic placeholder image">Restaurant</h2>
        </div><!-- end /.col-md-4 -->

        <div class="col-md-3">
            <h2 class="text-info"><img class="img-circle" src="{{asset('website/themes/assets/images/title_marker3.jpg')}}" alt="Generic placeholder image">Activities</h2>
        </div><!-- end /.col-md-4 -->

    </div><!-- end row -->


    <div class="row">
        <div class="col-md-1">

            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        </div><!-- end /.col-md-1 -->


        <div class="col-md-4">
            <p>Tembo Tarangire Lodge is an exceptional lodge with bungalows built traditionally by using local tropical woods material of rectangular style
                copied from different tribes of Tanzania traditional huts.The verandah outside furnished with traditional chairs...</p>
        </div><!-- end /.col-md-4 -->

        <div class="col-md-4">
            <p>At the heart of the camp are impressively high thatched roots of Lounge and dinning room, the open-sided design allows an uninterrupted view of the bush and
                wildlife, capturing the cooling breeze while you dine or our delicious home cooked cusine.  </p>
        </div><!-- end /.col-md-4 -->

        <div class="col-md-3">
            <p>At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can take (100-150) people. Camping with all facilities like using lodge chef/cooker, all cooking facilities and lodge tents is available depending on your choice...
            </p>
        </div><!-- end /.col-md-4 -->

    </div><!-- end row -->


    <div class="row">
        <div class="col-md-1">

            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        </div><!-- end /.col-md-1 -->


        <div class="col-md-4">
            <a class="btn btn-default" href="{{url('lodge')}}" role="button">More &raquo;</a>
        </div><!-- end /.col-md-4 -->

        <div class="col-md-4">
            <a class="btn btn-default" href="{{url('restaurant')}}" role="button">More &raquo;</a>
        </div><!-- end /.col-md-4 -->

        <div class="col-md-3">
            <a class="btn btn-default" href="{{url('activities')}}"  role="button">More &raquo;</a>
        </div><!-- end /.col-md-4 -->

    </div><!-- end row -->
</div>
@stop