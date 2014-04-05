@extends('layout.master')
@section('breadcumbs')
<li><a href="{{url("guest")}}">Home</a></li>
<li class="active">Guests</li>
@stop

@section('content')
<div class="panel panel-default col-md-10">
    <?php
    $roomguest = RoomGuest::all();
    ?>
    <table class='table table-striped table-responsive' id='guesttable'>

        <thead>
        <tr>
            <th> #</th>
            <th> Name </th>
            <th>Room </th>
            <th>Service</th>
            <th>Cost </th>
            <th> Check In </th>
            <th> Check Out </th>
            <th> Action </th>



        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        @foreach(Guest::where('status','Booked')->get() as $mgeni)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{$mgeni->first_name}} {{$mgeni->middle_name}} {{$mgeni->Last_name}}</td>
            <td>{{$mgeni->room->room->name }}</td>
            <td>
                @foreach($mgeni->service as $service)
                 <i class="fa fa-caret-right"></i> {{ $service->services->name }}<br />
                @endforeach
            </td>
            <td>{{$mgeni->room->price}}</td>
            <td>{{$mgeni->room->check_in}}</td>
            <td>{{$mgeni->room->check_out}}</td>
             <td id="{{ $mgeni->id }}" class="links">

              <a href="#a" class="confirnguest btn btn-xs btn-info"><i class="fa fa-pencil text-info"></i> Confirm</a>&nbsp;&nbsp;&nbsp;
<!---->
<!--                <a href="#d" title="delete Guest" class="deleteguest btn btn-xs btn-danger"><i class="fa fa-trash-o text-info"></i> delete</a>-->
<!--            </td>-->
        </tr>
        @endforeach

        </tbody>
    </table>

    <script>
        $(document).ready(function (){

            $("#guesttable").dataTable({
            "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "fnDrawCallback": function( oSettings ) {
                    //confirming a guest
                    $(".confirnguest").click(function(){
                        var id1 = $(this).parent().attr('id');
                        $(".confirnguest").show("slow").parent().parent().find("span").remove();
                        var btn = $(this).parent().parent();
                        var msg  ="<span><br/>"
                        msg += "Confirm That The Guest Has Occupy The Room";
                        msg += "<br /><a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Confirm</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> Cancel</a>"
                        msg +="</span>"
                        $(this).hide("slow").parent().append(msg);
                        $("#no").click(function(){
                            $(this).parent().parent().find(".confirnguest").show("slow");
                            $(this).parent().parent().find("span").remove();
                        });
                        $("#yes").click(function(){
                            var msgarea = $(this).parent();
                            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>confirming...");
                            $.post("<?php echo url("guest/confirm")?>/"+id1,function(data){
                                msgarea.html(data);
                                setTimeout(function() {
                                    btn.hide("slow").next("hr").hide("slow");
                                }, 2000);
                            });
                        });
                    });//endof confirming guest
                }
            });
            $('input[type="text"]').addClass("form-control");
            $('select').addClass("form-control");


        });
    </script>
</div>

@stop

