@extends('layouts.frontend.app')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left .bg-overlay-black-40 bg-image "
        data-bs-bg="{{ asset('frontend/assets/img/bg/14.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">
                            available flats</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i
                                                class="fas fa-home"></i></span>
                                        Home</a></li>
                                <li>
                                    available flats</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <div class="ltn__product-area ltn__product-gutter pt-60 pb-60">
        <div class="container">
            <div class="row ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                @foreach ($available_flats as $available_flat)
                    <div class="col-xl-4 col-sm-12">
                        <div class="ltn__product-item ltn__product-item-5 text-center---">
                            <div class="product-img">
                                <a href="{{ route('available-flats-details', $available_flat->id) }}">
                                    <img src="{{ asset(Storage::url($available_flat->image)) }}" alt="#">
                                </a>
                                <div class="real-estate-agent">
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badg">For {{ $available_flat->type }}</li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a
                                        href="{{ route('available-flats-details', $available_flat->id) }}">{{ $available_flat->name }}</a>
                                </h2>
                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                    <li><span>{{ $available_flat->bedroom }}</span>
                                        Bed
                                    </li>
                                    <li><span>{{ $available_flat->bathroom }}</span>
                                        Bath
                                    </li>
                                    <li><span>{{ $available_flat->sft }}</span>
                                        S.Ft.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

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
                            <a class="btn btn-effect-3 btn-white" href="{{ route('contact') }}">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->
@endsection
