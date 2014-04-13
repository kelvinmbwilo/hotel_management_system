<?php
$guest = Guest::all();
?>
        <table class='table table-striped table-responsive' id='guesttable'>

        <thead>
        <tr>
            <th> #</th>
            <th> First NAme </th>
            <th> Middle NAme </th>
            <th> Last Name </th>
            <th> Country </th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php $i = 1; ?>
            @foreach($guest as $mgeni)
            <td>{{ $i++ }}</td>
            <td>{{ $mgeni->first_name }}</td>
            <td>{{ $mgeni->middle_name }}</td>
            <td>{{ $mgeni->last_name }}</td>
            <td>{{ $mgeni->countries['name'] }}</td>
            <td id="{{ $mgeni->id }}" class="links">
<!--                <a href="{{url("guest/log/{$mgeni->id}")}}"title="Logs" class="logs btn btn-xs btn-success"><i class="fa fa-list text-info"></i> Logs</a>&nbsp;&nbsp;&nbsp;-->
                <a href="#a" title="edit Guest" class="editguest btn btn-xs btn-info"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
<!--                <a href="{{ url("guest/delete/{$mgeni->id}")}}" title="delete Guest" class="deleteguest"><i class="fa fa-trash-o text-info"></i> delete</a>-->
                <a href="#d" title="delete Guest" class="deleteguest btn btn-xs btn-danger"><i class="fa fa-trash-o text-info"></i> delete</a>
            </td>
        </tr>
        @endforeach

        </tbody>
        </table>


<!--script to process the list of guests-->
<!--script to process the list of rooms-->
<script>
    $(document).ready(function (){

        $("#guesttable").dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "fnDrawCallback": function( oSettings ) {
//               $("#stafftable").find("td.links a").hide();
//               $("#stafftable").find("tr").hover(function(){
//                   $(this).find("td.links a").show()
//               },function(){
//                   $(this).find("td.links a").hide();
//               })
                $(".editguest").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $("#addguest").html("<br><i class='fa fa-spinner fa-spin'></i>loading...");
                    $("#addguest").load("<?php echo url("guest/edit") ?>/"+id1);
                })
                $(".deleteguest").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $(".deleteguest").show("slow").parent().parent().find("span").remove();
                    var btn = $(this).parent().parent().parent();
                    $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                    $("#no").click(function(){
                        $(this).parent().parent().find(".deleteguest").show("slow");
                        $(this).parent().parent().find("span").remove();
                    });
                    $("#yes").click(function(){
                        $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                        $.post("<?php echo url("guest/delete")?>/"+id1,function(data){
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
