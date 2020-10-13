@extends('layouts.layout')
@section('main')
    <div class="paddinger-innerpage">

    </div>
    <!-- /Innerpage Title Area -->


    <!-- Blog Area -->
    <section class="blog-wrapper section-padding">
        <div class="container">
            <div class="row">
                @includeWhen((request()->user()!==null &&  request()->user()->role==1),'blog.admin_form')
                @if($blogs->count()!=0)
                    @foreach($blogs as $blog)
                        <div class="col-md-4" id="item-{{ $blog->id }}">
                            <div class="single-main-blogV2">

                                <div class="smb-img">
                                    @if($blog->image)
                                        <img src="{{ asset("storage/s_".$blog->image) }}" alt="">
                                    @else
                                        <img src="{{ asset("storage/uploads/no-image.png") }}" alt="">
                                    @endif
                                    @if(request()->user()!=null && request()->user()->role==1)
                                        <button class="btn btn-danger delete-button py-3 px-5"  data-action="{{ route("delBlog",["id"=>$blog->id]) }}">წაშლა</button>
                                        <a href="{{ route("editBlog",["id"=>$blog->id]) }}" class="btn btn-primary update-button py-3 px-5"> განახლება</a>
                                    @endif
                                </div>

                                <div class="smb-meta">

                                </div>

                                <a href="{{ route("blog",["blog_id"=>$blog->id]) }}"><h5 class="smb-title">{{ mb_substr($blog->title,0,27) }}</h5></a>
                                <a href="{{ route("blog",["blog_id"=>$blog->id]) }}" class="smb-rm"><span>გაიგე მეტი</span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>

                            </div>
                        </div>
                    @endforeach
                    {{ $blogs->links() }}
                @else
                    არცერთი ბლოგი არ იძებნება
                @endif
            </div>
        </div>
    </section>
    <!-- /Blog Area -->
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
