@extends('layout.master')

@section('breadcumbs')
<li><a href="#">Home</a> </li>
<li><a href="{{url("room.list")}}">rooms</a> </li>
<li class="active">logs</li>
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <h3>System Access Log Information for  {{$room->name}}</h3>
        <table class="table table-striped table-responsive" id="roomtable">

            <thead>
              <tr>
                  <th>#</th>
                  <th>Action</th>
                  <th>Date</th>
                  <th>Time</th>
              </tr>
            </thead>

            <tbody>
            <?php $i = 1?>

            @foreach($room->log as $rooms)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$rooms->action}}</td>
                <td>{{date("M, j Y",strtotime($rooms->created_at))}}</td>
                <td>{{ date("H:i:s",strtotime($rooms->created_at))}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- scipt to process the list of rooms -->
<script>
    $(document).ready( function{
       $("#roomtable").dataTable();
        $('input[type="text"]').addClass("form-control");
        $('select').addClass("form-control");
    });
</script>
@stop