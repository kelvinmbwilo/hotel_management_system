@extends('website.layout.master')

@section('contents')
<div class="pageTitle">
    <div class="container">
        <h2>Services</h2>
    </div>
</div>

<div class="container marketing"> <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <img class="img-circle" src="{{asset('website/themes/assets/images/nepali-momo.png')}}" alt="Generic placeholder image"><br>
            <h2><img class="img-circle" src="{{asset('website/themes/assets/images/title_marker1.jpg')}}" alt="Generic placeholder image">Lodge</h2>
            <p>At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can take</p>
            <p><a class="btn btn-default" href="#" role="button">Read More &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="{{asset('website/themes/assets/images/nepali-momo.png')}}" alt="Generic placeholder image"><br>
            <h2><img class="img-circle" src="{{asset('website/themes/assets/images/title_marker2.jpg')}}" alt="Generic placeholder image">Restaurant</h2>
            <p>At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can take </p>
            <p><a class="btn btn-default" href="#" role="button">Read More &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="{{asset('website/themes/assets/images/nepali-momo.png')}}" alt="Generic placeholder image"><br>
            <h2><img class="img-circle" src="{{asset('website/themes/assets/images/title_marker3.jpg')}}" alt="Generic placeholder image">Activities</h2>
            <p>At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can take</p>
            <p><a class="btn btn-default" href="{{url('activities')}}"  role="button">Read More &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>
@stop