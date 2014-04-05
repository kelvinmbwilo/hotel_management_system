<?php
$guests = $room->guest;
?>
<table class='table table-striped table-responsive' id='guesttable'>

    <thead>
    <tr>
        <th>Rooms</th>

    </tr>
    </thead>
    <tbody>
    <tr>
        <?php $i = 1; ?>
        @foreach($guests as $guest)
        <td >

           <a href="#d" id="{{ $guest->guest->id }}" class="info"><i class="fa fa-user"></i> {{ $guest->guest->first_name }} {{ $guest->guest->middle_name }} {{ $guest->guest->last_name }}</a>

        </td>
    </tr>
    @endforeach

    </tbody>
</table>

<!--script to process the list of rooms-->
<script>
    $(document).ready(function (){

        $("#guesttable").dataTable({
//            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "fnDrawCallback": function( oSettings ) {

                $(".info").click(function(){
                    var id = $(this).attr("id");
                    var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                    modal+= '<div class="modal-dialog">';
                    modal+= '<div class="modal-content">';
                    modal+= '<div class="modal-header">';
                    modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                    modal+= '<h4 class="modal-title" id="myModalLabel">Guest Information</h4>';
                    modal+= '</div>';
                    modal+= '<div class="modal-body">';

                    modal+= ' </div>';
                    modal+= '<div class="modal-footer">';
                    modal+= '&copy; Tembo Tarangire Lodge';
                    modal+= '</div>';
                    modal+= '</div>';
                    modal+= '</div>';

                    $("body").append(modal);
                    $("#myModal").modal("show");
                    $(".modal-body").load("<?php echo url("guest") ?>/"+id);
                    $("#myModal").on('hidden.bs.modal',function(){
                        $("#myModal").remove();
                    })

                })


            }
        });
        $('input[type="text"]').addClass("form-control");
        $('select').addClass("form-control");


    });
</script>


