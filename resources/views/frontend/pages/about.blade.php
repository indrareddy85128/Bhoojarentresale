@extends('layouts.frontend.app')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left .bg-overlay-black-40 bg-image "
        data-bs-bg="{{ asset('frontend/assets/img/bg/14.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">About Us</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span>
                                        Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                @foreach ($abouts as $about)
                    <div class="col-lg-6 align-self-center">
                        <div class="about-us-img-wrap about-img-left">
                            <img src="{{ asset(Storage::url($about->big_image)) }}" alt="About Us Image">
                            <div class="about-us-img-info about-us-img-info-2 about-us-img-info-3">

                                <div class="ltn__video-img ltn__animation-pulse1">
                                    <img src="{{ asset(Storage::url($about->small_image)) }}" alt="video popup bg image">
                                    <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="{{ $about->video_link }}"
                                        data-rel="lightcase:myCollection">
                                        <i class="fa fa-play"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="about-us-info-wrap">
                            <div class="section-title-area ltn__section-title-2--- mb-20">
                                <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">About My Home Bhooja
                                </h6>
                                <h1 class="section-title">{!! $about->heading !!}</h1>
                                <p>{{ $about->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6"
        style="background-image: url('{{ asset('frontend/assets/img/bg/enquiry-bg.png') }}'); background-attachment: fixed; background-size: cover; background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-6 position-relative text-center">
                        <!-- Background color overlay -->
                        <div class="coll-to-info text-color-white">
                            <h1>Experience a life above by <br> ascending to My Home Bhooja !</h1>
                        </div>
                        <div class="btn-wrapper">
                            <a class="btn btn-effect-3 btn-white" href="contact.html">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->
@endsection
