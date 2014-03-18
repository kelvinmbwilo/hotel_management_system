@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url("home")}}">Home</a></li>
<li><a href="{{ url("guest/list") }}">Guest</a></li>
<li class="active">add</li>
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-body">

        {{ Form::open(array("url"=>route('addguest'),"class"=>"form-horizontal")) }}
        <h2 class="text-center text-muted">Register New Guest</h2>

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
                {{ Form::label('middle_name', 'Middle Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>
                    {{ Form::text('middle_name','',array('class'=>'form-control','placeholder'=>'Middle Name','required'=>'required')) }}
                </div>
            </div>

            <div class='form-group'>
                {{ Form::label('first_name', 'First Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>
                    {{ Form::text('first_name','',array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }}
                </div>
            </div>

            <div class='form-group'>
                {{ Form::label('last_name', 'Last Name',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>
                    {{ Form::text('last_name','',array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }}
                </div>
            </div>

        </div>

        <div class='col-sm-6'>
            <div class='form-group'>
                {{ Form::label('email', ' Email',array('class'=>'control-label col-sm-4')) }}
                <div class='col-sm-8'>
                    {{ Form::email('email','',array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('phone_number', 'Phone Number',array('class'=>'control-label col-sm-4')) }}
                <div class="col-sm-8">
                    {{Form::text('phone_number','',array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'requiered'))}}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('country', 'Country',array('class'=>'control-label col-sm-4')) }}
                <div class="col-sm-8">
                    {{Form::select('country',array("tz"=>"tz","ug"=>"ug"),'',array('class'=>'form-control','required'=>'requiered'))}}
                </div>
            </div>
        </div>

        <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Register Guest',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop