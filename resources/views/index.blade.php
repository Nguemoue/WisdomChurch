@extends('template')

@section('title')
    Acceuil
@endsection

@section('content')
    <section class="ftco-section-2">
        <div class="container-fluid">
            <div class="section-2-blocks-wrapper d-flex row no-gutters">
                <div class="img col-md-6 ftco-animate" style="background-image: url('images/about.jpg');">
                    <a href="https://vimeo.com/45830194" class="button popup-vimeo"><span class="ion-ios-play"></span></a>
                </div>
                <div class="text col-md-6 ftco-animate">
                    <div class="text-inner align-self-start">
                        <h3>Loving God, Loving Others and Serving the World</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the
                            Semantics, a large language ocean.</p>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ours services --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-6 text-center heading-section ftco-animate">
                    <span class="subheading">Our Services</span>
                    <h2 class="mb-4">Giving light to someone</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex justify-content-center mb-3"><span
                                    class="align-self-center flaticon-planet-earth"></span></div>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">I'm New Here</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex justify-content-center mb-3"><span
                                    class="align-self-center flaticon-maternity"></span></div>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Care Ministries</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex justify-content-center mb-3"><span
                                    class="align-self-center flaticon-pray"></span></div>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Prayer Request</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex justify-content-center mb-3"><span
                                    class="align-self-center flaticon-podcast"></span></div>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Podcasts</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- news letter --}}
    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <h2>Subcribe to our Newsletter</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in</p>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-6">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group">
                                        <span class="icon icon-paper-plane"></span>
                                        <input type="text" class="form-control" placeholder="Enter email address">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- sermons --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Sermons</span>
                    <h2 class="mb-4">Watch our sermons</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row">

                @foreach ($sermons as $sermon)
                    <x-sermon-element :link="route('sermons.show', ['sermon' => $sermon->id])" :title="$sermon->titre" :pastor="$sermon->author" :description="Str::words($sermon->description, 5)"
                        :poster="asset('storage/' . $sermon->poster_url)" />
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <p><a href="{{route('sermons.index')}}" class="btn btn-primary btn-outline-primary p-3">Watch all sermons</a></p>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonies --}}
    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Read, Get Inspired, and Share Your Story</span>
                    <h2 class="mb-4">Testimonies</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item text-center">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Dennis Green</p>
                                    <span class="position">Member</span>
                                </div>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Dennis Green</p>
                                    <span class="position">Volunteer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Dennis Green</p>
                                    <span class="position">Pastor</span>
                                </div>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Dennis Green</p>
                                    <span class="position">Guest</span>
                                </div>
                            </div>
                        </div>
                        <div class="item text-center">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Dennis Green</p>
                                    <span class="position">Pastor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- church achievements --}}
    <section class="ftco-section ftco-counter" id="section-counter">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2>Church Achievements</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="20254">0</strong>
                            <span>Churches around the world</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="4200000">0</strong>
                            <span>Members around the globe</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="8600000">0</strong>
                            <span>Save life &amp; Donations</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- events section --}}
    <section class="ftco-section-2 bg-light">
        <div class="container-fluid">
            <div class="row no-gutters d-flex">
                <div class="col-md-6 img d-flex justify-content-end align-items-center"
                    style="background-image: url(images/event.jpg);">
                    <div
                        class="col-md-7 heading-section text-sm-center text-md-right heading-section-white ftco-animate mr-md-5 mt-md-5">
                        <h2>Our latest events</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in</p>
                        <p><a href="#" class="btn btn-primary py-3 px-4">View Events</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="event-wrap">
                        <div class="event-entry d-flex ftco-animate">
                            <div class="meta mr-4">
                                <p>
                                    <span>07</span>
                                    <span>Aug 2018</span>
                                </p>
                            </div>
                            <div class="text">
                                <h3 class="mb-2"><a href="events.html">Saturday's Bible Reading</a></h3>
                                <p class="mb-4"><span>9:00am at 456 NC USA</span></p>
                                <a href="events.html" class="img"
                                    style="background-image: url(images/event-1.jpg);"></a>
                            </div>
                        </div>
                        <div class="event-entry d-flex ftco-animate">
                            <div class="meta mr-4">
                                <p>
                                    <span>07</span>
                                    <span>Aug 2018</span>
                                </p>
                            </div>
                            <div class="text">
                                <h3 class="mb-2"><a href="events.html">Wednesday Gospel Singing</a></h3>
                                <p class="mb-4"><span>9:00am at 456 NC USA</span></p>
                                <a href="events.html" class="img"
                                    style="background-image: url(images/event-2.jpg);"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- blog section --}}
    {{-- <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Blog</span>
                    <h2>Recent Blog</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: url('images/image_1.jpg');">
                        </a>
                        <div class="text p-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">July 12, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about
                                    the blind texts</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry" data-aos-delay="100">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: url('images/image_2.jpg');">
                        </a>
                        <div class="text p-4">
                            <div class="meta mb-3">
                                <div><a href="#">July 12, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about
                                    the blind texts</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry" data-aos-delay="200">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: url('images/image_3.jpg');">
                        </a>
                        <div class="text p-4">
                            <div class="meta mb-3">
                                <div><a href="#">July 12, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </div>
                            </div>
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about
                                    the blind texts</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
