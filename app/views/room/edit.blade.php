
{{ Form::open(array("url"=>url("room/edit/{$room->id}"),"class"=>"form-horizontal",'id' => "FileUploader",'files' => true)) }}
<h2 class="text-center text-muted">Update Room Information</h2>

<div class='form-group'>

    <div class='col-sm-12'>
        Room Name <br> {{ Form::text('name',$room->name,array('class'=>'form-control','placeholder'=>'Room Name','required'=>'required')) }}
    </div>

</div>

<div class="form-group">

    <div class="col-sm-6">
        Bed size <br>{{Form::select('bed_size',array("5x6"=>"5x6","4x6"=>"4x6","3x6"=>"3x6"),$room->bed_size,array('class'=>'form-control','required'=>'requiered'))}}
    </div>
    <div class="col-sm-6">
        Price <br>{{Form::select('price',array("500"=>"500","1000"=>"1000","3000"=>"3000"),$room->price,array('class'=>'form-control','required'=>'requiered'))}}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6">
        Bed Types<br> {{Form::select('bed_type',array("doubleDeca"=>"Double Deca","singleDeca"=>"Single Deca"),$room->bed_type,array('class'=>'form-control','required'=>'requiered'))}}
    </div>
    <div class="col-sm-6">
        Status <br>{{Form::select('status',array("occupied"=>"occupied","open"=>"open"),$room->status,array('class'=>'form-control','required'=>'requiered'))}}
    </div>
</div>
<div class='form-group'>
    <div class='col-sm-6'>
        Number Of Beds <br>{{ Form::select('number_of_beds',range('0','15'),$room->number_of_bed,array('class'=>'form-control','placeholder'=>'# of beds','required'=>'required')) }}
    </div>
    <div class='col-sm-6'>
        Category <br>{{Form::select('category',array("Familly"=>"Familly","Bachelor"=>"Bachelor"),$room->category,array('class'=>'form-control','required'=>'requiered'))}}
    </div>


</div>

<div class="form-group">

    <div class="col-sm-12">
        Discription<br> {{ Form::textarea('description',$room->description,array('class'=>'form-control','required'=>'requiered','rows'=>'5')) }}
    </div>
</div>
<div class="col-sm-12">
    @if($room->image == "")
    Image1** {{ Form::file('img1',array('required'=>'required','class'=>'')) }}
    @else
    {{HTML::image("uploads/rooms/{$room->image}","",array('style'=>'height:50px;width:50px')) }} Change
    Image1 {{ Form::file('img1',array('class'=>'')) }}
    @endif

    @if($room->image1 == "")
    Image2 {{ Form::file('img2',array('class'=>'')) }}
    @else
    {{HTML::image("uploads/rooms/{$room->image1}","",array('style'=>'height:50px;width:50px')) }} Change
    Image2 {{ Form::file('img2',array('class'=>'')) }}
    @endif

    @if($room->image2 == "")
    Image3 {{ Form::file('img3',array('class'=>'')) }}
    @else
    {{HTML::image("uploads/rooms/{$room->image2}","",array('style'=>'height:50px;width:50px')) }} Change
    Image3 {{ Form::file('img3',array('class'=>'')) }}
    @endif

</div>



<div id="output"></div>

<div class='col-sm-12 form-group text-center'>
    {{ Form::submit('Update Room',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
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
                $("#addroom").load("<?php echo url("room/add") ?>")
            }, 3000);
            $("#listroom").load("<?php echo url("room/list") ?>")

        }
    });
</script>
