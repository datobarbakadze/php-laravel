@extends("layouts.layout")

@section("main")
    <div class="paddinger-innerpage">

    </div>
    <section class="error-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-text">
                        <img src="assets/img/icon/404-bg.png" alt="">
                        <h2>404</h2>
                        <h3>შეცდომა!</h3>
                        <p>ვწუხვართ! ეს გვერდი არ არსებობს.</p>
                        <a href="{{ route("main") }}" class="btn-style-1">დაბრუნდი მთავარ გვერდზე</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Scripts -->
    <!-- jQuery Plugin -->
    <script src="{{ asset("assets/js/jquery-3.2.0.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery-ui.js") }}"></script>
    <!-- Owl Carousel Plugin -->
    <script src="{{ asset("assets/js/owl.carousel.min.js") }}"></script>
    <!-- Main Counterup Plugin-->
    <script src="{{ asset("assets/js/jquery.counterup.min.js") }}"></script>
    <script src="{{ asset("assets/js/countdown.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.scrollUp.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.waypoints.min.js") }}"></script>
    <script src="{{ asset("assets/js/shuffle.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.fancybox.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.ripples.min.js") }}"></script>
    <!-- Slick Nav  -->
    <script src="{{ asset("assets/js/jquery.slicknav.min.js") }}"></script>
    <!-- Void Mega Menu -->
    <script src="{{ asset("assets/js/vmm.menu.js") }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/js/imagesloaded.pkgd.js") }}"></script>
    <script src="{{ asset("assets/js/masonry.pkgd.js") }}"></script>
    <!-- Main Script -->
    <script src="{{ asset("assets/js/theme.js") }}"></script>

@endsection
