@extends('website.layout.master')

@section('contents')




<!-- Carousel
================================================== -->

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">

                <img src="{{asset('website/themes/assets/images/1.png')}}" alt="Generic placeholder image">
                <div class="carousel-caption">
                    <a class="btn btn-lg btn-default" href="{{url('room')}}" role="button" style="font-size:2em">Book Room Online Now &raquo;</a>
                </div>
            </div>

            <div class="item">
                <img src="{{asset('website/themes/assets/images/2.png')}}" alt="Generic placeholder image">
                <div class="carousel-caption">
                    <a class="btn btn-lg btn-default" href="{{url('room')}}" role="button" style="font-size:2em">Book Room Online Now &raquo;</a>
                </div>
            </div>

            <div class="item">
                <img src="{{asset('website/themes/assets/images/3.png')}}" alt="Generic placeholder image">
                <div class="carousel-caption">
                    <a class="btn btn-lg btn-default" href="{{url('room')}}" role="button" style="font-size:2em">Book Room Online Now &raquo;</a>
                </div>
            </div>

        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>


<div class="mainTitle">
    <div class="container">
        <h2>Welcome to Tembo Tarangire</h2>
        <p class="text-success">
            At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can take (100-150) people......
        </p>
    </div>
</div>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing"> <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">

            <i class="fa fa-bell-o fa-5x text-success"></i><br>
            <h2 class="text-info"><img class="img-circle" src="{{asset('website/themes/assets/images/title_marker1.jpg')}}" alt="Generic placeholder image">Services</h2>
            <p>At Tembo Tarangire we offer quality services for our guests like Lodge,Restaurant, Lounge, camping safari's services etc</p>
            <p><a class="btn btn-default" href="{{url('service')}}" role="button">More &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <i class="fa fa-key fa-5x text-success"></i><br>
            <h2 class="text-info"><img class="img-circle" src="{{asset('website/themes/assets/images/title_marker2.jpg')}}" alt="Generic placeholder image">Hotel Guide</h2>
            <p>At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can take </p>
            <p><a class="btn btn-default" href="{{url('hotelGuide')}}" role="button">More &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <i class="fa fa-cogs fa-5x text-success"></i><br>
            <h2 class="text-info"><img class="img-circle" src="{{asset('website/themes/assets/images/title_marker3.jpg')}}" alt="Generic placeholder image">Activities</h2>
            <p>We accommodate camping,cultural programms, construction, tours, student's attachment, and conservational research </p>
            <p><a class="btn btn-default" href="{{url('activities')}}" role="button">More &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>




<div class="introSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="cntr">At Tembo Tarangire lodge we also accommodate camping, whereby the area for camping can take (100-150) people.</h1><br><h2 class="text-success text-center">Tembo Tarangire lodge.....</h2>
            </div>
        </div>
    </div>
</div>


    <div class="container">
        <h2 style="text-align: center">Choose a Room for Booking Services</h2>
    </div>
<br>
<div class="container marketing">
    <div id="myCarousel6" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-inner">

            <?php $rooms = Room::all(); $i=0; $j=0; $no = $rooms->count();?>
            <div class="item active"><div class="row">
                    @foreach($rooms as $room)
                    <?php $i++; $j++;?>

                    <div class="col-lg-4">
                        <img style="height: 240px;width: 370px" class="img-thumbnail img-rounded img-responsive" src="{{asset("uploads/rooms/{$room->image}")}}" alt="Generic placeholder image">
                        <h4 class="lead">{{ $room->name }}</h4>
                       <tr> <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category:&nbsp;&nbsp;</td><td class="lead">{{ $room->category }}&nbsp;Size</td><br>
                           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bed Type:&nbsp;&nbsp;</td> <td class="lead">{{ $room->bed_type }}</td><br>
                           <td>Room Price:&nbsp;&nbsp;</td> <td class="lead">{{ $room->price }}</td><br></tr><br>
                        <p><a class="btn btn-default book" id='{{ $room->id }}' href="#" role="button" >Book Room  &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    @if($i == 3 && $j<$no)
                </div></div><div class="item"><div class="row">
                    <?php $i = 0; ?>
                    @endif
                    @endforeach
                </div></div><!-- /.row -->

        </div>
        <a class="left carousel-control" href="#myCarousel3" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#myCarousel3" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
</div>

<script>
    $(document).ready(function(){
        $('.carousel').carousel({
            interval:100000000
        });

        $(".book").click(function(){
            var id = $(this).attr("id");
            var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modal+= '<div class="modal-dialog">';
            modal+= '<div class="modal-content">';
            modal+= '<div class="modal-header">';
            modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modal+= '<h2 class="modal-title" id="myModalLabel">Book This Room</h2>';
            modal+= '</div>';
            modal+= '<div class="modal-body">';

            modal+= ' </div>';
            modal+= '<div class="modal-footer">';
            modal+= '   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
            modal+= '<button type="button" class="btn btn-primary">Save changes</button>';
            modal+= '</div>';
            modal+= '</div>';
            modal+= '</div>';

            $("body").append(modal);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("guest/add") ?>/"+id);
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })

        })
    })
</script>
@stop