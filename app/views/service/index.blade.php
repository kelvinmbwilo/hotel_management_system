@extends('layout.master')

@section('breadcumbs')
<li><a href="{{url("service")}}">Home</a></li>
<li class="active">Services</li>
@stop

@section('content')
<div class="panel panel-default col-md-7">
    <div class="panel-body" id="listservice">
        @include('service.list')
    </div>
</div>
@if(Session::get('role')!= 'receptionist')
<div class="panel panel-default col-md-5">
    <div class="panel-body" id="addservice">
        @include('service.add')
    </div>
</div>
@endif
@stop