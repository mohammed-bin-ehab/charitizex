@extends('front.app')
@section('title', 'Contact Us')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Contact</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item"><a href="#!">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
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


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <p class="section-title bg-white text-start text-primary pe-3">Contact</p>
                    <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s">If You Have Any Query, Please Contact Us
                    </h1>
                    <iframe class="w-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="height: 425px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <h3>Need a functional contact form?</h3>
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form
                        with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're
                        done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 250px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-4" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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
