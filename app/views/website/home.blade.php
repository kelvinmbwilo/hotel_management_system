@extends('website.layout.master')

@section('contents')

<article id="content">
    <div class="box1">
        <div class="wrapper">
            <form action="#" id="form1">
                <h2>Book a Room</h2>
                <fieldset>
                    <div class="row">
                        <input type="text" class="input">
                        Your Name: </div>
                    <div class="row">
                        <input type="text" class="input">
                        E-Mail Address: </div>
                    <div class="row">
                        <input type="text" class="input">
                        Home Phone: </div>
                    <div class="row">
                        <div class="select1">
                            <select>
                                <option>&nbsp;</option>
                                <option>...</option>
                            </select>
                        </div>
                        Length of Stay: </div>
                    <div class="row">
                        <div class="select1">
                            <select>
                                <option>&nbsp;</option>
                                <option>...</option>
                            </select>
                        </div>
                        Number in Party: </div>
                    <div class="row">
                        <div class="select2">
                            <select>
                                <option>&nbsp;</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="select2">
                            <select>
                                <option>&nbsp;</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="select2">
                            <select>
                                <option>&nbsp;</option>
                                <option>...</option>
                            </select>
                        </div>
                        Arrival Date: </div>
                    <div class="row_textarea"> Additional Comments:
                        <textarea cols="1" rows="1"></textarea>
                    </div>
                    <div class="wrapper"> <a href="#" class="button1">Send</a> <a href="#" class="button1">Clear</a> </div>
                </fieldset>
            </form>
            <div class="kwicks-wrapper marg_bot1">
                <ul class="kwicks horizontal">
                    <li><img src="img/img1.jpg" alt=""></li>
                    <li><img src="img/img2.jpg" alt=""></li>
                    <li><img src="img/img3.jpg" alt=""></li>
                    <li><img src="img/img4.jpg" alt=""></li>
                </ul>
            </div>
        </div>
        <div class="pad">
            <div class="line1">
                <div class="wrapper line2">
                    <div class="col1">
                        <h2><img src="img/title_marker1.jpg" alt="">Services</h2>
                        <p class="pad_bot1">At Butman Tarangire lodge we also accommodate camping, whereby the area for camping can take (100-150) people </p>
                        <a href="#" class="color1">Read More</a> </div>
                    <div class="col1 pad_left1">
                        <h2><img src="img/title_marker2.jpg" alt="">Hotel Guide</h2>
                        <p class="pad_bot1">At Butman Tarangire lodge we also accommodate camping, whereby the area for camping can take (100-150) people </p>
                        <a href="#" class="color1">Read More</a> </div>
                    <div class="col1 pad_left1">
                        <h2><img src="img/title_marker3.jpg" alt="">Activities</h2>
                        <ul class="horizontal">
                            <li><a href="#"> Camping Safari</a></li>
                            <li><a href="#">Cultural Programs</a></li>
                            <li><a href="#">Constructions</a></li>
                            <li><a href="#">Conservation Research</a></li>
                            <li><a href="#">Student's Attachment</a></li>
                        </ul><br>
                        <a href="#" class="color1">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pad">
        <div class="wrapper line3">
            <div class="col2">
                <h2>Welcome to Our Lounge!</h2>
                <p class="pad_bot1"><strong class="color2">Tembo Tarangire Lounge</strong><br>
                    African Tourism Services Internatinal Ltd is a legally registered Company in Tanzania with a certificate of Incorporation No. 48251, registration was done in February 2004.  </p>
                <p class="pad_bot2">  The Company has engaged itself in tourism, accommodation, Nature Conservation Research and Construction since registered.
                    One of the major objectives is to be an active player in the tourism industry aiming to become substantial contributor to the economical well being of its stakeholders in particular, and the country in general.</p>
                <a href="#" class="button1">Read More</a> </div>
            <div class="col1 pad_left1">
                <h2>About Us</h2>
                <div class="wrapper">
                    <figure class="left marg_right1"><img src="img/img6.png" alt=""></figure>
                    <p class="pad_bot1" id="3"><strong class="color2" >African Tourism Services International Ltd</strong></p>
                    <p class="pad_bot2" id="2">African Tourism Services Internatinal Ltd is a legally registered Company in Tanzania with a certificate of Incorporation No. 48251, registration was done in February 2004.

                </div>
                <a href="#" class="button1" id="1">Read More</a> </div>
        </div>
    </div>
</article>

@stop