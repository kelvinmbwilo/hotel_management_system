<?php
$service = Services::all();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>African Tourism Services International (T) Ltd</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ HTML::style("bootstrap/css/bootstrap.css") }}
    {{ HTML::style("bootstrap/css/bootstrap-theme.css") }}
    {{ HTML::style("font-awesome/css/font-awesome.css") }}
    {{ HTML::style("jqueryui/css/start/jquery-ui.css") }}
    {{ HTML::style("DataTables/media/css/jquery.dataTables.css") }}
    {{ HTML::style("DataTables/media/css/jquery.dataTables_themeroller.css") }}
    {{ HTML::style("style/delta.grey.css") }}
    {{ HTML::style("style/delta.main.css") }}
    {{ HTML::script("js/jquery-1.9.1.js") }}
</head>
<body>
<div class="container">
<div class="row">
    <div class = "pageTitle">
        <div class = "col-sm-3"> </div>
        <div class="rowfluid col-sm-8" style="background-color:#0063DC; height: 50px;width: 400px">
            <h4 class = "featurette-heading" style="font-size: 25px; color: #fcfdfd">Welcome to Tembo Tarangire</h4>
        </div>
        <div class = "col-sm-2"></div>
    </div>
</div>
    <hr>
    <div class="info" style="">
        <h3 class="text-primary" style="text-align: center">At Tembo Tarangire we Offer .....</h3>
        <div class="col-lg-4" style="background-color: #d58512; color: #fcfdfd; padding-right: 4px" >
     <h4>Lodge Services</h4>
            <ul>
            @foreach($service as $huduma)
                <li>
                    {{ $huduma->name }}
                </li>
            @endforeach
            </ul>
        </div>
        <div class="col-sm-4" style="background-color: #fcfdfd; padding-right : 4px">
            <h4>Tourism Activities</h4>
              hotel<br>
              Tourism<br>
              Lodge
        </div>
        <div class="col-sm-4" style="background-color: #003333; padding-left:4px; color: #fcfdfd ">
         <h4>Hotel Image</h4>
        </div>

    </div>

    <div class="row col-sm-12 text-primary" style="padding: 10px">
<div class = "col-sm-5">

    Dear  <br>
    Email<br>
    Phone Number<br>
    Country
</div>
        <div class = "col-sm-7" >

           <div class="col-sm-4">
               Room Name<br>
               Price<br>
               Check In<br>
               Check Out
           </div>
            <div class="col-sm-3">
                Ordered Services
           </div>
        </div>
    </div>
    <div class="col-sm-12">
         <h3 class="" style="text-align: center">Thanks and Welcome to Our Hotel</h3>
         <h4 class="text-muted"  style="text-align: center">Tembo Tarangire<span class="text-danger">&nbsp;&nbsp;&nbsp;The Home of Natural Creatures</span> </h4>
    </div>
    <div class="col-sm-12">
     <strong style="text-align: center">
         @Tembo tarangire Hotel
     </strong>
    </div>
</div>


{{ HTML::script("js/jquery.form.js") }}
{{ HTML::script("jqueryui/js/jquery-ui-1.10.3.custom.js") }}
{{ HTML::script("bootstrap/js/bootstrap.js") }}
{{ HTML::script("DataTables/media/js/jquery.dataTables.js") }}
{{ HTML::script("/js/jquery.form.js") }}
{{ HTML::script("Highcharts/js/highcharts.js") }}
{{ HTML::script("Highcharts/js/themes/gray.js") }}
{{ HTML::script("Highcharts/js/modules/exporting.js") }}
</body>

</html>

