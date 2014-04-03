@extends('website.layout.master')

@section('contents')
<div class="pageTitle">
    <div class="container">
        <h2>Tourism</h2><br><br>
        <div class="row">
            <div class="col-lg-3">
                <div class="media">
                    <a href="menu/"><img src="{{asset('website/themes/assets/images/serengeti.png')}}" alt="Generic placeholder image"> </a>
                    <h3 class="media-heading text-primary-theme">Serengeti National Park</h3>
                    <p>Yet even when the migration is quiet, the Serengeti offers arguably the most scintillating game-viewing in Africa, great herds of buffalo,
                        smaller groups of elephant and giraffe, and thousands upon thousands of eland, topi,</p>
                </div>
                <div class="button1">
                    <p><a class="btn btn-default" href="{{url('serengeti')}}" role="button">Read More &raquo;</a></p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="media"><a href="menu/"><img src="{{asset('website/themes/assets/images/tembo.png')}}" alt="Generic placeholder image"> </a>
                    <h3 class="media-heading text-danger-theme">Tarangire National Park</h3>
                    <p>
                        Herds of up to 300 elephants scratch the dry river bed for underground streams, while migratory wildebeest, zebra, buffalo,
                        impala, gazelle, hartebeest and eland crowd the shrinking lagoons.
                        It's the greatest concentration of wildlife </p>
                </div>
                <div class="button1">
                    <p><a class="btn btn-default" href="{{url('tarangire')}}" role="button">Read More &raquo;</a></p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="media">
                    <a href="menu/"><img src="{{asset('website/themes/assets/images/arusha.png')}}" alt="Generic placeholder image"> </a>
                    <h3 class="media-heading">Arusha National Park</h3>
                    <p>
                        The closest national park to Arusha town – northern Tanzania’s safari capital – Arusha National Park is a multi-faceted jewel, often
                        overlooked by safarigoers, despite offering the opportunity to explore a beguiling diversity of habitats  </p>
                </div>
                <div class="button1">
                    <p><a class="btn btn-default" href="{{url('arusha')}}" role="button">Read More &raquo;</a></p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="media">
                    <a href="menu/"><img src="{{asset('website/themes/assets/images/ngorongoro.png')}}" alt="Generic placeholder image"> </a>
                    <h3 class="media-heading text-primary-theme">Ngorongoro Conservation</h3>
                    <p>
                        The Ngorongoro Conservation Area is huge area with a total of 8,288 sq kms. The areaincludes some other small
                        craters known as Empakai, Olmoti, together with mountains,  </p>
                </div>
                <div class="button1">
                    <p><a class="btn btn-default" href="{{url('ngorongoro')}}" role="button">Read More &raquo;</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop