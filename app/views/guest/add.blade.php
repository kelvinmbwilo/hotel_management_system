
        {{ Form::open(array("url"=>url("guest/add/{$grooms->id}"),"class"=>"form-horizontal", 'id'=>"FileUploader")) }}
        <h2 class="text-center text-muted">Register New Guest</h2>

        <div class="row">
            <div class="col-sm-4">
                @if($grooms->image == "")
                {{ HTML::image("http://placehold.it/100x100","",array('class'=>'img-rounded')) }}
                @else
                {{ HTML::image("uploads/rooms/{$grooms->image}","",array('class'=>'img-rounded thumbnail','style'=>'height:100px;width:100px')) }}
                @endif
            </div>
            <div class="col-sm-8">
                <div class="col-xs-6">
                    <strong>{{$grooms->name}}<br>
                     {{ $grooms->bed_type }}<br>
                     {{ $grooms->category }}<br>

                </div>
                <div class="col-xs-6">
                    {{ $grooms->price }}USD<br>
                     {{ $grooms->bed_size }}<br>
                   <span class="text-warning">{{ $grooms->status }}</span> </strong>
                </div>
            </div>
        </div>
<div id="dateselection">
        <div class='form-group'>
            <div class='col-sm-6'>
                Check In<br>{{ Form::text('from','',array('class'=>'form-control','placeholder'=>'Check In','required'=>'required','id'=>'from')) }}
            </div>

            <div class='col-sm-6'>
                Check Out<br>{{ Form::text('to','',array('class'=>'form-control','placeholder'=>'Check Out','required'=>'required','id'=>'to')) }}
            </div>
        </div>
    <div class="error"></div>

</div>
        <div id="guestinfo">
            <div class='form-group'>
                <div class='col-sm-6'>
                    First Name<br>{{ Form::text('first_name','',array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }}
                </div>

                <div class='col-sm-6'>
                    Middle Name<br>{{ Form::text('middle_name','',array('class'=>'form-control','placeholder'=>'Middle Name')) }}
                </div>
            </div>

            <div class='form-group'>
                <div class='col-sm-6'>
                    Last Name<br> {{ Form::text('last_name','',array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }}
                </div>
                <div class='col-sm-6'>
                    Email<br> {{ Form::email('email','',array('class'=>'form-control','placeholder'=>'Email')) }}
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-6">
                    Phone Number<br>{{Form::text('phone_number','',array('class'=>'form-control','placeholder'=>'Phone Number'))}}
                </div>

                <div class="col-sm-6">
                    Country<br>{{Form::select('country',array("tz"=>"tz","ug"=>"ug"),'',array('class'=>'form-control','required'=>'requiered'))}}
                </div>
            </div>
            <div class="form-group">
                <span class="help-block">Pick Services </span>
                @foreach(Services::all() as $huduma)
                <div class="col-sm-4">
                    {{Form::checkbox('service[A]',$huduma->id)}} {{$huduma->name}}
                </div>
                 @endforeach
            </div>


           <div id="output"></div>
        <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Register Guest',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
        </div>
            </div>
            {{ Form::open(array("url"=>route('addguest'),"class"=>"form-horizontal", 'id'=>"FileUploader")) }}
        {{ Form::close() }}
        <script>
            $(document).ready(function (){

                $("#guestinfo").hide();

                //checking room availabilty
                $( "#from" ).datepicker({
                    minDate: "0",
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd",
                    onClose: function( selectedDate ) {
                        $( "#to" ).datepicker( "option", "minDate", selectedDate );
                    }
                });
                $( "#to" ).datepicker({
                    minDate: "0",
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "yy-mm-dd",
                    onClose: function( selectedDate ) {
                        if($( "#from").val() != ""){

                            $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                            $(".error").fadeIn().html("<i class='fa fa-spin fa-spinner '></i><span>Checking Availability please wait...</span>");
                            $.post("room/<?php echo $grooms->id ?>/check",{from:$( "#from").val(),to:$( "#to").val()},function(data){

                                if(data == "not"){
                                   $("#guestinfo").hide("slow");
                                   $(".error").html("<h4 class='text-danger'>Room is not available on these dates</h4>").delay(3000).fadeOut();
                                    $("#FileUploader").resetForm();
                                    $("#from").val("");
                                    $("#to").val("");
                               }else{

                                   $(".error").html("<h4 class='text-success'>Room is available, fill guest details</h4>")
                                   $("#guestinfo").show("slow");
                               }
                            });
                        }else{
                            $(this).val("");
                            $(".error").html("<h4 class='text-danger'>Select the check in date first</h4>").delay(2000).fadeOut()
                        }

                    }
                });

                //submiting guest information
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
                        $("#addroom").load("<?php echo url("room/add") ?>")
                    }, 3000);
                }
            });
        </script>