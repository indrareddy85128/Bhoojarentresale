@extends('layouts.frontend.app')
@section('content')
    @foreach ($wishes as $wish)
        @if ($wish->image)
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <img src="{{ asset(Storage::url($wish->image)) }}" alt="Popup Image">
                </div>
            </div>
        @endif
    @endforeach

    <!-- SLIDER AREA START (slider-11) -->
    <div class="ltn__slider-area ltn__slider-3  section-bg-2">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
            <!-- ltn__slide-item -->
            @foreach ($sliders as $slider)
                <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60"
                    data-bs-bg="{{ asset(Storage::url($slider->image)) }}">
                    <div class="ltn__slide-item-inner text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <h6 class="slide-sub-title white-color--- animated"><span><i
                                                        class="fas fa-home"></i></span>My Home Bhooja</h6>
                                            <h1 class="slide-title animated ">{{ $slider->heading }}
                                            </h1>
                                            <div class="slide-brief animated">
                                                <p>{{ $slider->content }}</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="{{ route('contact') }}" class="theme-btn-1 btn btn-effect-1">Make
                                                    An
                                                    Enquiry</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- SLIDER AREA END -->

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

    <!-- FLATS START -->
    <div class="ltn__apartments-plan-area pt-60 pb-60" style="background-color: #f2f6f7;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">A Life Above</h6>
                        <h1 class="section-title">Our Premium Flats</h1>
                    </div>
                    <div class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase--- text-center">
                        <div class="nav">
                            <a class="active show" data-bs-toggle="tab" href="#flat_tab_1">2595 (W) S.Ft.</a>
                            <a data-bs-toggle="tab" href="#flat_tab_2"> 2680 (E) S.Ft.</a>
                            <a data-bs-toggle="tab" href="#flat_tab_3" class="">3430 (E) S.Ft.</a>
                            <a data-bs-toggle="tab" href="#flat_tab_4" class="">3430 (W) S.Ft.</a>
                            <a data-bs-toggle="tab" href="#flat_tab_5" class="">4070 (E) S.Ft.</a>
                            <a data-bs-toggle="tab" href="#flat_tab_6" class="">4070 (W) S.Ft.</a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="flat_tab_1">
                            <div class="ltn__apartments-tab-content-inner">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                            <h2>West-Facing 3BHK with 2595 S.Ft.</h2>
                                            <p>This beautifully designed 3BHK home offers tranquility and comfort,
                                                perfect for every family. With carefully arranged bedrooms, a
                                                dedicated Puja room, and modern amenities, it creates a perfect
                                                blend of functionality and positive energy.This home is designed to
                                                bring positivity.</p>
                                            <div class="apartments-info-list apartments-info-list-color mt-30">
                                                <ul>
                                                    <li><label>Total Area</label> <span>2595 (w) S.Ft.</span></li>
                                                    <li><label>Master Bedroom</label> <span>Southwest </span>
                                                    </li>
                                                    <li><label>Second Bedroom</label> <span>Northeast </span>
                                                    </li>
                                                    <li><label>Third Bedroom</label> <span>Northwest </span>
                                                    </li>
                                                    <li><label>Puja Room</label> <span>Northeast </span></li>
                                                    <li><label>Parking</label> <span>2 Car Spaces Available</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="apartments-plan-img">
                                            <img src="{{ asset('frontend/assets/img/flats/3bhk-2595sft.png') }}"
                                                alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="flat_tab_2">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                            <h2>East-Facing 3BHK with 2680 S.Ft.</h2>
                                            <p>This elegant 3BHK home is thoughtfully designed to provide comfort
                                                and positivity. With spacious bedrooms, a serene Puja room, and
                                                practical amenities, it’s the perfect place for a peaceful retreat
                                                and family living.This home is designed to bring positivity,
                                                comfort, and functionality to every corner.</p>
                                            <div class="apartments-info-list apartments-info-list-color mt-30">
                                                <ul>
                                                    <li><label>Total Area</label> <span>2680 (E) S.Ft.</span></li>
                                                    <li><label>Master Bedroom</label> <span>Southwest </span>
                                                    </li>
                                                    <li><label>Second Bedroom</label> <span>Northeast </span>
                                                    </li>
                                                    <li><label>Third Bedroom</label> <span>Northwest </span>
                                                    </li>
                                                    <li><label>Puja Room</label> <span>Northeast </span></li>
                                                    <li><label>Parking</label> <span>2 Car Spaces Available</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="apartments-plan-img">
                                            <img src="{{ asset('frontend/assets/img/flats/3bhk-2680sft.png') }}"
                                                alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="flat_tab_3">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                            <h2>East-Facing 3BHK with 3430 S.Ft.</h2>
                                            <p>This beautifully furnished 3BHK home offers a seamless blend of
                                                contemporary living and traditional charm. With spacious rooms,
                                                serene decor, and ample storage, it is designed to provide comfort
                                                and tranquility for every family member.</p>
                                            <div class="apartments-info-list apartments-info-list-color mt-30">
                                                <ul>
                                                    <li><label>Total Area</label> <span>3430 (E) S.Ft.</span></li>
                                                    <li><label>Master Bedroom</label> <span>Southwest</span>
                                                    </li>
                                                    <li><label>Second Bedroom</label> <span>Northeast</span>
                                                    </li>
                                                    <li><label>Third Bedroom</label> <span>Northwest</span>
                                                    </li>
                                                    <li><label>Puja Room</label> <span>Northeast</span></li>
                                                    <li><label>Balconies</label> <span>2 Wide Balconies
                                                            Available</span></li>
                                                    <li><label>Parking</label> <span>3 Car Spaces Available</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="apartments-plan-img">
                                            <img src="{{ asset('frontend/assets/img/flats/east-3bhk-3430sft.png') }}"
                                                alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="flat_tab_4">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                            <h2>West-Facing 3BHK with 3430 S.Ft.</h2>
                                            <p>This spacious 3BHK home combines contemporary style with traditional
                                                elements, offering the perfect balance of comfort, serenity, and
                                                functionality. With generously sized rooms, a peaceful Puja room,
                                                it’s designed to cater to every family
                                                need.</p>
                                            <div class="apartments-info-list apartments-info-list-color mt-40">
                                                <ul>
                                                    <li><label>Total Area</label> <span>3430 (W) S.Ft.</span></li>
                                                    <li><label>Master Bedroom</label> <span>Southwest </span>
                                                    </li>
                                                    <li><label>Second Bedroom</label> <span>Northeast </span>
                                                    </li>
                                                    <li><label>Third Bedroom</label> <span>Northwest </span>
                                                    </li>
                                                    <li><label>Puja Room</label> <span>Northeast </span></li>
                                                    <li><label>Balconies</label> <span>2 Wide Balconies
                                                            Available</span></li>
                                                    <li><label>Parking</label> <span>3 Car Parking Spaces
                                                            Available</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="apartments-plan-img">
                                            <img src="{{ asset('frontend/assets/img/flats/west-3bhk-3430sft.png') }}"
                                                alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="flat_tab_5">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                            <h2>East-Facing 4BHK with 4070 S.Ft.</h2>
                                            <p>This luxurious 4BHK apartment offers an expansive living space,
                                                perfect for families seeking both comfort and elegance.</p>
                                            <div class="apartments-info-list apartments-info-list-color mt-30">
                                                <ul>
                                                    <li><label>Total Area</label> <span>4070 (E) S.Ft.</span></li>
                                                    <li><label>Master Bedroom</label> <span>Southwest </span>
                                                    </li>
                                                    <li><label>Second Bedroom</label> <span>Northeast </span>
                                                    </li>
                                                    <li><label>Third Bedroom</label> <span>Northwest </span>
                                                    </li>
                                                    <li><label>Fourth Bedroom</label> <span>South East </span>
                                                    </li>
                                                    <li><label>Puja Room</label> <span>Northeast </span></li>
                                                    <li><label>Open Living & Dining Area</label> <span>Spacious and
                                                            Bright</span></li>
                                                    <li><label>Balconies</label> <span>2 with Garden View</span>
                                                    </li>
                                                    <li><label>Fully Furnished</label> <span>Elegant, Modern
                                                            Furniture</span></li>
                                                    <li><label>Parking</label> <span>3 Car Spaces Available</span>
                                                    </li>
                                                    <li><label>Servant Quarters</label> <span>Included</span></li>
                                                    <li><label>Garden View</label> <span>Tranquil and
                                                            Peaceful</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="apartments-plan-img">
                                            <img src="{{ asset('frontend/assets/img/flats/east-4bhk-4070sft.png') }}"
                                                alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="flat_tab_6">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="apartments-plan-info ltn__secondary-bg text-color-white">
                                            <h2>West-Facing 4BHK with 4070 S.Ft.</h2>
                                            <p>This luxurious 4BHK apartment combines comfort, space, and style,
                                                making it the perfect home for families.</p>
                                            <div class="apartments-info-list apartments-info-list-color mt-30">
                                                <ul>
                                                    <li><label>Total Area</label> <span>4070 (W) S.Ft.</span></li>
                                                    <li><label>Master Bedroom</label> <span>Southwest </span>
                                                    </li>
                                                    <li><label>Second Bedroom</label> <span>Northeast </span>
                                                    </li>
                                                    <li><label>Third Bedroom</label> <span>Northwest </span>
                                                    </li>
                                                    <li><label>Fourth Bedroom</label> <span>South East </span>
                                                    </li>
                                                    <li><label>Puja Room</label> <span>Dedicated Space with
                                                            Traditional Design</span></li>
                                                    <li><label>Living & Dining Areas</label> <span>Expansive,
                                                            Open-Plan Layout</span></li>
                                                    <li><label>Balconies</label> <span>2 with Garden View</span>
                                                    </li>
                                                    <li><label>Fully Furnished</label> <span>Stylish & Comfortable
                                                            Furniture</span></li>
                                                    <li><label>Parking</label> <span>3 Car Spaces Available</span>
                                                    </li>
                                                    <li><label>Servant Quarters</label> <span>Separate Space for
                                                            Domestic Help</span></li>
                                                    <li><label>Garden View</label> <span>Tranquil and
                                                            Peaceful</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="apartments-plan-img">
                                            <img src="{{ asset('frontend/assets/img/flats/west-4bhk-4070sft.png') }}"
                                                alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FLATS DESIGN END -->

    <!-- FAQS START -->
    <div class="neighbour-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">Popular Queries
                        </h6>
                        <h1 class="section-title-color">Frequently Asked Questions</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__faq-inner ltn__faq-inner-2 ltn__faq-inner-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="accordion" id="accordion_2">
                                    @foreach ($faqs->take(3) as $faq)
                                        <div class="card">
                                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                                data-bs-target="#faq-item-{{ $faq->id }}" aria-expanded="false"
                                                aria-controls="faq-item-{{ $faq->id }}">{{ $faq->question }}
                                            </h6>
                                            <div id="faq-item-{{ $faq->id }}" class="collapse"
                                                data-bs-parent="#accordion_2">
                                                <div class="card-body">
                                                    <p>{{ $faq->answer }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="accordion" id="accordion_3">
                                    @foreach ($faqs->skip(3) as $faq)
                                        <div class="card">
                                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                                data-bs-target="#faq-item-{{ $faq->id }}" aria-expanded="false"
                                                aria-controls="faq-item-{{ $faq->id }}">{{ $faq->question }}
                                            </h6>
                                            <div id="faq-item-{{ $faq->id }}" class="collapse"
                                                data-bs-parent="#accordion_3">
                                                <div class="card-body">
                                                    <p>{{ $faq->answer }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQS END -->

    <!-- IMAGE SLIDER AREA START -->
    <div class="ltn__img-slider-area">
        <div class="container-fluid">
            <div class="row ltn__image-slider-4-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                @foreach ($galleries as $gallery)
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-4">
                            <a href="{{ asset(Storage::url($gallery->image)) }}" data-rel="lightcase:myCollection">
                                <img src="{{ asset(Storage::url($gallery->image)) }}" alt="Image">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- IMAGE SLIDER AREA END -->

    <!-- CATEGORY AREA START -->
    <div class="ltn__category-area ltn__product-gutter section-bg-1--- pt-60 pb-60 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Amenities</h6>
                        <h1 class="section-title">Building Amenities</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__category-slider-active--- slick-arrow-1 justify-content-center">
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img
                                    src="{{ asset('frontend/assets/img/Amenities/Play_area.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">Play Area</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img src="{{ asset('frontend/assets/img/Amenities/Swim.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">Swimming Pool</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img src="{{ asset('frontend/assets/img/Amenities/Club.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">Clubhouse</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img
                                    src="{{ asset('frontend/assets/img/Amenities/Grocery_store.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">Grocery Store</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img src="{{ asset('frontend/assets/img/Amenities/gym.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">GYM</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img
                                    src="{{ asset('frontend/assets/img/Amenities/Indoor_games.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">Indoor Games</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img
                                    src="{{ asset('frontend/assets/img/Amenities/Jogging.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">Jogging</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img
                                    src="{{ asset('frontend/assets/img/Amenities/Intercom.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">Intercom</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img src="{{ asset('frontend/assets/img/Amenities/Lift.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">Lift</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img src="{{ asset('frontend/assets/img/Amenities/Park.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">Park</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img
                                    src="{{ asset('frontend/assets/img/Amenities/Security.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">Security</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="ltn__category-item ltn__category-item-5 text-center">
                        <a href="#">
                            <span class="category-icon"><img src="{{ asset('frontend/assets/img/Amenities/atm.png') }}"
                                    alt="Aminities"></span>
                            <span class="category-title">ATM</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CATEGORY AREA END -->

    <!-- TESTIMONIAL AREA START (testimonial-7) -->
    <div class="ltn__testimonial-area section-bg-1--- bg-image-top pt-60 pb-40"
        data-bs-bg="{{ asset('frontend/assets/img/bg/20.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Testimonial</h6>
                        <h1 class="section-title">Clients Feedback</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__testimonial-slider-5-active slick-arrow-1">
                @foreach ($reviews as $review)
                    <div class="col-lg-4">
                        <div class="ltn__testimonial-item ltn__testimonial-item-7">
                            <div class="ltn__testimoni-info">
                                <p><i class="flaticon-left-quote-1"></i>
                                    {{ $review->review }}</p>
                                <div class="ltn__testimoni-info-inner">
                                    <div class="ltn__testimoni-img">
                                        <img src="{{ asset(Storage::url($review->image)) }}" alt="#">
                                    </div>
                                    <div class="ltn__testimoni-name-designation">
                                        <h5>{{ $review->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL AREA END -->

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
