@extends('layout.master')

@section('breadcumbs')
<li><a href="{{url("home")}}">Home</a></li>
<li class="active">Rooms</li>
@stop

@section('content')
<div class="panel panel-default col-md-7">
    <div class="panel-body" id="listroom">
@include("room.list")
     </div>
    </div>

<div class="panel panel-default col-md-5">
    <div class="panel-body" id="addroom">
        @if(Session::get('role')!= 'receptionist')
@include('room.add')
        @endif
    </div>
</div>

@stop