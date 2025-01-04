@extends('layouts.frontend.app')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "
        data-bs-bg="{{ asset('frontend/assets/img/bg/14.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">{{ $available_flat->name }}</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span>
                                        Home</a></li>
                                <li>Available Flats</li>
                                <li>{{ $available_flat->name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    icon: "success"
                }).then(function() {});
            });
        </script>
    @endif

    @if (session('failed'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Failed ..!!",
                    text: "{{ session('failed') }}",
                    icon: "error"
                }).then(function() {});
            });
        </script>
    @endif

    <!-- PAGE DETAILS AREA START (service-details) -->
    <div class="ltn__page-details-area ltn__service-details-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__service-details-inner">
                        <div class="ltn__blog-img">
                            <img src="{{ asset(Storage::url($available_flat->image)) }}" alt="Image">
                        </div>
                        <h2>{{ $available_flat->name }}</h2>
                        {!! $available_flat->content !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area ltn__right-sidebar">
                        <div class="widget-2 ltn__menu-widget ltn__menu-widget-2 text-uppercase">
                            <ul>
                                @foreach ($available_flats as $available_flat1)
                                    <li>
                                        <a href="{{ route('available-flats-details', $available_flat1->id) }}">
                                            {{ $available_flat1->name }}
                                            <span><i class="fas fa-arrow-right"></i></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget ltn__form-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Enquiry Now</h4>
                            <form action="{{ route('available-flats-store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" name="name" placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input type="text" name="phone" placeholder="Enter phone number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" name="email" placeholder="Enter email address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-item input-item-textarea">
                                            <input class="px-1" type="text" name="subject"
                                                value="{{ $available_flat->name }} ({{ $available_flat->type }})"
                                                placeholder="{{ $available_flat->name }}({{ $available_flat->type }})"
                                                readonly>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label class="checkbox-item">I authorise Bhooja Available Flats team to
                                            call/sms/email me about its Available Flats and have accepted the term and
                                            conditions
                                            <input type="checkbox" name="authorise" value="Yes" required>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn theme-btn-1">Send Messege</button>
                                </div>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE DETAILS AREA END -->


    <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6"
        style="background-image: url('{{ asset('frontend/assets/img/bg/enquiry-bg.png') }}'); background-attachment: fixed; background-size: cover; background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-6 position-relative text-center">
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
    <!-- CALL TO ACTION END  -->
@endsection
