<header
    class="ltn__header-area ltn__header-5 ltn__header-logo-and-mobile-menu-in-mobile ltn__header-logo-and-mobile-menu ltn__header-transparent--- gradient-color-4---">
    <div class="ltn__header-top-area section-bg-6 top-area-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li><a href="tel:+91 93945 93945"><i class="icon-call"></i>+91 93945 93945</a></li>
                            <li><a href="mailto:krishna@bhoojarentresale.com "><i class="icon-mail"></i>
                                    krishna@bhoojarentresale.com </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>

                                            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('frontend/assets/img/bhooja-logo.png') }}"
                                    alt="Logo"></a>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}"
                                            href="{{ route('home') }}">Home</a></li>
                                    <li><a class="{{ request()->routeIs('available-flats') ? 'active' : '' }}"
                                            href="{{ route('available-flats') }}">Available Flats</a></li>
                                    <li><a class="{{ request()->routeIs('resale') ? 'active' : '' }}"
                                            href="{{ route('resale') }}">Resale</a></li>
                                    <li><a class="{{ request()->routeIs('rent') ? 'active' : '' }}"
                                            href="{{ route('rent') }}">Rent</a></li>
                                    <li><a class="{{ request()->routeIs('loans') ? 'active' : '' }}"
                                            href="{{ route('loans') }}">Loans</a></li>
                                    <li><a class="{{ request()->routeIs('insurance') ? 'active' : '' }}"
                                            href="{{ route('insurance') }}">Insurance</a></li>
                                    <li><a class="{{ request()->routeIs('used-cars') ? 'active' : '' }}"
                                            href="{{ route('used-cars') }}">Used Cars</a></li>
                                    <li><a class="{{ request()->routeIs('other-services') ? 'active' : '' }}"
                                            href="#">Other Services</a></li>
                                    <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}"
                                            href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col--- ltn__header-options ltn__header-options-2 ">
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="{{ route('home') }}"><img style="border-radius: 8px;"
                        src="{{ asset('frontend/assets/img/bhooja-logo.png') }}" alt="Logo"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li><a href="{{ route('home') }}">Home</a>
                </li>
                <li><a href="{{ route('available-flats') }}">available Flats</a>
                </li>
                <li><a href="{{ route('resale') }}">Resale</a>
                </li>
                <li>
                    <a href="{{ route('rent') }}">Rent</a>
                </li>
                <li><a href="{{ route('loans') }}">Loans</a>
                </li>
                <li><a href="{{ route('insurance') }}">Insurance</a>
                </li>
                <li><a href="{{ route('used-cars') }}">Used Cars</a>
                </li>
                <li><a href="#">Other Services</a>
                </li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
        <div class="ltn__social-media-2">
            <ul>
                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->

<div class="ltn__utilize-overlay"></div>
