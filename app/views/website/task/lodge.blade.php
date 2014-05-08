@extends('website.layout.master')

@section('contents')



<div class="pageTitle">
    <div class="container">
        <h2>Lodge Environments</h2>
    </div>
</div>


<div class="container marketing">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Chips <span class="text-muted">It's very  testy</span></h2>
                        <p class="lead">At Tembop Tarangire lodge we also accommodate camping, whereby the area for camping can tak</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px" src="{{asset('website/themes/assets/images/images.jpg')}}" alt="Fish and Chips">
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px" src="{{asset('website/themes/assets/images/images1.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Oh yeah, very nice Pizza. <span class="text-muted">Delicious.</span></h2>
                        <p class="lead">At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can tak</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Try yourself; <span class="text-muted">Tasty</span></h2>
                        <p class="lead">At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can tak</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height:300px"  src="{{asset('website/themes/assets/images/images2.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px" src="{{asset('website/themes/assets/images/images3.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Very nice Chicken. <span class="text-muted">Delicious.</span></h2>
                        <p class="lead">At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can tak</p>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- /.carousel -->
</div><!-- /.container -->
<!-- /END THE FEATURETTES -->
@stop