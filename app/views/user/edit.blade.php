
         {{ Form::open(array("url"=>url("user/edit/{$user->id}"),"class"=>"form-horizontal", "id"=>'FileUploader')) }}

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
         
         <h2 class="text-center text-muted">Update</h2><h2 class="text-center text-primary"> {{$user->first_name }} {{$user->middle_name }} {{$user->last_name }} </h2> <h2 class="text-center text-muted">Information</h2>

         <div class='12' style="font-size: 12px">

             <div class='form-group'>
                 <div class="col-md-6">
                     First Name<br>
                     {{ Form::text('first_name',$user->first_name,array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')) }}
                 </div>

                 <div class="col-md-6">
                     Last Name<br>
                     {{ Form::text('last_name',$user->last_name,array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')) }}
                 </div>
             </div>

             <div class='form-group'>
                 <div class="col-md-6">
                     Middle Name<br>
                     {{ Form::text('middle_name',$user->middle_name,array('class'=>'form-control','placeholder'=>'Middle Name')) }}
                 </div>

                 <div class="col-md-6">
                     Phone Number<br>
                     {{ Form::text('phone',$user->phone,array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')) }}
                 </div>
             </div>

             <div class='form-group'>
                 <div class="col-md-6">
                     Email<br>
                     {{ Form::email('email',$user->email,array('class'=>'form-control','placeholder'=>'Email','required'=>'required')) }}
                 </div>
                 <div class="col-md-6">
                     Role<br>
                     {{ Form::select('role',array("admin"=>"Administrator","receptionist"=>"Receptionist"),$user->role,array('class'=>'form-control','required'=>'requiered')) }}

                 </div>

             </div>


         </div>
             <div id="output"></div>
          <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Update',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
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
                         $("#adduser").load("<?php echo url("user/add") ?>")
                     }, 3000);
                     $("#listuser").load("<?php echo url("user/list") ?>")

                 }
             });
         </script>