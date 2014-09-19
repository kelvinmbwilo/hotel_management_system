@extends('layout.master')

@section('breadcumbs')
<li class="active">Dashboard</li>
@stop

@section('content')

<div class="col-sm-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Rooms</h3>
        </div>
        <div class="panel-body">
            <h3 style="margin: 0px">{{ count(Room::all()) }}</h3>
        </div>
    </div>
</div>
<div class="col-sm-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Services</h3>
        </div>
        <div class="panel-body">
            <h3 style="margin: 0px"> {{ count(Services::all()) }}</h3>
        </div>
    </div>
</div>

<div class="col-sm-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Guests</h3>
        </div>
        <div class="panel-body">
            <h3 style="margin: 0px">{{ count(Guest::all()) }}</h3>
        </div>
    </div>
</div>
<div class="col-sm-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Bookings</h3>
        </div>
        <div class="panel-body">
            <h3 style="margin: 0px">{{ count(Booking::all()) }}</h3>
        </div>
    </div>
</div>

<div id="visits" style="margin-bottom: 20px"></div>
<div id="visits1"></div>
<?php
$sector = Room::all()->lists('name','id');
$i =0;
$category = "";
$column = "";
$pie = "";
foreach($sector as $key=>$value){
    $i++;
    $category .= (count($sector) == $i)?"'$value'":"'$value',";
    $column .= (count($sector) == $i)?count(RoomGuest::where('room_id',$key)->get()):count(RoomGuest::where('room_id',$key)->get()).",";
    $pie .= (count($sector) == $i)?"{ name:'".$value."',y: ".count(RoomGuest::where('room_id',$key)->get())."}":"{ name:'".$value."',y: ".count(RoomGuest::where('room_id',$key)->get())."},";

}
$operation = Services::all()->lists('name','id');
$k =0;
$category1 = "";
$column1 = "";
$pie1 = "";
foreach($operation as $key=>$value){
    $k++;
    $category1 .= (count($operation) == $i)?"'$value'":"'$value',";
    $column1 .= (count($operation) == $i)?count(BookingServices::where('service_id',$key)->get()):count(BookingServices::where('service_id',$key)->get()).",";
    $pie1 .= (count($operation) == $i)?"{ name:'".$value."',y: ".count(BookingServices::where('service_id',$key)->get())."}":"{ name:'".$value."',y: ".count(BookingServices::where('service_id',$key)->get())."},";

}

echo $category1;

?>
<script>
    $(function () {
        $('#visits').highcharts({
            title: {
                text: 'Room - Guest Distribution'
            },
            xAxis: {
                categories: [<?php echo $category ?>]
            },
            labels: {
                items: [{
                    html: 'Room - Guest Distribution',
                    style: {
                        left: '150px',
                        top: '0px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            series: [{
                type: 'column',
                data: [<?php echo $column ?>]
            }, {
                type: 'spline',
                name: 'Average',
                data: [<?php echo $column ?>],
                marker: {
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[3],
                    fillColor: 'white'
                }
            }, {
                type: 'pie',
                name: 'Guests',
                data: [<?php echo $pie ?>],
                center: [50, 20],
                size: 120,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });

        $('#visits1').highcharts({
            title: {
                text: 'Guest - Services Distribution'
            },
            xAxis: {
                categories: [<?php echo $category1 ?>]
            },
            labels: {
                items: [{
                    html: 'Guest - Services Distribution',
                    style: {
                        left: '150px',
                        top: '0px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            series: [{
                type: 'column',
                data: [<?php echo $column1 ?>]
            }, {
                type: 'spline',
                name: 'Average',
                data: [<?php echo $column1 ?>],
                marker: {
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[3],
                    fillColor: 'white'
                }
            }, {
                type: 'pie',
                name: 'NGOs',
                data: [<?php echo $pie1 ?>],
                center: [50, 20],
                size: 120,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });
    });


</script>
@stop