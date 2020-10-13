@extends('layouts.layout')

@section('main')
    <div class="paddinger-innerpage">

    </div>

    <section class="blog-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-main-blogV1 smbv1-details">

                        <h4 class="smb-title">{{ $blog->title }}</h4>
                        @if($blog->image)
                            <div class="smb-img">
                                <img src="{{ asset("storage/".$blog->image) }}" alt="">
                            </div>
                        @endif
                        <div class="smb-text" >
                            <p>
                                {!! $blog->description !!}
                            </p>
                        </div>

                        <div class="smb-share-tag">
                            <div class="share-btn">
                                <h4>Share Now:</h4>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-mobile="true" data-colorscheme="dark" data-numposts="5" data-width=""></div>

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
    <script src="{{ asset("assets/js/jquery.fancybox.min.j") }}s"></script>
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
