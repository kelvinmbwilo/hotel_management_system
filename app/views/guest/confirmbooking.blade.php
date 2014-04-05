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
        <tr>
            <?php $i = 1; ?>

            @foreach($roomguest as $mgeni)
            @if($mgeni->guest->status == "Booked")
            <td>{{ $i++ }}</td>
            <td>{{$mgeni->guest->first_name}} {{$mgeni->guest->middle_name}} {{$mgeni->guest->Last_name}}</td>
            <td>{{$mgeni->room->name}}</td>
            <td></td>
            <td>{{$mgeni->price}}</td>
            <td>{{$mgeni->check_in}}</td>
            <td>{{$mgeni->check_out}}</td>
             <td id="{{ $mgeni->id }}" class="links">

              <a href="#a" class="confirnguest btn btn-xs btn-info"><i class="fa fa-pencil text-info"></i> Confirm</a>&nbsp;&nbsp;&nbsp;
<!---->
<!--                <a href="#d" title="delete Guest" class="deleteguest btn btn-xs btn-danger"><i class="fa fa-trash-o text-info"></i> delete</a>-->
<!--            </td>-->
        </tr>
        @endif
        @endforeach

        </tbody>
    </table>

    <script>
        $(document).ready(function (){

            $("#guesttable").dataTable({
            "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "fnDrawCallback": function( oSettings ) {

                }

            });
            $('input[type="text"]').addClass("form-control");
            $('select').addClass("form-control");


        });
    </script>
</div>

@stop

