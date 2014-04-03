

        {{ Form::open(array("url"=>url('service/add'),"class"=>"form-horizontal", 'id'=>'FileUploader')) }}
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
            <div class="form-group">

            <div class='col-sm-6'>
               Sevice Name<br>
                {{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Service Name','required'=>'required')) }}
            </div>

        <div class='col-sm-6'>
            price<br>
            {{ Form::text('price','',array('class'=>'form-control','placeholder'=>'Price')) }}
        </div>
            </div>

            <div class='form-group'>
                <div class="col-sm-12">
                description<br>
               {{ Form::textarea('description','',array('class'=>'form-control','placeholder'=>' Description','required'=>'required', 'rows'=>'4')) }}
            </div>
            </div>
        <div id="output"></div>
        <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Add Service',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
            {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
        </div>
        {{Form::close()}}
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
                    }, 3000);
                    $("#listservice").load("<?php echo url("service/list") ?>")
                }
            });
        </script>
