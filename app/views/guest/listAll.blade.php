@extends('layout.master')

@section('breadcumbs')
<li><a href="{{url("guest")}}">Home</a></li>
<li class="active">Guests</li>
@stop

@section('content')
<?php
$guest = Guest::all();
?>
<ul class="nav nav-tabs" id="myTab">

    <li><a href="#all" data-toggle="tab">All Guests</a></li>
    <li><a href="#staying" data-toggle="tab">Staying</a></li>
    <li><a href="#booked" data-toggle="tab">Booked</a></li>
</ul>

<div class="tab-content">

    <div class="tab-pane" id="all">
        <table class='table table-striped table-responsive' id='guesttable'>

            <thead>
            <tr>
                <th> #</th>
                <th> First NAme </th>
                <th> Middle NAme </th>
                <th> Last Name </th>
                <th> Country </th>
                <th>Status</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <?php $i = 1; ?>
                @foreach($guest as $mgeni)
                <td>{{ $i++ }}</td>
                <td>{{ $mgeni->first_name }}</td>
                <td>{{ $mgeni->middle_name }}</td>
                <td>{{ $mgeni->last_name }}</td>
                <td>{{ $mgeni->country }}</td>
                <td>{{ $mgeni->status }}</td>
<!--                <td id="{{ $mgeni->id }}" class="links">-->
<!--                    <a href="#a" title="edit Guest" class="editguest btn btn-xs btn-info"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;-->
<!--                    <a href="#d" title="delete Guest" class="deleteguest btn btn-xs btn-danger"><i class="fa fa-trash-o text-info"></i> delete</a>-->
<!--                </td>-->
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="tab-pane" id="staying">
        <table class='table table-striped table-responsive' id='guesttable'>

            <thead>
            <tr>
                <th> #</th>
                <th> First NAme </th>
                <th> Middle NAme </th>
                <th> Last Name </th>
                <th> Country </th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php $i = 1; ?>
                @foreach($guest as $mgeni)
                @if($mgeni->status == "Stay")
                <td>{{ $i++ }}</td>
                <td>{{ $mgeni->first_name }}</td>
                <td>{{ $mgeni->middle_name }}</td>
                <td>{{ $mgeni->last_name }}</td>
                <td>{{ $mgeni->country }}</td>
                <td>{{ $mgeni->status }}</td>
                <td id="{{ $mgeni->id }}" class="links">
                   <a href="#d" title="Extend Time" class="extend btn btn-xs btn-info"><i class="fa fa-arrow-right text-info"></i> Extend Time</a>
                </td>
            </tr>
            @endif
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="tab-pane" id="booked">
        <table class='table table-striped table-responsive' id='guesttable'>

            <thead>
            <tr>
                <th> #</th>
                <th> First NAme </th>
                <th> Middle NAme </th>
                <th> Last Name </th>
                <th> Country </th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>

                <?php $i = 1; ?>
                @foreach($guest as $mgeni)
                @if($mgeni->status == "Booked")
                <td>{{ $i++ }}</td>
                <td>{{ $mgeni->first_name }}</td>
                <td>{{ $mgeni->middle_name }}</td>
                <td>{{ $mgeni->last_name }}</td>
                <td>{{ $mgeni->country }}</td>
                <td>{{ $mgeni->status }}</td>
                <td id="{{ $mgeni->id }}" class="links">
                    <a href="#a" title="Confirm Guest" class="cofirm btn btn-xs btn-info"><i class="fa fa-pencil text-info"></i> Confirm</a>&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            @endif
            @endforeach

            </tbody>
        </table>
    </div>
</div>

<script>

        $(document).ready(function(){
            $("table[id=guesttable]").dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "fnDrawCallback": function( oSettings ) {
                }
            })
            $('#myTab a:first').tab('show')

        })



</script>

@stop