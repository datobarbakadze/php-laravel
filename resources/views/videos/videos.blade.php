@extends('layouts.layout')
@section('main')
    <div class="paddinger-innerpage">

    </div>
    <section class="blog-wrapper section-padding bw-3">
        <div class="container">
            <div class="row">
                @includeWhen((request()->user()!==null &&  request()->user()->role==1),'videos.admin_form')
                <div class="col-md-12">
                    @if($videos->count()!=0)
                        @foreach($videos as $video)
                            <div class="single-main-blogV1" id="item-{{ $video->id }}">
                                <h4 class="smb-title"><a href="{{ route("project",["project_id"=>$video->id]) }}">{{ mb_substr($video->title,0,60) }}</a></h4>

                                <div class="smb-img">
                                    <iframe width="730" height="379" src="{{ $video->url }}"
                                            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                                    </iframe>

                                </div>
                                @if(request()->user()!=null && request()->user()->role==1)
                                    <button class="btn btn-danger delete-button py-3 px-5"  data-action="{{ route("delVideo",["id"=>$video->id]) }}">წაშლა</button>
                                @endif
                                </div>
                        @endforeach
                        {{ $videos->links() }}
                    @else
                        არცერთი ვიდეო არ იძებნება
                    @endif

                </div>

            </div>
        </div>
    </section>
    <!-- /Blog Area -->

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
