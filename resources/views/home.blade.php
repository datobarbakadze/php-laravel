


@extends('layouts.layout')

@section('main')
<section class="hero-area hero_V14 fph14 fph15">
    <div id="ri-grid2" class="ri-grid ri-grid-size-2 heroP-grid">

    </div>
    <div class="hero-box">
        <div class="hero-m-list">
            <ul class="wow zoomIn" data-wow-delay="0.5s">
                <li>
                    <a href="/home">
                        <img src="assets/img/logo-1.png" alt="Logo" class="hero-logo">
                        <img src="assets/img/portfolio/hero14/hs-img/1.jpg" alt="" class="hml-bg">
                    </a>
                </li>
                <li>
                    <a href="{{ route("member") }}">
                        <i class="fa fa-user"></i>
                        <span><h6 style="color:white">გახდი <br> წევრი</h6></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("about") }}">
                        <i class="fa fa-users"></i>
                        <span><h6>ჩვენს შესახებ</h6></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("gallery") }}">
                        <i class="flaticon-047-polaroid-1"></i>
                        <span><h6 style="color:white">ფოტო გალერია</h6></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("projects",["status"=>"all"]) }}">
                        <i class="fa fa-book"></i>
                        <span><h6> ჩვენი პროექტები</h6></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

@endsection


<script src="https://code.jquery.com/jquery-3.2.0.min.js" integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-1.4.1.min.js') }}"></script>

<!-- Owl Carousel Plugin -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- Main Counterup Plugin-->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/countdown.js') }}"></script>
<script src="{{ asset('assets/js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/shuffle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ripples.min.js') }}"></script>
<!-- Slick Nav  -->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<!-- Void Mega Menu -->
<script src="{{ asset('assets/js/vmm.menu.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.pkgd.js') }}"></script>
<script src="{{ asset('assets/js/masonry.pkgd.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="{{ asset('assets/js/jquery.gridrotator.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<!-- Main Script -->
<script src="{{ asset('assets/js/theme.js') }}"></script>

<!-- Scripts -->
<!-- jQuery Plugin -->






