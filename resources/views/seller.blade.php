@extends('layouts.dashboard')

@section('content')
    <div>
        <img src="{{ asset('images/SellAnything-img.png') }}" class="img-100" alt="">
    </div>
    <div class="container">
        <div class="pannel">
            <div class="row">
                <div class="col-sm-8">
                    <div class="mb-5">
                        <h3>You're unique! - lets monitize that...</h3>
                        <p>Dont just live to work and work to live. Stress and job dissatisfaction is globally at an all time high! Take your unique ideas, artistic skills, or funny witticisms and turn them into money in your pocket TODAY!
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-6 SellAnything-list">
                            <div class="media">
                                <span class="SellAnything-icon"> <img src="{{ asset('images/icons/edit-document.png') }}" alt="..."></span>
                                <div class="media-body">
                                    <h5 class="mt-0">Job Fufillment</h5>
                                    <p> Many artists find making a living doing what they love a difficult endeavour. Not anymore! Your skills are valuable, don't make a living doing what you hate! </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 SellAnything-list">
                            <div class="media">
                                <span class="SellAnything-icon"> <img src="{{ asset('images/icons/add-file.png') }}" alt="..."></span>
                                <div class="media-body">
                                    <h5 class="mt-0">Still Growing</h5>
                                    <p> For 2019, ecommerce has been predicted to grow by at least 15%! We're headed the right way, so join us! </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 SellAnything-list">
                            <div class="media">
                                <span class="SellAnything-icon"> <img src="{{ asset('images/icons/turn-off.png') }}" alt="..."></span>
                                <div class="media-body">
                                    <h5 class="mt-0">Getting Started</h5>
                                    <p> Going into ecommerce is easier than ever with our simple marketing platform! </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 SellAnything-list">
                            <div class="media">
                                <span class="SellAnything-icon"> <img src="{{ asset('images/icons/coin.png') }}" alt="..."></span>
                                <div class="media-body">
                                    <h5 class="mt-0">Market Winner</h5>
                                    <p> Apparel has been and remains a global market heavyweight, get your slice of the action! </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="button" class="btn btn-primary">Start Selling!</button>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="testimonials">
                        <div class="owl-carousel" id="owl-testimonials" style="display:block">
                            <div class="item">
                                <p> "I useta just take pictures of my cat because hes pretty much the best cat ever and Im a weirdo...<br>but now I'm a millionaire and my cat couldnt be happier!"</p>
                                <h5>Praveen Bituku</h5>
                                <span>Hyderabad</span>
                            </div>
                            <div class="item">
                                <p> "I can't stop making money!<br>I'm using it as kindling and toilet paper!<br>Join me in VICTORY!" </p>
                                <h5>Bituku Praveen </h5>
                                <span>Karimnagar</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer_scripts')
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $("#owl-testimonials").owlCarousel({
        nav: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        items: 1,
    });
});
</script>
<style>
main.py-4 {
    padding-top: 0px !important;
}
</style>
@endsection