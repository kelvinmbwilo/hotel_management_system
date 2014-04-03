@extends('layout.master')

@section('breadcumbs')
<li><a href="{{url("user")}}">Home</a></li>
<li class="active">User</li>
@stop

@section('content')
<div class="panel panel-default col-md-8">
    <div class="panel-body" id="listuser">
        @include('user.list')
    </div>
</div>

<div class="panel panel-default col-md-4">
    <div class="panel-body" id="adduser">
        @include('user.add')
    </div>
</div>

@stop