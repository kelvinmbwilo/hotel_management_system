<div id="sidebar"> 
    <h2 id="logo" ><a href="index.php">{{ HTML::image('img/image1.jpg','',array('class'=>'img-responsive img-rounded', 'style'=>'height:160px;width:90%')) }}</a></h2>
    <ul>
            <li class="active"><a href="{{url('home')}}"><i class="fa fa-home fa-2x"></i> <span>Dashboard</span></a></li>
          @if(Auth::user()->access!="receptionist")
        <li class="submenu">
            <a href="#"><i class="fa fa-user fa-2x"></i> <span>User</span> <i class="fa fa-chevron-down pull-right"></i></a>
            <ul>
                <li><a href="{{url("user")}}"><i class='fa fa-plus'> </i> Manage <i class="fa fa-chevron-right pull-right"></i></a></li>
            </ul>
        </li>
        @endif
        <li class="submenu">
            <a href="#"><i class="fa fa-rss fa-2x"></i> <span>Room </span> <i class="fa fa-chevron-down pull-right"></i></a>
            <ul>
                <li><a href="{{ url("rooms") }}"><i class='fa fa-plus'></i> Manage <i class="fa fa-chevron-right pull-right"></i></a></li>

            </ul>
        </li>
            <li class="submenu">
                    <a href="#"><i class="fa fa-apple fa-2x"></i> <span>Services</span> <i class="fa fa-chevron-down pull-right"></i></a>
                    <ul>
                        <li><a href="{{url("services")}}"><i class='fa fa-building-o'></i> Manage <i class="fa fa-chevron-right pull-right"></i></a></li>


                    </ul>
            </li>

        <li class="submenu">
            <a href="#"><i class="fa fa-bar-chart-o fa-2x"></i> <span>Reports</span> <i class="fa fa-chevron-down pull-right"></i></a>
            <ul>
                <li><a href="{{url("services")}}"><i class='fa fa-building-o'></i> Manage <i class="fa fa-chevron-right pull-right"></i></a></li>


            </ul>
        </li>
    </ul>
</div>
