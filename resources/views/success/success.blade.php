@extends('layouts.layout')
@section('main')
    <div class="paddinger-innerpage">

    </div>
    <section class="blog-wrapper section-padding bw-3">
        <div class="container">
            <div class="row">
                @includeWhen((request()->user()!==null &&  request()->user()->role==1),'success.admin_form')
                <div class="col-md-12">
                    @if($stories->count()!=0)
                        @foreach($stories as $story)
                            <div class="single-main-blogV1" id="item-{{ $story->id }}">
                                <h4 class="smb-title"><a href="{{ route("success",["story_id"=>$story->id]) }}">{{ mb_substr($story->title,0,60) }}</a></h4>

                                <div class="smb-img">
                                    @if($story->image)
                                        <img src="{{ asset("storage/s_".$story->image) }}" alt="">
                                    @else
                                        <img src="{{ asset("storage/uploads/no-image.png") }}" alt="">
                                    @endif
                                    @if(request()->user()!=null && request()->user()->role==1)
                                        <button class="btn btn-danger delete-button py-3 px-5"  data-action="{{ route("delSuccess",["id"=>$story->id]) }}">წაშლა</button>
                                        <a href="{{ route("editSuccess",["id"=>$story->id]) }}" class="btn btn-primary update-button py-3 px-5"> განახლება</a>
                                    @endif
                                </div>
                                <div class="smb-text">
                                    <p>{{ mb_substr(str_replace("&nbsp;", '', strip_tags($story->description)),0,300) }}</p>
                                </div>
                                <a href="{{ route("success",["story_id"=>$story->id]) }}" class="smb-rm"><span>Read More</span> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        @endforeach
                        {{ $stories->links() }}
                    @else
                        არცერთი წარმატებული ისტორია არ იძებნება
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
