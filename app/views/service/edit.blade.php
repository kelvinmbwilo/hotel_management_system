@extends('layout.master')
@section('breadcumbs')
<li><a href="#">Home</a></li>
<li><a href="{{ url("service") }}">Services</a></li>
<li class="active">add</li>
@stop


@section('content')
<div class="panel panel-default">
    <div class="panel-body" >

        {{ Form::open(array("url"=>route("service/edit/{$service->id}"),"class"=>"form-horizontal")) }}
        <h2 class="text-center text-muted">Edit Services</h2>

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
                {{ Form::label('name', 'Sevice Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::text('name',$service->name,array('class'=>'form-control','placeholder'=>'Service Name','required'=>'required')) }} </div>
            </div>

            <div class='form-group'>
                {{ Form::label('description', 'Last Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::text('description',$service->description,array('class'=>'form-control','placeholder'=>' Description','required'=>'required')) }} </div>
            </div>

            <div class='form-group'>
                {{ Form::label('price', 'Middle Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>{{ Form::text('price',$service->price,array('class'=>'form-control','placeholder'=>'Price')) }} </div>
            </div>
            <div class='col-sm-12 form-group text-center'>
                {{ Form::submit('Update Service',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
                {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
            </div>
            {{Form::close()}}
        </div>
    </div>


    @stop