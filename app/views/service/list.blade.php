<?php
$service = Services::all();
?>
        <table class='table table-striped table-responsive' id='servicetable'>

        <thead>
        <tr>
            <th> No</th>
            <th> Name </th>
            <th> price </th>
            <th> description </th>
            @if(Session::get('role')!= 'receptionist')
            <th>Action</th>
            @endif
        </tr>
        </thead>
        <tbody>
        <tr style="font-size: 11px">
            <?php $i = 1; ?>
            @foreach($service as $huduma)
            <td>{{ $i++ }}</td>
            <td>{{ $huduma->name }}</td>
            <td>{{ $huduma->price }}</td>
            <td>{{ $huduma->description }}</td>
            @if(Session::get('role')!= 'receptionist')
            <td id="{{$huduma->id}}" class="links">
                <a href="#b" title="edit Service" class="editservice btn btn-xs btn-info"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
               <a href="#s" title="delete service" class="deletservice btn btn-xs btn-danger"><i class="fa fa-trash-o text-info"></i> delete</a>

            </td>
            @endif
        </tr>
        @endforeach

        </tbody>
        </table>

<!--script to process the list of service-->
<script>
    $(document).ready(function (){

        $("#servicetable").dataTable({
          "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "fnDrawCallback": function( oSettings ) {
//               $("#stafftable").find("td.links a").hide();
//               $("#stafftable").find("tr").hover(function(){
//                   $(this).find("td.links a").show()
//               },function(){
//                   $(this).find("td.links a").hide();
//               })

                $(".editservice").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $("#addservice").html("<br><i class='fa fa-spinner fa-spin'></i>loading...");
                    $("#addservice").load("<?php echo url("service/edit") ?>/"+id1);
                })
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

