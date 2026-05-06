@extends('front.app')
@section('title', 'Event')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Event</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item"><a href="#!">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Event</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


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


    <!-- Event Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Events</p>
                <h1 class="display-6 mb-4">Be a Part of a Global Movement</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-1.jpg" alt="">
                        <a href="#!" class="h3 d-inline-block">Education Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.</p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10</p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York,
                                USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-2.jpg" alt="">
                        <a href="#!" class="h3 d-inline-block">Awareness Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.</p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10</p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York,
                                USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-3.jpg" alt="">
                        <a href="#!" class="h3 d-inline-block">Health Care Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.</p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10</p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York,
                                USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-1.jpg" alt="">
                        <a href="#!" class="h3 d-inline-block">Education Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.</p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10</p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York,
                                USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-2.jpg" alt="">
                        <a href="#!" class="h3 d-inline-block">Awareness Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.</p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10</p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York,
                                USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-3.jpg" alt="">
                        <a href="#!" class="h3 d-inline-block">Health Care Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.</p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10</p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York,
                                USA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event End -->


    <!-- Banner Start -->
    <div class="container-fluid banner py-5">
        <div class="container">
            <div class="banner-inner bg-light p-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="row justify-content-center">
                    <div class="col-lg-8 py-5 text-center">
                        <h1 class="display-6 wow fadeIn" data-wow-delay="0.3s">Our Door Are Always Open to More People
                            Who Want to Support Each Others!</h1>
                        <p class="fs-5 mb-4 wow fadeIn" data-wow-delay="0.5s">Through your donations and volunteer work,
                            we spread kindness and support to children, families, and communities struggling to find
                            stability.</p>
                        <div class="d-flex justify-content-center wow fadeIn" data-wow-delay="0.7s">
                            <a class="btn btn-primary py-3 px-4 me-3" href="#!">Donate Now</a>
                            <a class="btn btn-secondary py-3 px-4" href="#!">Join Us Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Newsletter Start -->
    <div class="container-fluid bg-primary py-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-4">Subscribe the Newsletter</h1>
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
