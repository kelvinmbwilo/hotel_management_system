<?php

class ReportController extends \BaseController {


    public function processQuery($query){
        $query = $this->processStatus($query,"");
        $query1 = $this->processRoom($query[0],$query[1]);
        $query2 = $this->processDaterange($query1[0],$query1[1]);
        $query3 = $this->processService($query2[0],$query2[1]);
        $query4 = $this->processCountry($query3[0],$query3[1]);
        return $query4;
    }

    public function table(){
        $row = array();
        $column = array();
        $title = "";
        if(Input::get('vertical') == 'Guests'){
            if(Input::get('yaxis') == "Years"){
                $row = range(Input::get('start'),Input::get('end'));
                $tit = "";
                foreach($row as $value){
                    $val = $value+1;
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array("$value-01-01","$val-01-01"))->get()->lists('guest_id')+array('0')));
                    $column[] = $que[0]->count();

                }
                $tit .= $que[1];
                $title ="Guests $tit From ". Input::get('start')." To ". Input::get('end');

            }
            elseif(Input::get('yaxis') == "room"){
                $row = Room::all()->lists('name','id');
                $tit = "";
                foreach($row as $key => $value){
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', RoomGuest::where('room_id',$key)->get()->lists('guest_id')));
                    $column[] = $que[0]->count();
                }
                $tit .= $que[1];
                $title ="Room Guests Distribution $tit ";
            }
            elseif(Input::get('yaxis') == "Services"){
                $row = Services::all()->lists('name','id');
                $tit = "";
                foreach($row as $key => $value){
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', BookingServices::where('service_id',$key)->get()->lists('guest_id')));
                    $column[] = $que[0]->count();
                }
                $tit .= $que[1];
                $title ="Guests Service Distribution $tit  ";
            }
            elseif(Input::get('yaxis') == "year"){
                $row = array("01"=>"jan","02"=>"feb","03"=>"mar","04"=>"apr","05"=>"may","06"=>"jun","07"=>"jul","08"=>"aug","09"=>"sep","10"=>"oct","11"=>"nov","12"=>"dec");
                $tit = "";
                $before="";
                foreach($row as $key => $value){
                    $from = Input::get('end')."-".$key."-01";
                    $to = Input::get('end')."-".$key."-31";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array($from,$to))->get()->lists('guest_id')+array('0')));
                    $column[] = $que[0]->count();
                }
                $tit .= $que[1];
                $title ="Guests  $tit  ". Input::get('end');
            }
        }
        elseif(Input::get('vertical') == 'Income'){
            if(Input::get('yaxis') == "Years"){
                $row = range(Input::get('start'),Input::get('end'));
                $tit = "";
                foreach($row as $value){
                    $val = $value+1;
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array("$value-01-01","$val-01-01"))->get()->lists('guest_id')+array('0')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column[] = $cost;

                }
                $tit .= $que[1];
                $title ="Guests $tit From ". Input::get('start')." To ". Input::get('end');

            }
            elseif(Input::get('yaxis') == "room"){
                $row = Room::all()->lists('name','id');
                $tit = "";
                foreach($row as $key => $value){
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', RoomGuest::where('room_id',$key)->get()->lists('guest_id')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column[] = $cost;
                }
                $tit .= $que[1];
                $title ="Room Guests Distribution $tit ";
            }
            elseif(Input::get('yaxis') == "Services"){
                $row = Services::all()->lists('name','id');
                $tit = "";
                foreach($row as $key => $value){
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', BookingServices::where('service_id',$key)->get()->lists('guest_id')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column[] = $cost;
                }
                $tit .= $que[1];
                $title ="Guests Service Distribution $tit  ";
            }
            elseif(Input::get('yaxis') == "year"){
                $row = array("01"=>"jan","02"=>"feb","03"=>"mar","04"=>"apr","05"=>"may","06"=>"jun","07"=>"jul","08"=>"aug","09"=>"sep","10"=>"oct","11"=>"nov","12"=>"dec");
                $tit = "";
                $before="";
                foreach($row as $key => $value){
                    $from = Input::get('end')."-".$key."-01";
                    $to = Input::get('end')."-".$key."-31";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array($from,$to))->get()->lists('guest_id')+array('0')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column[] = $cost;
                }
                $tit .= $que[1];
                $title ="Guests  $tit  ". Input::get('end');
            }
        }

        ?>
        <h4 class="text-center"><?php echo $title ?></h4>
        <table class="table table-responsive table-bordered">
            <tr>
                <th></th>
                <?php
                foreach($row as $header){
                  echo "<th>$header</th>";
                }
                ?>
            </tr>
            <tr>
                <td><?php echo Input::get('vertical') ?></td>
                <?php
                foreach($column as $cols){
                    echo "<td>$cols</td>";
                }
                ?>
            </tr>
        </table>

        <?php

    }

    public function displayBarChart(){
        $row = "categories: [";
        $column = "{ name: '".Input::get('vertical')."', data: [ ";
        $title = "";
        if(Input::get('vertical') == 'Guests'){
            if(Input::get('yaxis') == "Years"){
                $row1 = range(Input::get('start'),Input::get('end'));
                $tit = ""; $i = 1;
                foreach($row1 as $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $val = $value+1;
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array("$value-01-01","$val-01-01"))->get()->lists('guest_id')+array('0')));
                    $column .= ($i < count($row1))?$que[0]->count().",":$que[0]->count();
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests $tit From ". Input::get('start')." To ". Input::get('end');

            }
            elseif(Input::get('yaxis') == "room"){
                $row1 = Room::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', RoomGuest::where('room_id',$key)->get()->lists('guest_id')));
                    $column .= ($i < count($row1))?$que[0]->count().",":$que[0]->count();
                    $i++;
                }
                $tit .= $que[1];
                $title ="Room Guests Distribution $tit ";
            }
            elseif(Input::get('yaxis') == "Services"){
                $row1 = Services::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', BookingServices::where('service_id',$key)->get()->lists('guest_id')));
                    $column .= ($i < count($row1))?$que[0]->count().",":$que[0]->count();
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests Service Distribution $tit  ";
            }
            elseif(Input::get('yaxis') == "year"){
                $row1 = array("01"=>"jan","02"=>"feb","03"=>"mar","04"=>"apr","05"=>"may","06"=>"jun","07"=>"jul","08"=>"aug","09"=>"sep","10"=>"oct","11"=>"nov","12"=>"dec");
                $tit = "";$i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $from = Input::get('end')."-".$key."-01";
                    $to = Input::get('end')."-".$key."-31";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array($from,$to))->get()->lists('guest_id')+array('0')));
                    $column .= ($i < count($row1))?$que[0]->count().",":$que[0]->count();
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests  $tit  ". Input::get('end');
            }
        }
        elseif(Input::get('vertical') == 'Income'){
            if(Input::get('yaxis') == "Years"){
                $row1 = range(Input::get('start'),Input::get('end'));
                $tit = ""; $i = 1;
                foreach($row1 as $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $val = $value+1;
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array("$value-01-01","$val-01-01"))->get()->lists('guest_id')+array('0')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?$cost.",":$cost;
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests $tit From ". Input::get('start')." To ". Input::get('end');

            }
            elseif(Input::get('yaxis') == "room"){
                $row1 = Room::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', RoomGuest::where('room_id',$key)->get()->lists('guest_id')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?$cost.",":$cost;
                    $i++;
                }
                $tit .= $que[1];
                $title ="Room Guests Distribution $tit ";
            }
            elseif(Input::get('yaxis') == "Services"){
                $row1 = Services::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', BookingServices::where('service_id',$key)->get()->lists('guest_id')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?$cost.",":$cost;
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests Service Distribution $tit  ";
            }
            elseif(Input::get('yaxis') == "year"){
                $row1 = array("01"=>"jan","02"=>"feb","03"=>"mar","04"=>"apr","05"=>"may","06"=>"jun","07"=>"jul","08"=>"aug","09"=>"sep","10"=>"oct","11"=>"nov","12"=>"dec");
                $tit = "";$i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $from = Input::get('end')."-".$key."-01";
                    $to = Input::get('end')."-".$key."-31";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array($from,$to))->get()->lists('guest_id')+array('0')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?$cost.",":$cost;
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests  $tit  ". Input::get('end');
            }
        }

        $row .= "]";
        $column .= "]}";

        ?>
        <script type="text/javascript">
            $(function () {
                $('#chartarea').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: '<?php echo $title ?>'
                    },
                    xAxis: {
                        <?php echo $row  ?>
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: '<?php echo Input::get('vertical') ?>'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0"> {series.name} :   </td> ' +
                            '<td style="padding:0"><b>{point.y}  </b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [<?php echo $column ?>]
                });
            });


        </script>
    <?php
    }

    public function displayPieChart(){
        $row = "categories: [";
        $column = " [ ";
        $title = "";
        if(Input::get('vertical') == "Guests"){
            if(Input::get('yaxis') == "Years"){
                $row1 = range(Input::get('start'),Input::get('end'));
                $tit = ""; $i = 1;
                foreach($row1 as $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $val = $value+1;
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array("$value-01-01","$val-01-01"))->get()->lists('guest_id')+array('0')));
                    $column .= ($i < count($row1))?"['".$value."',".$que[0]->count()."],":"['".$value."',".$que[0]->count()."]";
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests $tit From ". Input::get('start')." To ". Input::get('end');

            }
            elseif(Input::get('yaxis') == "room"){
                $row1 = Room::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', RoomGuest::where('room_id',$key)->get()->lists('guest_id')));
                    $column .= ($i < count($row1))?"['".$value."',".$que[0]->count()."],":"['".$value."',".$que[0]->count()."]";
                    $i++;
                }
                $tit .= $que[1];
                $title ="Room Guests Distribution $tit ";
            }
            elseif(Input::get('yaxis') == "Services"){
                $row1 = Services::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', BookingServices::where('service_id',$key)->get()->lists('guest_id')));
                    $column .= ($i < count($row1))?"['".$value."',".$que[0]->count()."],":"['".$value."',".$que[0]->count()."]";
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests Service Distribution $tit  ";
            }
            elseif(Input::get('yaxis') == "year"){
                $row1 = array("01"=>"jan","02"=>"feb","03"=>"mar","04"=>"apr","05"=>"may","06"=>"jun","07"=>"jul","08"=>"aug","09"=>"sep","10"=>"oct","11"=>"nov","12"=>"dec");
                $tit = "";$i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $from = Input::get('end')."-".$key."-01";
                    $to = Input::get('end')."-".$key."-31";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array($from,$to))->get()->lists('guest_id')+array('0')));
                    $column .= ($i < count($row1))?"['".$value."',".$que[0]->count()."],":"['".$value."',".$que[0]->count()."]";
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests  $tit  ". Input::get('end');
            }
        }

        elseif(Input::get('vertical') == "Income"){
            if(Input::get('yaxis') == "Years"){
                $row1 = range(Input::get('start'),Input::get('end'));
                $tit = ""; $i = 1;
                foreach($row1 as $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $val = $value+1;
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array("$value-01-01","$val-01-01"))->get()->lists('guest_id')+array('0')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?"['".$value."',".$cost."],":"['".$value."',".$cost."]";
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests $tit From ". Input::get('start')." To ". Input::get('end');

            }
            elseif(Input::get('yaxis') == "room"){
                $row1 = Room::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', RoomGuest::where('room_id',$key)->get()->lists('guest_id')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?"['".$value."',".$cost."],":"['".$value."',".$cost."]";
                    $i++;
                }
                $tit .= $que[1];
                $title ="Room Guests Distribution $tit ";
            }
            elseif(Input::get('yaxis') == "Services"){
                $row1 = Services::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', BookingServices::where('service_id',$key)->get()->lists('guest_id')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?"['".$value."',".$cost."],":"['".$value."',".$cost."]";
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests Service Distribution $tit  ";
            }
            elseif(Input::get('yaxis') == "year"){
                $row1 = array("01"=>"jan","02"=>"feb","03"=>"mar","04"=>"apr","05"=>"may","06"=>"jun","07"=>"jul","08"=>"aug","09"=>"sep","10"=>"oct","11"=>"nov","12"=>"dec");
                $tit = "";$i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $from = Input::get('end')."-".$key."-01";
                    $to = Input::get('end')."-".$key."-31";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array($from,$to))->get()->lists('guest_id')+array('0')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?"['".$value."',".$cost."],":"['".$value."',".$cost."]";
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests  $tit  ". Input::get('end');
            }
        }

        $row .= "]";
        $column .= "]";
        echo $column;

        ?>
        <script type="text/javascript">
            $(function () {
                var chart;

                $(document).ready(function () {

                    // Build the chart
                    $('#chartarea').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        },
                        title: {
                            text: '<?php echo $title ?>'
                        },
                        tooltip: {
                            pointFormat: '{series.name} : <b>{point.y}</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: false
                                },
                                showInLegend: true
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: '<?php echo Input::get("vertical") ?> Distribution',
                            data: <?php echo $column ?>
                        }]
                    });
                });

            });
        </script>
    <?php
    }

    public function displayLineChart(){
        $row = "categories: [";
        $column = "{ name: '".Input::get('vertical')."', data: [ ";
        $title = "";
        if(Input::get('vertical') == 'Guests'){
            if(Input::get('yaxis') == "Years"){
                $row1 = range(Input::get('start'),Input::get('end'));
                $tit = ""; $i = 1;
                foreach($row1 as $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $val = $value+1;
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array("$value-01-01","$val-01-01"))->get()->lists('guest_id')+array('0')));
                    $column .= ($i < count($row1))?$que[0]->count().",":$que[0]->count();
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests $tit From ". Input::get('start')." To ". Input::get('end');

            }
            elseif(Input::get('yaxis') == "room"){
                $row1 = Room::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', RoomGuest::where('room_id',$key)->get()->lists('guest_id')));
                    $column .= ($i < count($row1))?$que[0]->count().",":$que[0]->count();
                    $i++;
                }
                $tit .= $que[1];
                $title ="Room Guests Distribution $tit ";
            }
            elseif(Input::get('yaxis') == "Services"){
                $row1 = Services::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', BookingServices::where('service_id',$key)->get()->lists('guest_id')));
                    $column .= ($i < count($row1))?$que[0]->count().",":$que[0]->count();
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests Service Distribution $tit  ";
            }
            elseif(Input::get('yaxis') == "year"){
                $row1 = array("01"=>"jan","02"=>"feb","03"=>"mar","04"=>"apr","05"=>"may","06"=>"jun","07"=>"jul","08"=>"aug","09"=>"sep","10"=>"oct","11"=>"nov","12"=>"dec");
                $tit = "";$i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $from = Input::get('end')."-".$key."-01";
                    $to = Input::get('end')."-".$key."-31";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array($from,$to))->get()->lists('guest_id')+array('0')));
                    $column .= ($i < count($row1))?$que[0]->count().",":$que[0]->count();
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests  $tit  ". Input::get('end');
            }
        }
        elseif(Input::get('vertical') == 'Income'){
            if(Input::get('yaxis') == "Years"){
                $row1 = range(Input::get('start'),Input::get('end'));
                $tit = ""; $i = 1;
                foreach($row1 as $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $val = $value+1;
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array("$value-01-01","$val-01-01"))->get()->lists('guest_id')+array('0')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?$cost.",":$cost;
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests $tit From ". Input::get('start')." To ". Input::get('end');

            }
            elseif(Input::get('yaxis') == "room"){
                $row1 = Room::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', RoomGuest::where('room_id',$key)->get()->lists('guest_id')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?$cost.",":$cost;
                    $i++;
                }
                $tit .= $que[1];
                $title ="Room Guests Distribution $tit ";
            }
            elseif(Input::get('yaxis') == "Services"){
                $row1 = Services::all()->lists('name','id');
                $tit = "";  $i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id', BookingServices::where('service_id',$key)->get()->lists('guest_id')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?$cost.",":$cost;
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests Service Distribution $tit  ";
            }
            elseif(Input::get('yaxis') == "year"){
                $row1 = array("01"=>"jan","02"=>"feb","03"=>"mar","04"=>"apr","05"=>"may","06"=>"jun","07"=>"jul","08"=>"aug","09"=>"sep","10"=>"oct","11"=>"nov","12"=>"dec");
                $tit = "";$i = 1;
                foreach($row1 as $key => $value){
                    $row .= ($i < count($row1))?"'".$value."',":"'".$value."'";
                    $from = Input::get('end')."-".$key."-01";
                    $to = Input::get('end')."-".$key."-31";
                    $que = $this->processQuery(DB::table('guest')->whereIn('id',RoomGuest::whereBetween('check_in',array($from,$to))->get()->lists('guest_id')+array('0')));
                    $cost = 0;
                    foreach($que[0]->lists('id') as $guest){
                        $cost += Guest::find($guest)->room->price;
                    }
                    $column .= ($i < count($row1))?$cost.",":$cost;
                    $i++;
                }
                $tit .= $que[1];
                $title ="Guests  $tit  ". Input::get('end');
            }
        }

        $row .= "]";
        $column .= "]}";

        ?>
        <script type="text/javascript">
            $(function () {
                $('#chartarea').highcharts({
                    title: {
                        text: '<?php echo $title ?>'
                    },
                    xAxis: {
                        <?php echo $row  ?>
                    },
                    yAxis: {
                        title: {
                            text: '<?php echo Input::get('vertical') ?>'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        valueSuffix: '<?php  Input::get('vertical') ?>'
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: [<?php echo $column ?>]
                });
            });
        </script>
    <?php
    }

    public function displayTable(){

    }

    public function processRoom($query,$title=""){
        if(Input::get("rooms") != "all"){
           $title .= " At ". Room::find(Input::get("rooms"))->name. " Room ";
           $query->whereIn('id', RoomGuest::where('room_id',Input::get("rooms"))->get()->lists('guest_id'));
        }
        return array($query,$title);
    }
    public function processDaterange($query,$title=""){
        if(Input::get('from') == "" || Input::get('to') == ""){

        }else{
            $title .= " Between ". date("M j, Y",strtotime(Input::get('from'))) ." And ". date("M j, Y",strtotime(Input::get('to')));
            $query->whereIn('id',RoomGuest::whereBetween('check_in',array(Input::get('from'), Input::get('to')))->get()->lists('guest_id')+array('0'));
        }
        return array($query,$title);
    }
    public function processCountry($query,$title=""){

        if(Input::get("country") != "all"){
            $title .= " From ".Country::find(Input::get("country"))->name." ";
            $query->where('country', Input::get("country"));
        }
        return array($query,$title);
    }
    public function processService($query,$title=""){

        if(Input::get("services") != "all"){
            $title .= " Using ". Services::find(Input::get("services"))->name ." Service ";
            $query->whereIn('id', BookingServices::where('service_id',Input::get("services"))->get()->lists('guest_id'));
        }
        return array($query,$title);
    }
    public function processStatus($query,$title=""){

        if(Input::get("booking") != "all"){
            $title .= (Input::get("booking") == 'Stay')?" Confirmed ":" Booking ";
            $query->where('status', Input::get("booking"));
        }
        return array($query,$title);
    }
}