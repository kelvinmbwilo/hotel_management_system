
        {{ Form::open(array("url"=>url('room/add'),"class"=>"form-horizontal",'id' => "FileUploader",'files' => true)) }}
        <h2 class="text-center text-muted">Add new Room</h2>

            <div class='form-group'>

                <div class='col-sm-12'>
                    Room Name <br> {{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Room Name','required'=>'required')) }}
                </div>

            </div>

           <div class="form-group">

               <div class="col-sm-6">
                   Bed size <br>{{Form::select('bed_size',array("5x6"=>"5x6","4x6"=>"4x6","3x6"=>"3x6"),'',array('class'=>'form-control','required'=>'requiered'))}}
               </div>
               <div class="col-sm-6">
                   Price <br>{{Form::select('price',array("500"=>"500","1000"=>"1000","3000"=>"3000"),'',array('class'=>'form-control','required'=>'requiered'))}}
               </div>
           </div>

            <div class="form-group">
                <div class="col-sm-6">
                   Bed Types<br> {{Form::select('bed_type',array("doubleDeca"=>"Double Deca","singleDeca"=>"Single Deca"),'',array('class'=>'form-control','required'=>'requiered'))}}
                </div>
                <div class="col-sm-6">
                    Status <br>{{Form::select('status',array("occupied"=>"occupied","open"=>"open"),'',array('class'=>'form-control','required'=>'requiered'))}}
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-6'>
                    Number Of Beds <br>{{ Form::select('number_of_beds',range('0','15'),'',array('class'=>'form-control','placeholder'=>'# of beds','required'=>'required')) }}
                </div>
                <div class='col-sm-6'>
                    Category <br>{{Form::select('category',array("Familly"=>"Familly","Bachelor"=>"Bachelor"),'',array('class'=>'form-control','required'=>'requiered'))}}
                </div>


            </div>

        <div class="form-group">

            <div class="col-sm-12">
                Discription<br> {{ Form::textarea('description','',array('class'=>'form-control','required'=>'requiered','rows'=>'5')) }}
            </div>
        </div>

            <div class="form-group">

                <div class="col-sm-12">
                    Image1** {{ Form::file('img1',array('required'=>'required','class'=>'')) }}
                    Image2 {{ Form::file('img2',array('class'=>'')) }}
                    Image3 {{ Form::file('img3',array('class'=>'')) }}
                </div>

            </div>

<div id="output"></div>

                <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Add Room',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
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
                    }, 3000);
                    $("#listroom").load("<?php echo url("room/list") ?>")
                }
            });
        </script>
