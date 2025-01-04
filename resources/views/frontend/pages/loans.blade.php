@extends('layouts.frontend.app')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left .bg-overlay-black-40 bg-image "
        data-bs-bg="{{ asset('frontend/assets/img/bg/15.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Loans</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i
                                                class="fas fa-home"></i></span>
                                        Home</a></li>
                                <li>Loans</li>
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



    <!-- APPOINTMENT AREA START -->
    <div class="ltn__appointment-area pt-60 pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 text-center ">
                    <div class="card maincard" x-data="{ carNumber: false, rcUpload: false, mortgageLoan: false, Personal: false }">
                        <h2 id="heading">Looking to Buy or Sell a Flat in MY HOME BHOOJA</h2>
                        <p>Fill all form field to go to next step</p>
                        <form id="msform" action="{{ route('loans-store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <ul id="progressbar">
                                <li style="width: 50%" class="active" id="account"><strong>Step-1</strong></li>
                                <li style="width: 50%" id="personal"><strong>Step-2</strong></li>
                                <fieldset>
                                    <div class="form-card">
                                        <h6>Loans</h6>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <label class="radio-button-container"
                                                    x-on:click="carNumber=false; rcUpload=false;mortgageLoan=false;Personal=false">New
                                                    Car
                                                    Loan
                                                    <input type="radio" id="role-1" value="New Car Loan"
                                                        name="loan">
                                                    <span class="checkradio"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <label class="radio-button-container"
                                                    x-on:click="carNumber=true; rcUpload=true;mortgageLoan=false;Personal=false">Used
                                                    Car
                                                    Loan
                                                    <input type="radio" id="role-1" value="Used Car Loan"
                                                        name="loan">
                                                    <span class="checkradio"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <label class="radio-button-container"
                                                    x-on:click="carNumber=false;rcUpload=false;mortgageLoan=false;Personal=false">Home
                                                    Laon
                                                    <input type="radio" id="role-1" value="Home Laon" name="loan">
                                                    <span class="checkradio"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <label class="radio-button-container"
                                                    x-on:click="carNumber=false;rcUpload=false;mortgageLoan=true;Personal=false">Mortgage
                                                    Loan
                                                    <input type="radio" id="role-1" value="Mortgage Loan"
                                                        name="loan">
                                                    <span class="checkradio"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <label class="radio-button-container"
                                                    x-on:click="carNumber=false;rcUpload=false;mortgageLoan=false;Personal=true">Personal
                                                    Loan
                                                    <input type="radio" id="role-1" value="Personal Loan"
                                                        name="loan">
                                                    <span class="checkradio"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <label class="radio-button-container"
                                                    x-on:click="carNumber=false;rcUpload=false;mortgageLoan=false;Personal=false">Other
                                                    Loan
                                                    <input type="radio" id="role-1" value="Other Loan" name="loan">
                                                    <span class="checkradio"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <p id="role-error-1" style="color: red; display: none;">Please select one Option
                                        </p>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 pt-2" x-show="rcUpload">
                                                <label class="checkbox-item">Used Car Purchase
                                                    <input type="checkbox" value="Used Car Purchase" name="loan_options[]">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-12 col-md-12" x-show="rcUpload">
                                                <label class="checkbox-item">Refinance
                                                    <input type="checkbox" value="Refinance" name="loan_options[]">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-12 col-md-12 pb-2" x-show="rcUpload">
                                                <label class="checkbox-item">Balance Transfer & Topup
                                                    <input type="checkbox" value="Balance Transfer & Topup"
                                                        name="loan_options[]">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div x-show="mortgageLoan" x-data="{ subCheckbox: false, residential: false }">
                                                <div class="col-lg-12 col-md-12">
                                                    <label class="radio-button-container"
                                                        x-on:click="subCheckbox=true; residential=false">Residential
                                                        <input type="radio" value="Residential" name="loan_options[]">
                                                        <span class="checkradio"></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <label class="radio-button-container"
                                                        x-on:click="subCheckbox=true; residential=true">Commercial
                                                        <input type="radio" value="Commercial" name="loan_options[]">
                                                        <span class="checkradio"></span>
                                                    </label>
                                                </div>
                                                <div x-show="subCheckbox" x-transition>
                                                    <div class="col-lg-12 col-md-12">
                                                        <label class="checkbox-item">Refinace
                                                            <input type="checkbox" value="Refinace" name="options[]">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <label class="checkbox-item">Balance Transfer $Topup
                                                            <input type="checkbox" value="Balance Transfer $Topup"
                                                                name="options[]">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12" x-show="residential" x-transition>
                                                        <label class="checkbox-item">Purchase
                                                            <input type="checkbox" value="Purchase" name="options[]">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" name="name" placeholder="Enter your name"
                                                        required>
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
                                                    <input type="email" name="email"
                                                        placeholder="Enter email address" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6" x-show="carNumber">
                                                <div class="input-item input-item-textarea ltn__custom-icon">
                                                    <input type="text" name="car_number"
                                                        placeholder="Enter car number (optional)">
                                                </div>
                                            </div>
                                            <div class="col-md-6" x-show="Personal">
                                                <div class="input-item input-item-textarea ltn__custom-icon">
                                                    <input type="text" name="salary_per_month"
                                                        placeholder="Enter Salary Per Month" x-bind:required="Personal">
                                                </div>
                                            </div>
                                            <div class="col-md-6" x-show="Personal">
                                                <div class="input-item input-item-textarea ltn__custom-icon">
                                                    <input type="text" name="loan_amount"
                                                        placeholder="Enter Loan Amount" x-bind:required="Personal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea name="message" placeholder="Enter message (optional)"></textarea>
                                        </div>
                                        <div x-show="rcUpload">
                                            <h6>Upload Your RC Copy (Optional)</h6>
                                            <input type="file" id="myFile" name="rc_copy"><br>
                                            <p>
                                                <small>* PDF files upload supported as well.</small>
                                            </p>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <label class="checkbox-item">I authorise Bhooja resale team to
                                                call/sms/email me about its resale and have accepted the term and
                                                conditions
                                                <input type="checkbox" name="authorise" value="Yes" required>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                    </div>
                                    <input type="submit" name="submit" class="action-button" value="Submit" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- APPOINTMENT AREA END -->
@endsection
