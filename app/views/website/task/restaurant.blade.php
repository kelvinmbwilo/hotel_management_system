@extends('website.layout.master')

@section('contents')



<div class="pageTitle">
    <div class="container">
        <h2>Restaurant Services</h2>
    </div>
</div>


<div class="container marketing">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Chips <span class="text-muted">It's very  tasty</span></h2>
                        <p class="lead">One of the favorite junk foods in Tanzania is known as chips mayai, basically translating to chips and eggs.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/chip.jpg')}}" alt="Fish and Chips">
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/pizza.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Oh yeah, very nice Pizza. <span class="text-muted">Delicious.</span></h2>
                        <p class="lead">May just be the best-kept pizza.... Come and enjoy it.</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Try yourself; <span class="text-muted">Tasty</span></h2>
                        <p class="lead">Red wine and something in it called resveratrol may be good for your heart...</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/ima.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/kuku.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Very nice Chicken. <span class="text-muted">Delicious.</span></h2>
                        <p class="lead">What more can we say? The classic roast chicken is something everyone should know and can always save the day...</p>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- /.carousel -->
</div><!-- /.container -->
<!-- /END THE FEATURETTES -->
@stop