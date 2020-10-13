@extends('layouts.layout')
@section('main')
    <div class="paddinger-innerpage">

    </div>
    <section class="blog-wrapper section-padding bw-3">
        <div class="container">
            <div class="row">
                @includeWhen((request()->user()!==null &&  request()->user()->role==1),'publication.admin_form')
                @if($publications->count()!=0)
                    @foreach($publications as $publication)

                            <div class="col col-sm-12 publication wow fadeInUp" data-wow-delay="{{ $loop->iteration*0.15 }}s" id="item-{{ $publication->id }}">
                                <a target="_blank" href="{{asset("storage/".$publication->pdf)}}">{{ $publication->title }}</a>
                                @if(request()->user()!=null && request()->user()->role==1)
                                    <button class="btn btn-danger delete-button py-3 px-5"  data-action="{{ route("delPublication",["id"=>$publication->id]) }}">წაშლა</button>
                                @endif
                            </div>

                    @endforeach
                    {{ $publications->links() }}
                @else
                    არცერთი პუბლიკაცია არ მოიძებნა
                @endif
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
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/js/imagesloaded.pkgd.js") }}"></script>
    <script src="{{ asset("assets/js/masonry.pkgd.js") }}"></script>
    <!-- Main Script -->
    <script src="{{ asset("assets/js/theme.js") }}"></script>

@endsection
