@extends('layout.master')

@section('breadcumbs')
<li><a href="{{ url("home")}}">Home</a></li>
<li><a href="{{ url("user/list") }}">users</a></li>
<li class="active">edit</li>
@stop

@section('content')
    <div class="panel panel-default">
      <div class="panel-body">
       
         {{ Form::open(array("url"=>url("user/edit/{$user->id}"),"class"=>"form-horizontal")) }}
         
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
         
         <h2 class="text-center text-muted">Upadate {{$user->first_name }} {{$user->middle_name }} {{$user->las_tname }} Information</h2>
         
         <div class='col-sm-6'>
             
             <div class='form-group'>
            {{ Form::label('firstname', 'First Name',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('first_name', $user->first_name ,array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }} </div>
            </div>
             
              <div class='form-group'>
            {{ Form::label('lastname', 'Last Name',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('last_name',$user->last_name,array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }} </div>
            </div>

             <div class='form-group'>
                 {{ Form::label('middlename', 'Middle Name',array('class'=>'control-label col-sm-4')) }}
                 <div class='col-sm-8'>{{ Form::text('middle_name',$user->middle_name,array('class'=>'form-control','placeholder'=>'Middle Name')) }} </div>
             </div>
             
<!--            <div class='form-group'>-->
<!--                    {{ Form::label('gender', 'Gender',array('class'=>'control-label col-sm-4')) }}-->
<!--                    <div class='col-sm-8'>{{ Form::select('gender',array("Male"=>"Male","Female"=>"Female"),$user->gender,array('class'=>'form-control','required'=>'requiered')) }}  </div>-->
<!--                </div>-->

         </div>
         
         <div class='col-sm-6'>
              <div class='form-group'>
            {{ Form::label('email', 'Email',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::email('email',$user->email,array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }} </div>
            </div>
             
            <div class='form-group'>
            {{ Form::label('phone', 'Phone Number',array('class'=>'control-label col-sm-4')) }}
            <div class='col-sm-8'>{{ Form::text('phone',$user->phone,array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')) }} </div>
            </div>

             <div class='form-group'>
                 {{ Form::label('role', 'Role',array('class'=>'control-label col-sm-4')) }}
                 <div class='col-sm-8'>{{ Form::select('role',array("admin"=>"Administrator","officer"=>"Loan Officer"),$user->role,array('class'=>'form-control','required'=>'requiered')) }}  </div>
             </div>
         </div>

          <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Update',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
        </div>
      {{ Form::close() }}
    </div>
      </div>
@stop
