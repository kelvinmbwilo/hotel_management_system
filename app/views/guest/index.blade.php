@extends('layout.master')

@section('breadcumbs')
<li><a href="{{url("guest")}}">Home</a></li>
<li class="active">Guests</li>
@stop

@section('content')
<div class="panel panel-default col-md-7">
    <div class="panel-body" id="listguest">
        @include("guest.list")
    </div>
</div>

<div class="panel panel-default col-md-5">
    <div class="panel-body" id="addguest">
        @include('guest.add')
    </div>
</div>

@stop