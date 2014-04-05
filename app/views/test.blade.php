     <?php

     ?>
	  <div id="mainBody">
			<h1>Hotel Management Information System <span class="text-primary pull-right" > HMIS </span> </h1>


				<div class=" col-sm-12">
                    <div class="dropdown col-sm-2 pull-right">
                        <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html"><i class="fa fa-user">  </i>
                          {{ Auth::user()->first_name}}  {{ Auth::user()->last_name}}
                        </a>


                        <ul class="dropdown-menu text-success" role="menu" aria-labelledby="dLabel" style="padding-left: 5px;padding-right: 5px">
                        <li>
                            <div>
                            <a href="#">Profile</a>
                            </div>
                        </li>
                        <li>
                            <div class="password" id="">
                                <a class="link" id="resetpass" href="#"><i class="fa fa-lock pull-right"></i>Reset Password </a>
                            </div>
                        </li>
                        <li>
                            <div class="button1 ">
                               <a title="" href="{{url("logout")}}"><i class="fa fa-power-off pull-right"></i> Logout</a>
                            </div>

                        </li>
                        </ul>
                    </div>

                    <div class="col-sm-1 pull-right">
                        <a href="{{ url('guest/confirm_booking') }}" title="{{ Guest::where('status','Booked')->count() }} Guest(s) Waiting For Confirmation">
                            <i class="fa fa-comments"></i>
                            <span class="badge bookcount">{{ Guest::where('status','Booked')->count() }}</span></a>
                        <script>

                        </script>
                    </div>
				</div>

		
		</div>

     <script>
         $(document).ready(function (){
             $("#resetpass").click(function(){
                 var id = $(this).attr("id");
                 var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                 modal+= '<div class="modal-dialog">';
                 modal+= '<div class="modal-content">';
                 modal+= '<div class="modal-header">';
                 modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                 modal+= '<h4 class="modal-title" id="myModalLabel">Reset Password</h4>';
                 modal+= '</div>';
                 modal+= '<div class="modal-body">';

                 modal+= ' </div>';
                 modal+= '<div class="modal-footer">';
                 modal+= '   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                 modal+= '</div>';
                 modal+= '</div>';
                 modal+= '</div>';

                 $("body").append(modal);
                 $("#myModal").modal("show");
                 $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
                 $(".modal-body").load("<?php echo url("guest/add") ?>/"+id);
                 $("#myModal").on('hidden.bs.modal',function(){
                     $("#myModal").remove();
                 })

             })

             $('input[type="text"]').addClass("form-control");
             $('select').addClass("form-control");


         });
     </script>

            {{ HTML::script("js/excanvas.min.js") }}
            
            {{ HTML::script("js/jquery.peity.min.js") }}
            {{ HTML::script("js/fullcalendar.min.js") }}
            {{ HTML::script("js/delta.js") }}
