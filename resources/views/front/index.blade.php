@extends('front.app')
@section('title', 'Home Page')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel py-5">
            @foreach ($sliders as $slider)
                <div class="container py-5">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="carousel-text">
                                <h1 class="display-1 text-uppercase mb-3">{{ $slider->title_trans ?? '' }}</h1>
                                <p class="fs-5 mb-5">{{ $slider->content_trans }}</p>
                                <div class="d-flex mt-4">
                                    <a class="btn btn-primary py-3 px-4 me-3"
                                        href="{{ $slider->btn1_link ?? route('front.donations') }}">{{ $slider->btn1_text[app()->getLocale()] ?? $slider->btn1_text['en'] }}</a>
                                    <a class="btn btn-secondary py-3 px-4"
                                        href="{{ $slider->btn2_link ?? route('front.donations') }}">{{ $slider->btn2_text[app()->getLocale()] ?? $slider->btn2_text['en'] }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="carousel-img">
                                <img class="w-100" src="{{ asset($slider->image->path) }}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Carousel End -->


    <!-- Video Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-11">
                    <div class="h-100 py-5 d-flex align-items-center">
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                        <h3 class="ms-5 mb-0">Together, we can build a world where everyone has the chance to thrive.
                        </h3>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-1">
                    <div class="h-100 w-100 bg-secondary d-flex align-items-center justify-content-center">
                        <span class="text-white" style="transform: rotate(-90deg);">Scroll Down</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->


    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                    @isset($settings['about_image'])
                        <div class="about-img">
                            <img class="img-fluid w-100" src="{{ asset($settings['about_image']) }}" alt="Image">
                        </div>
                    @else
                        <div class="about-img">
                            <img class="img-fluid w-100" src="img/about.jpg" alt="Image">
                        </div>
                    @endisset
                </div>
                <div class="col-lg-6">
                    <p class="section-title bg-white text-start text-primary pe-3">About Us</p>
                    @isset($settings['about_title'])
                        <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                            {{ asset($settings['about_title']) }}</h1>
                    @else
                        <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">Join Hands, Change the
                            World</h1>
                    @endisset

                    @isset($settings['about_description'])
                        <p class="mb-4 wow fadeIn" data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                            {{ asset($settings['about_description']) }}</p>
                    @else
                        <p class="mb-4 wow fadeIn" data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">Every hand extended in
                            kindness brings us closer to
                            a world free from suffering. Be part of a global movement dedicated to building a future where
                            equality and compassion thrive.</p>
                    @endisset

                    <div class="row g-4 pt-2">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
                            <div class="h-100">
                                @isset($settings['mission_title'])
                                    <h3>{{ $settings['mission_title'] }}</h3>
                                @else
                                    <h3>Our Mission</h3>
                                @endisset

                                @isset($settings['mission_content'])
                                    <p>{{ $settings['mission_content'] }}</p>
                                @else
                                    <p>Our mission is to uplift underprivileged communities by providing resources,
                                        education, and tools for growth.</p>
                                @endisset

                                <p class="text-dark"><i class="fa fa-check text-primary me-2"></i>No one should go to
                                    bed hungry.</p>
                                <p class="text-dark"><i class="fa fa-check text-primary me-2"></i>We spread kindness and
                                    support.</p>
                                <p class="text-dark mb-0"><i class="fa fa-check text-primary me-2"></i>We can change
                                    someone’s life.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s"
                            style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                            <div class="h-100 bg-primary p-4 text-center">
                                <p class="fs-5 text-dark">Through your donations, we spread kindness and support to
                                    children and families.</p>
                                <a class="btn btn-secondary py-2 px-4" href="#!">Donate Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-12 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-title">
                        @isset($settings['service_title'])
                            <h1 class="display-6 mb-4">{{ $settings['service_title'] ?? 'What We Do for Those in Need.' }}
                            </h1>
                        @else
                            <h1 class="display-6 mb-4">What We Do for Those in Need.</h1>
                        @endisset
                        @isset($settings['service_description'])
                            <p class="fs-5 mb-0">
                                {{ $settings['service_description'] ?? 'We work to bring smiles, hope, and a brighter future to those in need.' }}
                            </p>
                        @else
                            <p class="fs-5 mb-0">We work to bring smiles, hope, and a brighter future to those in need.</p>
                        @endisset
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="row g-5">
                        @foreach ($services as $service)
                            <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="service-item h-100">
                                    <div class="btn-square bg-light mb-4">
                                        {{-- <i class="fa fa-droplet fa-2x text-secondary"></i> --}}
                                        <img class="mt-1 w-24 h-16 object-cover rounded-md border"
                                            src="{{ asset($service->icon) }}" alt="service image">
                                    </div>
                                    <h3> {{ $service->title_trans }} </h3>
                                    <p class="mb-2">{{ $service->content_trans }}</p>
                                    <a href="!#">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Features Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="rounded overflow-hidden">
                        <div class="row g-0">
                            @foreach ($statistics as $statistic)
                                <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                    <div
                                        class="text-center py-5 px-4 h-100 {{ $loop->iteration == 2 || $loop->iteration == 3 ? 'bg-secondary , text-white' : 'bg-primary , text-dark' }}">
                                        {{-- {{ $statistic->id == ? 'bg-primary' : 'bg-info' }} --}}
                                        {{-- <i class="fa fa-users fa-3x text-secondary mb-3"></i> --}}
                                        {{-- <img class="mt-1 w-24 h-16 object-cover rounded-md border"
                                            src="{{ asset($statistics->icon) }}" alt="service image"> --}}
                                        <img width="70px" class="mt-1 w-24 h-16 object-cover rounded-md border"
                                            src="{{ asset($statistic->icon) }}" alt="service image">
                                        <h1 class="display-5 mb-0" data-toggle="counter-up">{{ $statistic->number }}
                                        </h1>
                                        <span>{{ $statistic->title_trans }}</span>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center bg-secondary py-5 px-4 h-100">
                                    <i class="fa fa-award fa-3x text-primary mb-3"></i>
                                    <h1 class="display-5 text-white mb-0" data-toggle="counter-up">70</h1>
                                    <span class="text-white">Award Winning</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="text-center bg-secondary py-5 px-4 h-100">
                                    <i class="fa fa-list-check fa-3x text-primary mb-3"></i>
                                    <h1 class="display-5 text-white mb-0" data-toggle="counter-up">3000</h1>
                                    <span class="text-white">Total Projects</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="text-center bg-primary py-5 px-4 h-100">
                                    <i class="fa fa-comments fa-3x text-secondary mb-3"></i>
                                    <h1 class="display-5 mb-0" data-toggle="counter-up">7000</h1>
                                    <span class="text-dark">Client's Review</span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="section-title bg-white text-start text-primary pe-3">Why Us!</p>
                    @isset($settings['feature_title'])
                        <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s">
                            {{ $settings['feature_title'] ?? 'Few Reasons Why People Choosing Us!' }}
                        </h1>
                    @else
                        <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">Few Reasons Why People
                            Choosing Us!</h1>
                    @endisset

                    @isset($settings['feature_description'])
                        <p class="mb-4 wow fadeIn" data-wow-delay="0.3s">
                            {{ $settings['feature_description'] ??
                                'We believe in creating opportunities and empowering  communities through education, healthcare, and sustainable development. Your support helps us  bring smiles, hope, and a brighter future to those in need.' }}
                        </p>
                    @else
                        <p class="mb-4 wow fadeIn" data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">We believe in creating
                            opportunities and empowering
                            communities through education, healthcare, and sustainable development. Your support helps us
                            bring smiles, hope, and a brighter future to those in need.</p>
                    @endisset
                    {{-- @isset($settings['feature_content'])
                        {!! $settings['feature_content'] !!}
                    @else

                    @endisset --}}
                    <p class="text-dark wow fadeIn" data-wow-delay="0.4s"><i
                            class="fa fa-check text-primary me-2"></i>Justo magna erat amet</p>
                    <p class="text-dark wow fadeIn" data-wow-delay="0.5s"><i
                            class="fa fa-check text-primary me-2"></i>Aliqu diam amet diam et eos</p>
                    <p class="text-dark wow fadeIn" data-wow-delay="0.6s"><i
                            class="fa fa-check text-primary me-2"></i>Clita erat ipsum et lorem et sit</p>
                    <div class="d-flex mt-4 wow fadeIn" data-wow-delay="0.7s">
                        @isset($settings['feature_donate'])
                            <a class="btn btn-primary py-3 px-4 me-3"
                                href="{{ route('front.donations') }}">{{ $settings['feature_donate'] ?? 'Donate Now' }}</a>
                        @else
                            <a class="btn btn-primary py-3 px-4 me-3" href="{{ route('front.donations') }}">Donate Now</a>
                        @endisset

                        @isset($settings['feature_join'])
                            <a class="btn btn-secondary py-3 px-4"
                                href="{{ route('register') }}">{{ $settings['feature_join'] ?? 'Join Us Now' }}</a>
                        @else
                            <a class="btn btn-secondary py-3 px-4" href="{{ route('register') }}">Join Us Now</a>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Donation Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Donation</p>
                @isset($settings['donation_title'])
                    <h1 class="display-6 mb-4">{{ $settings['donation_title'] ?? 'Our Donation Causes Around the World' }}
                    </h1>
                @else
                    <h1 class="display-6 mb-4">Our Donation Causes Around the World</h1>
                @endisset
            </div>
            <div class="row g-4">
                @foreach ($campaigns as $campaign)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="donation-item d-flex h-100 p-4">
                            <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                                <h6 class="mb-0">Raised</h6>
                                <span class="mb-2">${{ $campaign->raised }}</span>
                                <div class="progress d-flex align-items-end w-100 h-100 mb-2">
                                    <div class="progress-bar w-100 bg-secondary" role="progressbar"
                                        aria-valuenow="{{ ($campaign->raised / $campaign->goal) * 100 }}"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span class="fs-4">
                                            @if ($campaign->raised != 0)
                                                {{ ($campaign->raised / $campaign->goal) * 100 }}%
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <h6 class="mb-0">Goal</h6>
                                <span>${{ $campaign->goal }}</span>
                            </div>
                            <div class="donation-detail">
                                <div class="position-relative mb-4">
                                    <img class="img-fluid w-100" src="{{ asset($campaign->image->path) }}"
                                        alt="">
                                    <a href="#!"
                                        class="btn btn-sm btn-secondary px-3 position-absolute top-0 end-0">{{ $campaign->category->title_trans }}</a>
                                </div>
                                <a href="#!" class="h3 d-inline-block">{{ $campaign->title_trans }}</a>
                                <p>{{ $campaign->content_trans }}
                                </p>
                                <a href="{{ route('front.donate', $campaign->id) }}"
                                    class="btn btn-primary w-100 py-3"><i class="fa fa-plus me-2"></i>Donate
                                    Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Donation End -->


    <!-- Banner Start -->
    <div class="container-fluid banner py-5">
        <div class="container">
            <div class="banner-inner bg-light p-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="row justify-content-center">
                    <div class="col-lg-8 py-5 text-center">
                        @isset($settings['banner_title'])
                            <h1 class="display-6 wow fadeIn" data-wow-delay="0.3s">
                                {{ $settings['banner_title'] ?? 'Our Door Are Always Open to More People Who Want to Support Each Others!' }}
                            </h1>
                        @else
                            <h1 class="display-6 wow fadeIn" data-wow-delay="0.3s"
                                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">Our Door Are Always
                                Open to More People
                                Who Want to Support Each Others!</h1>
                        @endisset
                        @isset($settings['banner_description'])
                            <p class="fs-5 mb-4 wow fadeIn" data-wow-delay="0.5s">
                                {{ $settings['banner_description'] ??
                                    'Through your donations and volunteer work, we spread kindness and support to children, families, and communities struggling to find stability.' }}
                            </p>
                        @else
                            <p class="fs-5 mb-4 wow fadeIn" data-wow-delay="0.5s"
                                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">Through your
                                donations and volunteer work,
                                we spread kindness and support to children, families, and communities struggling to find
                                stability.</p>
                        @endisset
                        <div class="d-flex justify-content-center wow fadeIn" data-wow-delay="0.7s">
                            @isset($settings['banner_donate'])
                                <a class="btn btn-primary py-3 px-4 me-3"
                                    href="{{ route('front.donations') }}">{{ $settings['banner_donate'] ?? 'Donate Now' }}</a>
                            @else
                                <a class="btn btn-primary py-3 px-4 me-3" href="{{ route('front.donations') }}">Donate
                                    Now</a>
                            @endisset
                            @isset($settings['banner_join'])
                                <a class="btn btn-secondary py-3 px-4"
                                    href="{{ route('register') }}">{{ $settings['banner_join'] ?? 'Join Us Now' }}</a>
                            @else
                                <a class="btn btn-secondary py-3 px-4" href="{{ route('register') }}">Join Us Now</a>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Event Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Events</p>
                @isset($settings['event_title'])
                    <h1 class="display-6 mb-4">{{ $settings['event_title'] ?? 'Be a Part of a Global Movement' }}</h1>
                @else
                    <h1 class="display-6 mb-4">Be a Part of a Global Movement</h1>
                @endisset
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-1.jpg" alt="">
                        <a href="#!" class="h3 d-inline-block">Education Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.
                        </p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10
                            </p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street,
                                New
                                York,
                                USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-2.jpg" alt="">
                        <a href="#!" class="h3 d-inline-block">Awareness Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.
                        </p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10
                            </p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street,
                                New
                                York,
                                USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-3.jpg" alt="">
                        <a href="#!" class="h3 d-inline-block">Health Care Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.
                        </p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10
                            </p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street,
                                New
                                York,
                                USA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event End -->


    <!-- Donate Start -->
    <div class="container-fluid donate py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-7 donate-text bg-light py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-center h-100 p-5 wow fadeIn" data-wow-delay="0.3s">
                        @isset($settings['donate_title'])
                            <h1 class="display-6 mb-4">
                                {{ $settings['donate_title'] ?? "Let's Donate to Needy People for Better Lives" }}</h1>
                        @else
                            <h1 class="display-6 mb-4">Let's Donate to Needy People for Better Lives</h1>
                        @endisset
                        @isset($settings['donate_description'])
                            <p class="fs-5 mb-0">
                                {{ $settings['donate_description'] ??
                                    'Through your donations, we spread kindness and support to children, families, and communities struggling to find stability.' }}
                            </p>
                        @else
                            <p class="fs-5 mb-0">Through your donations, we spread kindness and support to children,
                                families, and communities struggling to find stability.</p>
                        @endisset

                    </div>
                </div>
                <div class="col-lg-5 donate-form bg-primary py-5 text-center wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 p-5">
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                            autocomplete="off" checked>
                                        <label class="btn btn-light" for="btnradio1">$10</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="btnradio2">$20</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="btnradio3">$30</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="btnradio4">$40</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio5"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="btnradio5">$50</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary py-3 w-100" type="submit">Donate
                                        Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Our Team</p>
                @isset($settings['team_title'])
                    <h1 class="display-6 mb-4">{{ $settings['team_title'] ?? 'Meet Our Dedicated Team Members' }}</h1>
                @else
                    <h1 class="display-6 mb-4">Meet Our Dedicated Team Members</h1>
                @endisset
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-item d-flex h-100 p-4">
                        <div class="team-detail pe-4">
                            <img class="img-fluid mb-4" src="img/team-1.jpg" alt="">
                            <h3>Boris Johnson</h3>
                            <span>Founder & CEO</span>
                        </div>
                        <div class="team-social bg-light d-flex flex-column justify-content-center flex-shrink-0 p-4">
                            <a class="btn btn-square btn-primary my-2" href="#!"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary my-2" href="#!"><i
                                    class="fab fa-x-twitter"></i></a>
                            <a class="btn btn-square btn-primary my-2" href="#!"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-primary my-2" href="#!"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="team-item d-flex h-100 p-4">
                        <div class="team-detail pe-4">
                            <img class="img-fluid mb-4" src="img/team-2.jpg" alt="">
                            <h3>Donald Pakura</h3>
                            <span>Project Manager</span>
                        </div>
                        <div class="team-social bg-light d-flex flex-column justify-content-center flex-shrink-0 p-4">
                            <a class="btn btn-square btn-primary my-2" href="#!"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary my-2" href="#!"><i
                                    class="fab fa-x-twitter"></i></a>
                            <a class="btn btn-square btn-primary my-2" href="#!"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-primary my-2" href="#!"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="team-item d-flex h-100 p-4">
                        <div class="team-detail pe-4">
                            <img class="img-fluid mb-4" src="img/team-3.jpg" alt="">
                            <h3>Alexander Bell</h3>
                            <span>Volunteer</span>
                        </div>
                        <div class="team-social bg-light d-flex flex-column justify-content-center flex-shrink-0 p-4">
                            <a class="btn btn-square btn-primary my-2" href="#!"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary my-2" href="#!"><i
                                    class="fab fa-x-twitter"></i></a>
                            <a class="btn btn-square btn-primary my-2" href="#!"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-primary my-2" href="#!"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-12 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="testimonial-title">
                        @isset($settings['testimonial_title'])
                            <h1 class="display-6 mb-4">
                                {{ $settings['testimonial_title'] ?? 'What People Say About Our Activities.' }}</h1>
                        @else
                            <h1 class="display-6 mb-4">What People Say About Our Activities.</h1>
                        @endisset
                        @isset($settings['testimonial_description'])
                            <p class="fs-5 mb-0">
                                {{ $settings['testimonial_description'] ?? 'We work to bring smiles, hope, and a brighter future to those in need.' }}
                            </p>
                        @else
                            <p class="fs-5 mb-0">We work to bring smiles, hope, and a brighter future to those in need.</p>
                        @endisset
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.3s">
                        <div class="testimonial-item">
                            <div class="row g-5 align-items-center">
                                <div class="col-md-6">
                                    <div class="testimonial-img">
                                        <img class="img-fluid" src="img/testimonial-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial-text pb-5 pb-md-0">
                                        <div class="mb-2">
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                        </div>
                                        <p class="fs-5">Education is the foundation of change. By funding
                                            schools,
                                            scholarships, and training programs, we can help children and adults
                                            unlock
                                            their potential for a better future.</p>
                                        <div class="d-flex align-items-center">
                                            <div class="btn-lg-square bg-light text-secondary flex-shrink-0">
                                                <i class="fa fa-quote-right fa-2x"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h5 class="mb-0">Alexander Bell</h5>
                                                <span>CEO, Founder</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="row g-5 align-items-center">
                                <div class="col-md-6">
                                    <div class="testimonial-img">
                                        <img class="img-fluid" src="img/testimonial-2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial-text pb-5 pb-md-0">
                                        <div class="mb-2">
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                        </div>
                                        <p class="fs-5">Every hand extended in kindness brings us closer to a
                                            world
                                            free
                                            from suffering. Be part of a global movement dedicated to building a
                                            future
                                            where equality and compassion thrive.</p>
                                        <div class="d-flex align-items-center">
                                            <div class="btn-lg-square bg-light text-secondary flex-shrink-0">
                                                <i class="fa fa-quote-right fa-2x"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h5 class="mb-0">Donald Pakura</h5>
                                                <span>CEO, Founder</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item">
                            <div class="row g-5 align-items-center">
                                <div class="col-md-6">
                                    <div class="testimonial-img">
                                        <img class="img-fluid" src="img/testimonial-3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial-text pb-5 pb-md-0">
                                        <div class="mb-2">
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                        </div>
                                        <p class="fs-5">Love and compassion have the power to heal. Through your
                                            donations and volunteer work, we can spread kindness and support to
                                            children, families, and communities struggling to find stability.</p>
                                        <div class="d-flex align-items-center">
                                            <div class="btn-lg-square bg-light text-secondary flex-shrink-0">
                                                <i class="fa fa-quote-right fa-2x"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h5 class="mb-0">Boris Johnson</h5>
                                                <span>CEO, Founder</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Newsletter Start -->
    <div class="container-fluid bg-primary py-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center wow fadeIn" data-wow-delay="0.5s">
                    @isset($settings['subscribe_title'])
                        <h1 class="display-6 mb-4">{{ $settings['subscribe_title'] ?? 'Subscribe the Newsletter.' }}</h1>
                    @else
                        <h1 class="display-6 mb-4">Subscribe the Newsletter</h1>
                    @endisset
                    <div class="position-relative w-100 mb-2">
                        <input class="form-control border-0 w-100 ps-4 pe-5" type="text"
                            placeholder="Enter Your Email" style="height: 60px;">
                        <button type="button"
                            class="btn btn-lg-square shadow-none position-absolute top-0 end-0 mt-2 me-2"><i
                                class="fa fa-paper-plane text-primary fs-4"></i></button>
                    </div>
                    <p class="mb-0">Don't worry, we won't spam you with emails.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->
@endsection
