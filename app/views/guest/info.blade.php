<div class="col-xs-12 lead">
    <p ><i class="fa fa-user"></i> {{ $guest->first_name }} {{ $guest->middle_name }} {{ $guest->last_name }}</p>
    <p>Room:{{ $guest->room()->first()->room->name }}</p>
    <p>
        Check In:{{ date("j,M  Y",strtotime($guest->room()->first()->check_in)) }}
        <br>Check Out:{{  date("j,M  Y",strtotime($guest->room->first()->check_out)) }}
    </p>
    <p ><i class="fa fa-envelope-o"></i><a href="mailto:{{ $guest->email }}"> {{ $guest->email }} </a></p>
    <p><i class="fa fa-phone"></i> {{ $guest->phone_number }}</p>
    <p><i class="fa fa-map-marker"></i>  {{ $guest->country }}</p>
</div>