@extends('website.layout.master')

@section('contents')

<div class="pageTitle">
    <div class="container">
        <h2>Tourism</h2>
        <ul class="nav navbar-nav">
            <li><a href="{{url('serengeti')}}">Serengeti National Park</a></li>
            <li><a href="{{url('#')}}">Tarangire National Park</a></li>
            <li><a href="{{url('arusha')}}">Arusha National Park</a></li>
            <li><a href="{{url('ngorongoro')}}">Ngorongoro Conservation</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="bodyInner">
        <div class="row">
            <div class="col-md-8">
                <p>Herds of up to 300 elephants scratch the dry river bed for underground streams, while migratory wildebeest, zebra, buffalo, impala, gazelle, hartebeest and eland crowd the shrinking lagoons. It's the greatest concentration of wildlife outside the Serengeti ecosystem - a smorgasbord for predators – and the one place in Tanzania where dry-country antelope such as the stately fringe-eared oryx and peculiar long-necked gerenuk are regularly observed.
                </p><p>
                    The principal features of the park are the flood plains and the grassland, mainly comprising of various types of acacia trees, and a few scattered baobabs, tamarind and the sausage trees. The Tarangire River, after which the park is named, provides the only permanent water for wildlife in the area. When the Maasai Steppes dry up with the end of the long rains in June, migratory animals return to the Tarangire River, making Tarangire National Park second only to Ngorongoro in the concentration of wildlife. This period stretches between June and November and it is the best season for game viewing in Tarangire.
                </p><p>
                    Tarangire National Park, with an area of 2600 sq. kms, situated only 120 km from Arusha, is famous for its dense wildlife population. The park offers splendid view over the savannah, interpassed with acacia and baobab trees includes the swamps, river, and rock outcrops. The area is engulfed by several hills. Between June and December during this time of the year thousands of animals migrate from the dry Maasai steppe to Tarangire river looking for water.
                </p><p>
                    Among species to be seen in Tarangire are buffalo, elephant, lion, warthog, eland, the fringe-eared , and a large number of impalas and gazelles. Tarangire National Park is also famous for tree climbing pythons and abundant bird life.
                </p>
            </div>
            <div class="col-md-3">
                <img  class="img"  style="width: 400px; height: 300px;box-shadow: 5px 5px 10px #888888"  src="{{asset('website/themes/assets/images/arr.jpg')}}" alt="Generic placeholder image">
            </div>
            <div class="col-md-1">

            </div>

        </div><p><strong>WHERE IS TARANGIRE NATIONAL PARK LOCATED?</strong>
        </p><p>
            Tarangire National Park is located 110Km on the eastern part of Lake Manyara, Ngorongoro Crater and the famous Serengeti National Park. It is 110Km from Arusha Town accessible by driving down towards Dodoma main road. On reaching the right junction of Makuyuni towards Lake Manyara, if you just turn to the left you will notice the signbord indicating you to the maingate entrance of the Tarangire National Park.
        </p><p><strong>FEES CHARGED FOR ENTRY PER PERSON TO TARANGIRE NATIONAL PARKS</strong>
        </p>

    </div>
</div>


@stop