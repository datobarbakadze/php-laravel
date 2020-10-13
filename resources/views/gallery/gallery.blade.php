@extends('layouts.layout')
@section('main')
    <div class="paddinger-innerpage">
        @if(request()->user()!==null && request()->user()->role == 1)
            <input type="hidden" name="page" id="page" value="gallery">
        @endif
    </div>

    <section class="portfolio-area portfolio-page-content bgDark section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-titleV1 ">
                        <span class="{{  request()->user()!==null && request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{   request()->user()!==null && request()->user()->role == 1 ? "editorId=1" : ''}}>

                            @if(!is_null($item = $data->getText(1)) && !empty(trim($item->content)))
                                {!! $item->content !!}
                            @else
                                <p>Our Recent Works</p>
                                <h3>Our Portfolio</h3>
                            @endif

                        </span>

                    </div>
                </div>
            </div>
            @includeWhen((request()->user()!==null &&  request()->user()->role==1),'gallery.admin_form')
            @if($gallery->count()!=0)
                <div class="shuffle-wrapper">
                    <div class="row shuffle-box sbox_V1">
                        @foreach($gallery as $image)
                        <figure class="single-shuffle col-4" data-groups='["design"]' id="item-{{ $image->id }}">
                            <div class="aspect">
                                <div class="aspect__inner ssf-content">
                                    {{--small--}}
                                    <img src="{{ asset("storage/s_".$image->image) }}" alt="" />
                                    <div class="ssf-hover">
                                        {{-- big --}}
                                        <a data-fancybox="group-4" class="fancyGallery" href="{{ asset("storage/".$image->image) }}">
                                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(request()->user()!=null && request()->user()->role==1)
                                <button class="btn btn-danger delete-button py-3 px-5"  data-action="{{ route("delGallery",["id"=>$image->id]) }}">წაშლა</button>
                            @endif
                        </figure>
                        @endforeach
                        <div class="col-1 my-sizer-element"></div>
                    </div>
                </div>
            @else
                სურათები ვერ მოიძებნა
            @endif
        </div>
    </section>
    <script src="assets/js/jquery-3.2.0.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <!-- Owl Carousel Plugin -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main Counterup Plugin-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/countdown.js"></script>
    <script src="assets/js/jquery.scrollUp.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/shuffle.min.js"></script>
    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/jquery.ripples.min.js"></script>
    <!-- Slick Nav  -->
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- Void Mega Menu -->
    <script src="assets/js/vmm.menu.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.js"></script>
    <script src="assets/js/masonry.pkgd.js"></script>
    <!-- Main Script -->
    <script src="assets/js/theme.js"></script>
@endsection
