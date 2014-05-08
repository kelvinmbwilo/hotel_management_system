@extends('layout.master')

@section('breadcumbs')
<li><a href="{{url("home")}}">Home</a></li>
<li class="active">Reports</li>
@stop

@section('content')
<div class="panel panel-default col-md-12">
    <div class="panel-body" id="listguest">
        {{ Form::open(array("url"=>url("reports/process/"),"class"=>"form-horizontal","id"=>'formms')) }}
        <div class='form-group' style="margin-bottom: 10px">

            <div class='col-sm-3'>
                Country<br>{{ Form::select('country',array('all'=>'all')+Country::all()->lists('name','id'),'466',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <div class='col-sm-3'>
                Room<br>{{ Form::select('rooms',array('all'=>'All Rooms')+Room::all()->lists('name','id'),'466',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <div class='col-sm-2'>
                Services<br>{{ Form::select('services',array('all'=>'All Services')+Services::all()->lists('name','id'),'466',array('class'=>'form-control','required'=>'requiered')) }}
            </div>

            <div class='col-sm-2'>
                Booking Status<br>{{ Form::select('booking',array("all"=>"All","Booking"=>"Bookings","Stay"=>"Confirmed"),'',array('class'=>'form-control','required'=>'requiered')) }}

            </div>
            <div class='col-sm-2'>
                Vertical<br>{{ Form::select('vertical',array("Guests"=>"Guest","Income"=>"Income"),'',array('class'=>'form-control','required'=>'requiered')) }}

            </div>
        </div>



    <div class='form-group'>

        <div class='col-sm-3'>
            From:{{ Form::text('from','',array('class'=>'form-control','placeholder'=>'Start Date','required'=>'required','id'=>'from')) }}
        </div>
        <div class='col-sm-3'>
            To:{{ Form::text('to','',array('class'=>'form-control','placeholder'=>'End Date','required'=>'required','id'=>'to')) }}
        </div>
        <div id="roomdiv">
            <div class='col-sm-2'>
                Horizontal<br>{{ Form::select('yaxis',array('Years'=>'Years',"Services"=>"Services",'year'=>'Select Year'),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <div class='col-sm-2 start'>
                Start <br>{{ Form::select('start',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y')-7,array('class'=>'form-control')) }}
            </div>
            <div class='col-sm-2 end'>
                End<br>{{ Form::select('end',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y'),array('class'=>'form-control')) }}
            </div>
        </div>

        <div id="servicediv">
            <div class='col-sm-2'>
                Horizontal<br>{{ Form::select('yaxis',array('Years'=>'Years',"room"=>"Rooms",'year'=>'Select Year'),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <div class='col-sm-2 start'>
                Start <br>{{ Form::select('start',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y')-7,array('class'=>'form-control')) }}
            </div>
            <div class='col-sm-2 end'>
                End<br>{{ Form::select('end',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y'),array('class'=>'form-control')) }}
            </div>
        </div>

        <div id="yeardiv">
            <div class='col-sm-2'>
                Horizontal<br>{{ Form::select('yaxis',array('Years'=>'Years',"room"=>"Rooms","Services"=>"Services",'year'=>'Select Year'),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <div class='col-sm-2 start'>
                Start <br>{{ Form::select('start',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y')-7,array('class'=>'form-control')) }}
            </div>
            <div class='col-sm-2 end'>
                End<br>{{ Form::select('end',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y'),array('class'=>'form-control')) }}
            </div>
        </div>
        <div id="datediv">
            <div class='col-sm-2'>
                Horizontal<br>{{ Form::select('yaxis',array("room"=>"Rooms","Services"=>"Services"),'',array('class'=>'form-control','required'=>'requiered')) }}
            </div>
            <div class='col-sm-2 start'>
                Start <br>{{ Form::select('start',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y')-7,array('class'=>'form-control')) }}
            </div>
            <div class='col-sm-2 end'>
                End<br>{{ Form::select('end',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y'),array('class'=>'form-control')) }}
            </div>
        </div>
            <div id="datediv1">
                <div class='col-sm-2'>
                    Horizontal<br>{{ Form::select('yaxis',array("Years"=>"Years",'year'=>'Select Year'),'',array('class'=>'form-control','required'=>'requiered')) }}
                </div>
                <div class='col-sm-2 start'>
                    Start <br>{{ Form::select('start',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y')-7,array('class'=>'form-control')) }}
                </div>
                <div class='col-sm-2 end'>
                    End<br>{{ Form::select('end',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y'),array('class'=>'form-control')) }}
                </div>
        </div>

    </div>

<div class="col-xs-12" style="margin-top: 25px">
    <div class="col-md-2 btn btn-primary" id="table">Table</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-primary" id="bar">Bar</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-primary" id="line">Line</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-primary" id="pie">Pie</div>
</div>
<div id="chartarea" class="col-xs-12" style="margin-top: 25px;padding-right: 20px">

</div>
    </div>
{{ Form::close() }}
<script>
    $(document).ready(function(){
        $( "#from" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"yy-mm-dd",
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"yy-mm-dd",
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });

        //maintaining a dropddown select to maintaing y axis
        changedate()
        var roomdiv     = $("#roomdiv").html();
        var servicediv  = $("#servicediv").html();
        var yeardiv     = $("#yeardiv").html();
        var datediv     = $("#datediv").html();
        var datediv1     = $("#datediv1").html();
        $("#roomdiv,#servicediv,#datediv,#datediv1").html("");
        $("select[name=rooms]").change(function(){
            if($(this).val() == "all"){
                if($("select[name=services]").val() == "all"){
                    $("#roomdiv,#servicediv,#datediv,#datediv1").html("");
                    $("#yeardiv").html(yeardiv)
                    changedate()
                }else{
                    $("#roomdiv,#yeardiv,#datediv,#datediv1").html("");
                    $("#servicediv").html(servicediv)
                    changedate()
                }
            }else{
                if($("select[name=services]").val() == "all"){
                    $("#servicediv,#yeardiv,#datediv,#datediv1").html("");
                    $("#roomdiv").html(roomdiv)
                    changedate()
                }else{
                    $("#roomdiv,#yeardiv,#datediv,#servicediv").html("");
                    $("#datediv1").html(datediv1)
                    changedate()
                }
            }
        })

        $("select[name=services]").change(function(){
            if($(this).val() == "all"){
                if($("select[name=rooms]").val() == "all"){
                    $("#roomdiv,#servicediv,#datediv,#datediv1").html("");
                    $("#yeardiv").html(yeardiv)
                    changedate()
                }else{
                    $("#roomdiv,#servicediv,#datediv,#datediv1").html("");
                    $("#roomdiv").html(roomdiv)
                    changedate()
                }
            }else{
                if($("select[name=rooms]").val() == "all"){
                    $("#roomdiv,#yeardiv,#datediv,#datediv1").html("");
                    $("#servicediv").html(servicediv)
                    changedate()
                }else{
                    $("#roomdiv,#yeardiv,#datediv,#servicediv").html("");
                    $("#datediv1").html(datediv1)
                    changedate()
                }
            }
        })



        $("#table").unbind("click").click(function(){
            $(".btn").removeClass("btn-info")
            $(this).addClass("btn-info")
            $("#chartarea").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $("#formms").ajaxSubmit({
                url:"<?php echo url('report/table') ?>",
                target: '#chartarea',
                data: {chat:'table'},
                success:  afterSuccess
            });
        });
        $("#table").trigger("click");
        
        $("#pie").unbind("click").click(function(){
            $(".btn").removeClass("btn-info")
            $(this).addClass("btn-info")
            $("#chartarea").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $("#formms").ajaxSubmit({
                url:"<?php echo url('report/pie') ?>",
                target: '#chartarea',
                data: {chat:'table'},
                success:  afterSuccess
            });
        });

        $("#bar").unbind("click").click(function(){
            $(".btn").removeClass("btn-info")
            $(this).addClass("btn-info")
            $("#chartarea").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $("#formms").ajaxSubmit({
                url:"<?php echo url('report/bar') ?>",
                target: '#chartarea',
                data: {chat:'table'},
                success:  afterSuccess
            });
        });

        $("#line").unbind("click").click(function(){
            $(".btn").removeClass("btn-info")
            $(this).addClass("btn-info")
            $("#chartarea").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $("#formms").ajaxSubmit({
                url:"<?php echo url('report/line') ?>",
                target: '#chartarea',
                data: {chat:'table'},
                success:  afterSuccess
            });
        });
    });

    function afterSuccess(){

    }
    function changedate(){
        $("select[name=yaxis]").change(function(){
            if($(this).val() == "Years"){
                $(".start,.end").show('slow');

            }else if($(this).val() == "year"){
                $(".start").hide('slow')
                $(".end").show('slow')
            }else {
                $(".start,.end").hide('slow')
            }
        });
    }
</script>
@stop