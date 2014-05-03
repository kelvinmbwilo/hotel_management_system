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
                     <div class="col-sm-8" style="font-size: 12px">
                        <div class="col-xs-6">
                            Name : <strong>{{$rooms->name}}</strong><br><br>
                            Category : <strong>{{ $rooms->category }}</strong><br><br>
                            Price : <strong>{{ $rooms->price }}</strong>
                        </div>
                        <div class="col-xs-6">
                            Bed Type : <strong>{{ $rooms->bed_type }}</strong><br><br>
                            Bed Size : <strong>{{ $rooms->bed_size }}</strong><br><br>
<!--                            Status : <strong>{{ $rooms->status }}</strong>-->
                        </div>
                     </div>
               </div>
               <div class="col-xs-12 links" id="{{ $rooms->id }}">
                   @if(Session::get('role')!= 'receptionist')
                   <a href="#a" title="edit Room" class="editroom btn btn-xs btn-info"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                   <a href="#s" title="delete Room" class="deleteroom btn btn-xs btn-danger"><i class="fa fa-trash-o text-info"></i> delete</a>&nbsp;&nbsp;&nbsp;
                   @endif
                    <div class="btn-group">
                       <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                           Guest <span class="caret"></span>
                       </button>
                       <ul class="dropdown-menu" role="menu">
                           <li id="{{ $rooms->id }}"><a href="#s" class='addguest'><i class="fa fa-plus-square-o "></i> Add</a></li>
                           <li id="{{ $rooms->id }}"><a href="#" class='listguest'><i class="fa fa-th"></i> List</a></li>
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
           "bJQueryUI": true,
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

                //listing guest that stays in that room
                $(".listguest").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $("#addroom").html("<br><i class='fa fa-spinner fa-spin'></i>loading...");
                    $("#addroom").load("<?php echo url("room/listguest") ?>/"+id1);
                })

                //adding a guest to a room
                $(".addguest").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $("#addroom").html("<br><i class='fa fa-spinner fa-spin'></i>loading...");
                    $("#addroom").load("<?php echo url("guest/add") ?>/"+id1);
                })

                //deleting a room
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


