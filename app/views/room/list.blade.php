<?php
$room = Room::all();
?>
        <table class='table table-striped table-responsive' id='roomtable'>

            <thead>
            <tr>
                <th>Rooms</th>

            </tr>
            </thead>
        <tbody>
        <tr>
            <?php $i = 1; ?>
            @foreach($room as $rooms)
            <td >
                <div class="col-xs-12">
                     <div class="col-sm-4">
                         @if($rooms->image == "")
                         {{ HTML::image("http://placehold.it/100x100","",array('class'=>'img-rounded')) }}
                         @else
                         {{ HTML::image("uploads/rooms/{$rooms->image}","",array('class'=>'img-rounded thumbnail','style'=>'height:100px;width:100px')) }}
                         @endif
                     </div>
                     <div class="col-sm-8">
                        <div class="col-xs-6">
                            Name:{{$rooms->name}}<br><br>
                            Category:{{ $rooms->category }}<br><br>
                            Price:{{ $rooms->price }}
                        </div>
                        <div class="col-xs-6">
                            Bed Type:{{ $rooms->bed_type }}<br><br>
                            Bed Size:{{ $rooms->bed_size }}<br><br>
                            Status:{{ $rooms->status }}
                        </div>
                     </div>
               </div>
               <div class="col-xs-12 links" id="{{ $rooms->id }}">
                   <a href="#a" title="edit Room" class="editroom btn btn-xs btn-info"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                   <a href="#s" title="delete Room" class="deleteroom btn btn-xs btn-danger"><i class="fa fa-trash-o text-info"></i> delete</a>&nbsp;&nbsp;&nbsp;
                    <div class="btn-group">
                       <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                           Guest <span class="caret"></span>
                       </button>
                       <ul class="dropdown-menu" role="menu">
                           <li><a href="{{ url("guest/add")}}"><i class="fa fa-plus-square-o"></i> Add</a></li>
                           <li><a href="#"><i class="fa fa-th"></i> List</a></li>
                     </ul>
                   </div>
               </div>

            </td>
        </tr>
            @endforeach

        </tbody>
        </table>

<!--script to process the list of rooms-->
<script>
    $(document).ready(function (){

        $("#roomtable").dataTable({
//            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "fnDrawCallback": function( oSettings ) {
//               $("#stafftable").find("td.links a").hide();
//               $("#stafftable").find("tr").hover(function(){
//                   $(this).find("td.links a").show()
//               },function(){
//                   $(this).find("td.links a").hide();
//               })
                $(".editroom").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $("#addroom").html("<br><i class='fa fa-spinner fa-spin'></i>loading...");
                    $("#addroom").load("<?php echo url("room/edit") ?>/"+id1);
                })
                $(".deleteroom").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $(".deleteroom").show("slow").parent().parent().find("span").remove();
                    var btn = $(this).parent().parent().parent();
                    $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                    $("#no").click(function(){
                        $(this).parent().parent().find(".deleteroom").show("slow");
                        $(this).parent().parent().find("span").remove();
                    });
                    $("#yes").click(function(){
                        $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                        $.post("<?php echo url("room/delete")?>/"+id1,function(data){
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


