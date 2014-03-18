@extends('layout.master')

@section('menubar')
<li><a href="#">Home</a> </li>
<li class="active">Services</li>
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <table class='table table-striped table-responsive' id='servicetable'>

        <thead>
        <tr>
            <th>Service #</th>
            <th> Name </th>
            <th> description </th>
            <th> price </th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php $i = 1; ?>
            @foreach($service as $huduma)
            <td>{{ $i++ }}</td>
            <td>{{ $huduma->name }}</td>
            <td>{{ $huduma->price }}</td>
            <td>{{ $huduma->description }}</td>
            <td id="{{$huduma->id}}" class="links">
                <a href="{{url("service/log/{$huduma->id}")}}"title="Logs" class="logs"><i class="fa fa-list text-info"></i> Logs</a>
                <a href="{{ url("service/edit/{$huduma->id}")}}" title="edit Service" class="editservice"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
<!--                <a href="{{ url("service/delete/{$huduma->id}")}}" title="delete Service" class="deleteservice"><i class="fa fa-trash-o text-info"></i> delete</a>-->
               <a href="#s" title="delete service" class="deletservice btn btn-xs btn-danger"><i class="fa fa-trash-o text-info"></i> delete</a>
            </td>
        </tr>
        @endforeach

        </tbody>
        </table>
    </div>
</div>

<!--script to process the list of service-->
<script>
    $(document).ready(function (){

        $("#servicetable").dataTable({
//            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "fnDrawCallback": function( oSettings ) {
//               $("#stafftable").find("td.links a").hide();
//               $("#stafftable").find("tr").hover(function(){
//                   $(this).find("td.links a").show()
//               },function(){
//                   $(this).find("td.links a").hide();
//               })
                $(".deletservice").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $(".deletservice").show("slow").parent().parent().find("span").remove();
                    var btn = $(this).parent().parent();
                    $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                    $("#no").click(function(){
                        $(this).parent().parent().find(".deletservice").show("slow");
                        $(this).parent().parent().find("span").remove();
                    });
                    $("#yes").click(function(){
                        $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                        $.post("<?php echo url("service/delete")?>/"+id1,function(data){
                            btn.hide("slow").next("hr").hide("slow");
                        });
                    });
                });//endof deleting category
            }
        });
        $('input[type="text"]').addClass("form-control");
        $('select').addClass("form-control");


    });
</script>
@stop
