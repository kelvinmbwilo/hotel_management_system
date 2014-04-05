@extends('layout.master')

@section('breadcumbs')
<li class="active">Dashboard</li>
@stop

@section('content')
<div class="col-sm-12" style="margin-bottom: 15px">
    <div class="col-sm-2">
       <a href="{{url("/")}}"><i class="fa fa-globe fa-3x"></i> Visit Site </a>
    </div>
    <div class="col-sm-2">
        <a href="{{url("user")}}"><i class="fa fa-user fa-3x"></i> User </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ url("rooms") }}"><i class="fa fa-home fa-3x"></i> Room </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ url("guests") }}"><i class="fa fa-briefcase fa-3x"></i> Guest </a>
    </div>
    <div class="col-sm-2">
        <a href="{{url("services")}}"><i class="fa fa-cog fa-3x"></i> Service </a>
    </div>
    <div class="col-sm-2">
        <a href="{{url("report")}}"><i class="fa fa-bar-chart-o fa-3x"></i> Report </a>
    </div>

</div>
<div class="col-sm-6">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
        </div>
        <div class="panel-body">
            Panel content
        </div>
    </div>
</div>
<div class="col-sm-6">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
        </div>
        <div class="panel-body">
            Panel content
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
        </div>
        <div class="panel-body">
            Panel content
        </div>
    </div>
</div>
<div class="col-sm-6">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
        </div>
        <div class="panel-body">
            Panel content
        </div>
    </div>
</div>
@stop