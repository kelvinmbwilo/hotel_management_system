@extends('layout.master')

@section('breadcumbs')
<li><a href="{{url("guest")}}">Home</a></li>
<li class="active">Guests</li>
@stop

@section('content')
<?php
$guest = Guest::all();
?>
<ul class="nav nav-tabs" id="myTab">

    <li><a href="#all" data-toggle="tab">All Guests</a></li>
    <li><a href="#staying" data-toggle="tab">Staying</a></li>
    <li><a href="#booking" data-toggle="tab">Booking</a></li>
</ul>

<div class="tab-content">
<?php
$option_array = array("all"=>"all","Stay"=>"staying","Booked"=>"booking")
?>
    @foreach($option_array as $key => $option)
    <div class="tab-pane" id="{{ $option }}">
        <table class='table table-striped table-responsive' id='guesttable'>

            <thead>
            <tr>
                <th> #</th>
                <th> First NAme </th>
                <th> Middle NAme </th>
                <th> Last Name </th>
                <th> Country </th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            if($key == "all" ){
                $guestlist  = $guest;
            }elseif($key == "Stay"){
                $guestlist  = Guest::where("status","Stay")->get();
            }elseif($key == "Booked"){
                $guestlist  = Guest::where("status","Booked")->get();
            }
            ?>
            @foreach($guestlist as $mgeni)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $mgeni->first_name }}</td>
                <td>{{ $mgeni->middle_name }}</td>
                <td>{{ $mgeni->last_name }}</td>
                <td>{{ $mgeni->countries['name'] }}</td>
                <td>{{ $mgeni->status }}</td>
                <td id="{{ $mgeni->id }}" class="links">
                    @if($mgeni->status == "Stay")
                    <a href="#d" title="Extend Time" class="extend btn btn-xs btn-info"><i class="fa fa-arrow-right text-info"></i> Extend Time</a>
                    @elseif($mgeni->status == "Booked")
                    <a href="#d" title="Extend Time" class="confirnguest extend btn btn-xs btn-info"><i class="fa fa-arrow-right text-info"></i> Confirm</a>

                    @endif
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    @endforeach

</div>

<script>

        $(document).ready(function(){
            $("table[id=guesttable]").dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "fnDrawCallback": function( oSettings ) {
                    //confirming a guest
                    $(".confirnguest").click(function(){
                        var id1 = $(this).parent().attr('id');
                        $(".confirnguest").show("slow").parent().parent().find("span").remove();
                        var btn = $(this).parent().parent();
                        var msg  ="<span><br/>"
                        msg += "Confirm That The Guest Has Occupy The Room";
                        msg += "<br /><a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Confirm</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> Cancel</a>"
                        msg +="</span>"
                        $(this).hide("slow").parent().append(msg);
                        $("#no").click(function(){
                            $(this).parent().parent().find(".confirnguest").show("slow");
                            $(this).parent().parent().find("span").remove();
                        });
                        $("#yes").click(function(){
                            var msgarea = $(this).parent();
                            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>confirming...");
                            $.post("<?php echo url("guest/confirm")?>/"+id1,function(data){
                                msgarea.html(data);
                                setTimeout(function() {
                                    btn.hide("slow").next("hr").hide("slow");
                                }, 2000);
                            });
                        });
                    });//endof confirming guest
                }
            })
            $('#myTab a:first').tab('show')

        })



</script>

@stop