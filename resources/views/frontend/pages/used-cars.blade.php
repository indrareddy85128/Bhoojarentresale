@extends('layouts.frontend.app')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left .bg-overlay-black-40 bg-image "
        data-bs-bg="{{ asset('frontend/assets/img/bg/17.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Used Cars</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i
                                                class="fas fa-home"></i></span>
                                        Home</a></li>
                                <li>Used Cars</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->


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

    <!-- APPOINTMENT AREA START -->
    <div class="ltn__appointment-area pt-60 pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 text-center ">
                    <div class="card maincard" x-data="{ carInsurance: true }">
                        <h2 id="heading" class="pb-2">Looking For Sell your Used Car</h2>
                        <form id="msform" action="{{ route('lead.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="lead_source" value="Used Cars">
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-md-6" x-show="carInsurance">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input type="text" name="car_make_model"
                                                    placeholder="Enter Car Make/Model" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6" x-show="carInsurance">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input type="text" name="manufacturing_year"
                                                    placeholder="Enter Manufacturing Year" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6" x-show="carInsurance">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input type="text" name="kilometers" placeholder="Enter Kilometers"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6" x-show="carInsurance">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input type="text" name="car_number" placeholder="Enter car number"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="name" placeholder="Enter your name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="phone" placeholder="Enter phone number"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" name="email" placeholder="Enter email address"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea name="message" placeholder="Enter message (optional)"></textarea>
                                    </div>
                                    <div x-show="carInsurance">
                                        <h6>Upload Your RC Copy (Optional)</h6>
                                        <input type="file" id="myFile" name="document"><br>
                                        <p>
                                            <small>* PDF files upload supported as well.</small>
                                        </p>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <label class="checkbox-item">I authorise BhoojaRentResale team to call/sms/email me and have accepted the terms and conditions
                                            <input type="checkbox" name="authorise" value="Yes" required>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                </div>
                                <input type="submit" name="submit" class="action-button" value="Submit" />
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- APPOINTMENT AREA END -->
@endsection
