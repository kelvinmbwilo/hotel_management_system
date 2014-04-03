
        {{ Form::open(array("url"=>url("guest/edit/{$guest->id}"),"class"=>"form-horizontal","id"=>"FileUploader")) }}
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
                    {{ Form::text('middle_name',$guest->middle_name,array('class'=>'form-control','placeholder'=>'Middle Name')) }}
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
                    {{ Form::email('email',$guest->email,array('class'=>'form-control','placeholder'=>'Email')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('phone_number', 'Phone Number',array('class'=>'control-label col-sm-4')) }}
                <div class="col-sm-8">
                    {{Form::text('phone_number',$guest->phone_number,array('class'=>'form-control','placeholder'=>'Phone Number'))}}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('country', 'Country',array('class'=>'control-label col-sm-4')) }}
                <div class="col-sm-8">
                    {{Form::select('country',array("tz"=>"tz","ug"=>"ug"),$guest->country,array('class'=>'form-control','required'=>'requiered'))}}
                </div>
            </div>
        </div>
           <div id="output"></div>
        <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Update Guest',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
        </div>
        {{ Form::close() }}

        <script>
            $(document).ready(function (){

                $('#FileUploader').on('submit', function(e) {
                    e.preventDefault();
                    $("#output").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
                    $(this).ajaxSubmit({
                        target: '#output',
                        success:  afterSuccess
                    });

                });

                function afterSuccess(){
                    $('#FileUploader').resetForm();
                    setTimeout(function() {
                        $("#output").html("");
                        $("#addguest").load("<?php echo url("guest/add") ?>")
                    }, 3000);
                    $("#listguest").load("<?php echo url("guest/list") ?>")

                }
            });
        </script>