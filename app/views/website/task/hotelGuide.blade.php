@extends('website.layout.master')

@section('contents')


<div class="pageTitle" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <h2>Hotel Guides</h2>
    </div>
</div>
<div class="container">
    <h2 style="text-align: center">Rights and rules when staying in hotel</h2>
</div>

<div class="container marketing" style="font-size: 15px">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">These rules apply when you, as a private individual, book or stay at a hotel.</h2>
                        <p class="lead">
                            Booking a room is a contract, and you and the hotel can always come to an agreement on the conditions that apply to your booking.
                            Unless special arrangements have been agreed, the following guidelines will apply in accordance with international practice.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/rule.jpg')}}" alt="Fish and Chips">
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 350px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/book.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Bookings and confirmations</h2>
                        <p class="lead">A reservation is regarded as binding once it has been confirmed. Confirmation can be given orally or in writing,
                            for example by e-mail. You and the hotel are then regarded as having agreed a contract. For information on cancellations,
                            please send an email as early as possible.. When making a reservation please quote your name, address,
                            arrival and departure dates.</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Arrival and departure</h2>
                        <p class="lead">Your hotel room will be available from 15.00 at the latest on the day of arrival.
                            You are requested to leave your room by  12.00 at the latest on the day of departure.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/dep.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/arrival.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Late arrivals</h2>
                        <p class="lead">Your room is held up to 18.00 at the latest on your day of arrival. If you expect to arrive later, please notify the hotel in good time to ensure that your room is not allocated to another guest..</p>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 350px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/cancel.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Cancellation, "no shows"<span class="text-muted" style="font-size: 28px">&nbsp;&nbsp;&nbsp;&nbsp;It is the practice of the hotel industry to accept
                                    cancellation of room reservations. The following guidelines apply:</span></h2>
                        <p class="lead">Cancellations should be notified no later than 18.00 on the day before the booked date of arrival.
                            If you fail to claim your room or cancel later than 18.00 on the previous day you are liable to be charged for one night’s stay.
                            You are liable for any special costs which the hotel may incur in connection with your reservation.</p>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/luggage.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Departure before the agreed date.</h2>
                        <p class="lead">If you have booked for a given period but depart early you are liable to the same charge as for a late cancellation,
                            i.e. you pay for an extra night’s stay in addition to the normal charge for your stay.</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Stays for an indefinite period</h2>
                        <p class="lead">If you are staying at a hotel for an indefinite period and extend your stay by a day at a time, you should notify your
                            departure no later than 18.00 on the previous evening, otherwise you will be charged for an extra night’s stay. If the hotel can
                            no longer make the room available to you, it should notify you by no later than 18.00 on the previous evening.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/luggage2.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/liab.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Hotel’s liability</h2>
                        <p class="lead">If the hotel cannot provide a room in the agreed category you have the right to be offered an
                            equivalent or better room at no extra charge, or alternatively a room in another hotel of a similar standard.</p>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Special requests<span class="text-muted" style="font-size: 28px">&nbsp;&nbsp;&nbsp;&nbsp;Facilities adapted for physically-handicapped guests:</span></h2>
                        <p class="lead">Many hotels have adapted parts of their properties for guests with various disabilities. Please advise the hotel of any special
                            requests when you make your reservation to ensure that the hotel is properly equipped and can prepare for your arrival in the best possible way.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/luggage.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>



            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/cigarette.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Smoking</h2>
                        <p class="lead">Most hotel rooms nowadays are non-smoking. If you would like to smoke in your room please check at the time of booking whether smoking is permitted.
                            The hotel is entitled to debit guests for the cost of cleaning fabrics, furnishings etc if the no-smoking rule is infringed.</p>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Pets</h2>
                        <p class="lead">If you plan to bring a pet with you, please check at the time of booking whether this is permitted.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/pets.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/laptop.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Technical equipment (computers etc)</h2>
                        <p class="lead">If you need any special equipment during your stay please advise the hotel before your arrival so that your requirements can be satisfied.</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Food</h2>
                        <p class="lead">If you have any special requests
                            regarding food (vegetarian, gluten-free etc), please notify the hotel at the time of booking.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/kuku.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 350px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/book.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Booking fees and deposits.</h2>
                        <p class="lead">The hotel has the right to request a booking fee or deposit before your reservation becomes binding. These charges will be deducted from your final bill.
                            If you cancel your reservation outside the cancellation time limit the hotel is entitled to retain the booking fee/deposit.</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Payment</h2>
                        <p class="lead">The normal rule is that the hotel bill
                            should be paid as soon as you receive it – nowadays usually when you arrive at the hotel.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/payment.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/credit.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Credit cards, cheques and vouchers.</h2>
                        <p class="lead">Most hotels accept all the main credit cards. However, hotels are not obliged to accept credit cards, cheques, vouchers or foreign currency if
                            they have not indicated their acceptance in advance. It is therefore sensible to check in advance what methods of payment are accepted.</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Penalty interest.</h2>
                        <p class="lead">If you delay your payment, the hotel is entitled to claim penalty interest on the arrears.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/penalt.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/mizigo.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Right to retain luggage.</h2>
                        <p class="lead">The hotel has the legal right to retain a guest’s luggage as security against payment.
                            In certain circumstances, defined by special rules, the hotel has the right to sell the luggage.</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Storage of valuables and luggage</h2>
                        <p class="lead">Your valuables can usually be stored in the hotel’s strongboxes.
                            Check with reception to ensure that your valuables are safe.
                            When arriving and departing, please do not leave your luggage in the lobby unattended. Hotels can often
                            store your luggage in a locked baggage room.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/storage.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/gold.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Highly valuable property.</h2>
                        <p class="lead">If your property is extremely valuable, you must inform the hotel.
                            The hotel is not responsible for the safe keeping of highly valuable property and is liable for the full value of the
                            property only if it has agreed to accept this liability.</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Responsibility for lost or stolen property</h2>
                        <p class="lead">The hotel has no strict responsibility for property which you keep in your room.
                            However, if it becomes apparent that the hotel or the hotel staff have acted carelessly or negligently,
                            or have in some other way contributed to the loss or theft of your property, the hotel can be held liable</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/stolen.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/safety.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Your own safety</h2>
                        <p class="lead">You should always make sure that you know the location of the emergency exits, fire alarms and fire extinguishers.
                            This information is usually found just inside the door to your room or in a special information folder in your room or at reception.
                            Tembo Tarangire, has produced an information folder, “Hotel Safety”. Please read it – for your own safety.
                            If you notice any potential safety hazards, please advise reception immediately</p>
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Allocation of liability</h2>
                        <p class="lead">All hotels accept liability for damage caused by their own negligence.
                            And naturally, you as a customer are responsible for any damage which you or your guests may cause within the hotel.</p>
                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/ima.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Excellent hotels and restaurants</h2>
                        <p class="lead">Always look for the Tembo Tarangire symbol when you are choosing a hotel or restaurant. There are so many
                            hotels and restaurants all over Tanzania – all of them guaranteeing the high standards that Tembo Tarangire exemplifies.
                       </p>

                    </div>
                    <div class="col-md-5">
                        <img  class="img"  style="width: 300px; height: 300px;padding-top: 50px"  src="{{asset('website/themes/assets/images/ima.jpg')}}" alt="Generic placeholder image">
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="row featurette">
                    <div class="col-md-5">
                        <img  class="img"  style="width: 400px; height: 300px;padding-top: 50px" src="{{asset('website/themes/assets/images/thanx.jpg')}}" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-muted">Finally...</h2>
                        <p class="lead">We who are members of Tembo Tarangire will do all we can to make your stay as enjoyable as possible.
                            We strive for the highest ethical standards and ways of doing business.
                            But what is good can always become better. If you have any comments or good advice,
                            by all means send to the hotel.
                            Show accommodation</p>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- /.carousel -->
</div><!-- /.container -->
<!-- /END THE FEATURETTES -->
@stop



