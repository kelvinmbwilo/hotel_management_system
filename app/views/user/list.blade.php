
<!--@section('breadcumbs')-->
<!--<li><a href="{{ url("home")}}">Home</a></li>-->
<!--<li><a href="{{ url("user/list") }}">users</a></li>-->
<!--<li class="active">add</li>-->
<!--@stop-->
<?php
$user = User::all();
?>
        <table class='table table-striped table-responsive' id='stafftable' >
            <thead>
            <tr>
                <th> # </th>
                <th> Name </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Role </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach($user as $us)
            @if($us->status == "active")
            <tr style="font-size: 11px">
                <td>{{ $i++ }}</td>
                <td style="text-transform: capitalize">{{ $us->first_name }} {{ $us->middle_name }} {{ $us->last_name }}</td>
                <td>{{ $us->email }}</td>
                <td>{{ $us->phone }}</td>
                <td>{{ $us->access }}</td>
                <td id="{{ $us->id }}" class="links">
                    <a href="{{ url("user/log/{$us->id}")}}" title="View Staff log" class="userlog btn btn-xs btn-success"><i class="fa fa-list text-success"></i> log</a>&nbsp;&nbsp;&nbsp;
                    <a href="#b" title="edit Staff" class="edituser btn btn-xs btn-info"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                    <a href="#s" title="delete Staff" class="deleteuser btn btn-xs btn-danger"><i class="fa fa-trash-o text-info"></i> delete</a>
                </td>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>


<!--script to process the list of users-->
<script>
    $(document).ready(function (){

        $("#stafftable").dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "fnDrawCallback": function( oSettings ) {
//               $("#stafftable").find("td.links a").hide();
//               $("#stafftable").find("tr").hover(function(){
//                   $(this).find("td.links a").show()
//               },function(){
//                   $(this).find("td.links a").hide();
//               })

                $(".edituser").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $("#adduser").html("<br><i class='fa fa-spinner fa-spin'></i>loading...");
                    $("#adduser").load("<?php echo url("user/edit") ?>/"+id1);
                })

                $(".deleteuser").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $(".deleteuser").show("slow").parent().parent().find("span").remove();
                    var btn = $(this).parent().parent();
                    $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                    $("#no").click(function(){
                        $(this).parent().parent().find(".deleteuser").show("slow");
                        $(this).parent().parent().find("span").remove();
                    });
                    $("#yes").click(function(){
                        $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                        $.post("<?php echo url("user/delete")?>/"+id1,function(data){
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
