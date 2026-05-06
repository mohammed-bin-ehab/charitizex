@extends('front.app')
@section('title', 'Donation')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Donation</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Donation</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Donate Start -->
    <div class="container-fluid donate py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-7 donate-text bg-light py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-center h-100 p-5 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="display-6 mb-4">{{ $campaign->title_trans }}</h1>
                        <p class="fs-5 mb-4">{{ $campaign->content_trans }}</p>
                        <div>
                            <img class="w-25" src="{{ asset($campaign->image->path) }}" alt="">
                            @foreach ($campaign->gallery as $item)
                                <img class="w-25" src="{{ asset($item->path) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 donate-form bg-primary py-5 text-center wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 p-5">
                        <form action="{{ route('front.donate_process') }}" method="POST">
                            @csrf
                            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name" value="{{ Auth::user()->name ?? '' }}">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Your Email" value="{{ Auth::user()->email ?? '' }}">
                                        <label for="email">"Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="fixed_amount" id="fixed_amount1"
                                            value="10" autocomplete="off" checked>
                                        <label class="btn btn-light" for="fixed_amount1">$10</label>

                                        <input type="radio" class="btn-check" name="fixed_amount" id="fixed_amount2"
                                            value="20" autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount2">$20</label>

                                        <input type="radio" class="btn-check" name="fixed_amount" id="fixed_amount3"
                                            value="30" autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount3">$30</label>

                                        <input type="radio" class="btn-check" name="fixed_amount" id="fixed_amount4"
                                            value="40" autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount4">$40</label>

                                        <input type="radio" class="btn-check" name="fixed_amount" id="fixed_amount5"
                                            value="50" autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount5">$50</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="custom_amount" class="form-control" id="name"
                                            placeholder="Custom Amount">
                                        <label for="name">Custom Amount</label>
                                    </div>
                                </div>
                                <label><input type="checkbox" name="anonymous" value="1">Anonymous
                                    Donation</label>
                                <div class="col-12">
                                    <h5>Payment Gateway</h5>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="payment_gateway"
                                            id="payment_gateway1" value="stripe" autocomplete="off" checked>
                                        <label class="btn btn-light" for="payment_gateway1">Stripe</label>

                                        <input type="radio" class="btn-check" name="payment_gateway"
                                            id="payment_gateway2" value="paypal" autocomplete="off">
                                        <label class="btn btn-light" for="payment_gateway2"> PayPal</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary py-3 w-100" type="submit">Donate Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate End -->


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

@section('js')
    <Script>
        const custom_amount = document.querySelector('#custom_amount')
        const fixed_amount = document.querySelectorAll('[name=fixed_amount]')
        custom_amount.onkeyup = () => {
            if (custom_amount.value.length >= 0) {
                fixed_amount.forEach(el => {
                    el.checked = false

                    if (el.value == custom_amount.value) {
                        el.checked = true
                    }

                });
            }
        }

        fixed_amount.forEach(el => {
            el.onclick = () => {
                custom_amount.value = ''
            }
        })
    </Script>
@endsection
