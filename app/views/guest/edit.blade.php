@extends('layout.master')

@section('breadcumbs')
<li><a href="#">Home</a></li>
<li><a href="{{ url("guest/list") }}">Guest</a></li>
<li class="active">edit</li>
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-body">

        {{ Form::open(array("url"=>url('guest/edit/{$guest->id}'),"class"=>"form-horizontal")) }}
        <h2 class="text-center text-muted">Edit Guest's Information</h2>

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
                {{ Form::label('first_name', 'First Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>
                    {{ Form::text('first_name',$guest->first_name, array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }}
                </div>
            </div>

            <div class='form-group'>
                {{ Form::label('middle_name', 'Middle Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>
                    {{ Form::text('middle_name',$guest->middle_name,array('class'=>'form-control','placeholder'=>'Middle Name','required'=>'required')) }}
                </div>
            </div>

            <div class='form-group'>
                {{ Form::label('last_name', 'Last Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>
                    {{ Form::text('last_name',$guest->last_name,array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }}
                </div>
            </div>

        </div>

        <div class='col-sm-6'>
            <div class='form-group'>
                {{ Form::label('email', ' Email',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>
                    {{ Form::email('email',$guest->email,array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('phone_number', 'Phone Number',array('class'=>'control-label col-sm-4')) }}
                <div class="col-sm-8">
                    {{Form::text('phone_number',$guest->phone_number,array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'requiered'))}}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('country', 'Country',array('class'=>'control-label col-sm-4')) }}
                <div class="col-sm-8">
                    {{Form::select('country',array("tz"=>"tz","ug"=>"ug"),$guest->country,array('class'=>'form-control','required'=>'requiered'))}}
                </div>
            </div>
        </div>

        <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Update Guest',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop