@extends('layouts.frontend.app')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left .bg-overlay-black-40 bg-image "
        data-bs-bg="{{ asset('frontend/assets/img/bg/14.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Resale</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i
                                                class="fas fa-home"></i></span>
                                        Home</a></li>
                                <li>Resale</li>
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
                    <div class="card maincard">
                        <h2 id="heading">Looking to Buy or Sell a Flat in MY HOME BHOOJA</h2>
                        <p>Fill all form field to go to next step</p>
                        <form id="msform" action="{{ route('lead.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="lead_source" value="Resale">
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Step-1</strong></li>
                                <li id="personal"><strong>Step-2</strong></li>
                                <li id="payment"><strong>Step-3</strong></li>
                                <li id="confirm"><strong>Step-4</strong></li>
                            </ul>
                            <fieldset>

                                <div class="form-card">
                                    <h6>Resale Options</h6>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <label class="radio-button-container">Seller
                                                <input type="radio" id="role-1" value="seller" name="resale_options"
                                                    onclick="toggleInputs()">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <label class="radio-button-container">Buyer
                                                <input type="radio" id="role-1" value="buyer" name="resale_options"
                                                    onclick="toggleInputs()">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>
                                        <p id="role-error-1" style="color: red; display: none;">Please select one Option</p>
                                    </div>

                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h6>Select Flat Size , Facing , and BHK</h6>
                                    <div class="row">
                                        <!-- Seller Inputs (Radio Buttons) -->
                                        <div class="col-lg-12 col-md-12 seller-inputs">
                                            <label class="radio-button-container">2595 Sft West Facing (3 BHK)
                                                <input type="radio" id="role-2" value="2595 Sft West Facing"
                                                    name="flat_details[]">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 seller-inputs">
                                            <label class="radio-button-container">2680 Sft East Facing (3 BHK)
                                                <input type="radio" id="role-2" value="2680 Sft East Facing"
                                                    name="flat_details[]">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 seller-inputs">
                                            <label class="radio-button-container">3430 Sft East Facing (3 BHK)
                                                <input type="radio" id="role-2" value="3430 Sft East Facing"
                                                    name="flat_details[]">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 seller-inputs">
                                            <label class="radio-button-container">3430 Sft West Facing (3 BHK)
                                                <input type="radio" id="role-2" value="3430 Sft West Facing"
                                                    name="flat_details[]">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 seller-inputs">
                                            <label class="radio-button-container">4070 Sft East Facing (4 BHK)
                                                <input type="radio" id="role-2" value="4070 Sft East Facing"
                                                    name="flat_details[]">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 seller-inputs">
                                            <label class="radio-button-container">4070 Sft West Facing (4 BHK)
                                                <input type="radio" id="role-2" value="4070 Sft West Facing"
                                                    name="flat_details[]">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>

                                        <!-- Buyer Inputs (Checkboxes) -->
                                        <div class="col-lg-12 col-md-12 buyer-inputs">
                                            <label class="checkbox-item">2595 Sft West Facing (3 BHK)
                                                <input type="checkbox" id="role-2" value="2595 Sft West Facing"
                                                    name="flat_details[]">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 buyer-inputs">
                                            <label class="checkbox-item">2680 Sft East Facing (3 BHK)
                                                <input type="checkbox" id="role-2" value="2680 Sft East Facing"
                                                    name="flat_details[]">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 buyer-inputs">
                                            <label class="checkbox-item">3430 Sft East Facing (3 BHK)
                                                <input type="checkbox" id="role-2" value="3430 Sft East Facing"
                                                    name="flat_details[]">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 buyer-inputs">
                                            <label class="checkbox-item">3430 Sft West Facing (3 BHK)
                                                <input type="checkbox" id="role-2" value="3430 Sft West Facing"
                                                    name="flat_details[]">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 buyer-inputs">
                                            <label class="checkbox-item">4070 Sft East Facing (4 BHK)
                                                <input type="checkbox" id="role-2" value="4070 Sft East Facing"
                                                    name="flat_details[]">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 buyer-inputs">
                                            <label class="checkbox-item">4070 Sft West Facing (4 BHK)
                                                <input type="checkbox" id="role-2" value="4070 Sft West Facing"
                                                    name="flat_details[]">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <p id="role-error-2" style="color: red; display: none;">Please select one
                                            Option</p>
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h6>Flat with</h6>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 seller-inputs">
                                            <label class="radio-button-container">Fully Furnished
                                                <input type="radio" id="role-3" value="Fully Furnished"
                                                    name="furnished_type[]">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 seller-inputs">
                                            <label class="radio-button-container">Semi Furnished
                                                <input type="radio" id="role-3" value="Semi Furnished"
                                                    name="furnished_type[]">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 seller-inputs">
                                            <label class="radio-button-container">Bare Shell
                                                <input type="radio" id="role-3" value="Bare Shell"
                                                    name="furnished_type[]">
                                                <span class="checkradio"></span>
                                            </label>
                                        </div>


                                        <div class="col-lg-12 col-md-12 buyer-inputs">
                                            <label class="checkbox-item">Fully Furnished
                                                <input type="checkbox" id="role-3" value="Fully Furnished"
                                                    name="furnished_type[]">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 buyer-inputs">
                                            <label class="checkbox-item">Semi Furnished
                                                <input type="checkbox" id="role-3" value="Semi Furnished"
                                                    name="furnished_type[]">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="col-lg-12 col-md-12 buyer-inputs">
                                            <label class="checkbox-item">Bare Shell
                                                <input type="checkbox" id="role-3" value="Bare Shell"
                                                    name="furnished_type[]">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <p id="role-error-3" style="color: red; display: none;">Please select one
                                            Option</p>
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="next" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
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
                                        <div class="col-md-12">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" name="email" placeholder="Enter email address"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea name="message" placeholder="Enter message (optional)"></textarea>
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
