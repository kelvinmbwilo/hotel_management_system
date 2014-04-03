@extends('website.layout.master')

@section('contents')
<div class="pageTitle">
    <div class="container">
        <h2>Rooms</h2>
    </div>
</div><br><br>
<div class="container marketing">
    <div id="myCarousel3" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-inner">

            <?php $rooms = Room::all(); $i=0; $j=0; $no = $rooms->count();?>
            <div class="item active"><div class="row">
            @foreach($rooms as $room)
            <?php $i++; $j++;?>

                    <div class="col-lg-4">
                        <img style="height: 240px;width: 370px" class="img-thumbnail img-rounded img-responsive" src="{{asset("uploads/rooms/{$room->image}")}}" alt="Generic placeholder image">
                        <h4 class="lead">{{ $room->name }}</h4>
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
            modal+= '<h4 class="modal-title" id="myModalLabel">Fill this form</h4>';
            modal+= '</div>';
            modal+= '<div class="modal-body">';

            modal+= ' </div>';
            modal+= '<div class="modal-footer">';
            modal+= '   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
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