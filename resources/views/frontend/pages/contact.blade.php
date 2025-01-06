@extends('layouts.frontend.app')
@section('content')
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left .bg-overlay-black-40 bg-image "
        data-bs-bg="{{ asset('frontend/assets/img/bg/18.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Contact Us</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i
                                                class="fas fa-home"></i></span>
                                        Home</a></li>
                                <li>Contact Us</li>
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


    <!-- CONTACT ADDRESS AREA START -->
    <div class="ltn__contact-address-area pt-60 pb-60 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('frontend/assets/img/icons/11.png') }}" alt="Icon Image">
                        </div>
                        <h3>Phone Number</h3>
                        <p>+91 9394593945</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('frontend/assets/img/icons/10.png') }}" alt="Icon Image">
                        </div>
                        <h3>Email Address</h3>
                        <p>krishna@bhoojarentresale.com</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('frontend/assets/img/icons/12.png') }}" alt="Icon Image">
                        </div>
                        <h3>Office Address</h3>
                        <p>Fair Credit Services P Ltd,<br>
                            202 Saraswathi plaza,<br>
                            Above: Kotak Mahindra Bank,<br>
                            Srinagar colony,<br>
                            Hyderabad - 500 073</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT ADDRESS AREA END -->

    <!-- CONTACT MESSAGE AREA START -->
    <div class="ltn__contact-message-area pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">Get A Quote</h4>
                        <form id="contact-form" action="{{ route('lead.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="lead_source" value="Contact Us">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" placeholder="Enter your name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="text" name="phone" placeholder="Enter phone number" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" placeholder="Enter email address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="message" placeholder="Enter message (optional)"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-3">
                                <label class="checkbox-item">I authorise Bhooja Enquiry team to
                                    call/sms/email me about its Enquiry and have accepted the term and
                                    conditions
                                    <input type="checkbox" name="authorise" value="Yes" required>
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="btn-wrapper mt-0">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Send
                                    Message </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->

    <!-- GOOGLE MAP AREA START -->
    <div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.5427303746287!2d78.37456687390707!3d17.43371880147131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93fa945a1dc1%3A0x95ff0f6f9db624dd!2sMY%20HOME%20BHOOJA%20GATE%20-%205!5e0!3m2!1sen!2sin!4v1734940876123!5m2!1sen!2sin"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- GOOGLE MAP AREA END -->
@endsection
