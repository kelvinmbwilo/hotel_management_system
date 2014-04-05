@extends('layout.master')
@section('breadcumbs')
<li><a href="{{ url("home")}}">Home</a></li>
<li><a href="{{ url("booking/list") }}">Services</a></li>
<li class="active">add</li>
@stop


@section('content')

<div class="panel panel-default">
    <div class="panel-body" >

        {{ Form::open(array("url"=>route('booking'),"class"=>"form-horizontal")) }}
        <h2 class="text-center text-muted">Add new Service</h2>

        <!--response messages-->
        @if(isset($emsg))
        <div class="alert alert-danger alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ $emsg }}!</strong>
        </div>
        @endif

        @if(isset($msg))
        <div class="alert alert-success alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ $msg }}!</strong>
        </div>
        @endif
        <div class='col-sm-6'>

            <div class='form-group'>
                {{ Form::label('guest_id', 'Sevice Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::text('guest_id','',array('class'=>'form-control','placeholder'=>'Room id','required'=>'required')) }} </div>
            </div>

            <div class='form-group'>
                {{ Form::label('room_id', 'Last Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::text('room_id','',array('class'=>'form-control','placeholder'=>' room id','required'=>'required')) }} </div>
            </div>

            <div class='form-group'>
                {{ Form::label('cost', 'Last Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::text('cost','',array('class'=>'form-control','placeholder'=>' cost','required'=>'required')) }} </div>
            </div>

            <div class='form-group'>
                {{ Form::label('checkin', 'Middle Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::text('checkin','',array('class'=>'form-control')) }} </div>
            </div>

            <div class='form-group'>
                {{ Form::label('checkout', 'Middle Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::text('checkout','',array('class'=>'form-control')) }} </div>
            </div>
            <div class='col-sm-12 form-group text-center'>
                {{ Form::submit('Add Service',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
                {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
            </div>
            {{Form::close()}}
        </div>
    </div>



    @stop
