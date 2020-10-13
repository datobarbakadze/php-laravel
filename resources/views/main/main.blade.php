


@extends('layouts.layout')
@section('main')
    @if(request()->user()!==null && request()->user()->role == 1)
        <input type="hidden" name="page" id="page" value="main">
    @endif
<!-- Hero Area -->

<section class="hero-area revSlideHero1 ">

        <div class="rev_slider_wrapper fullwidthbanner-container">

            <!-- the ID here will be used in the inline JavaScript below to initialize the slider -->
            <div id="rev_slider_1" class="rev_slider" data-version="5.4.5" style="display:none">

                <ul>
                    @foreach($slides as $slide)
                        <li data-transition="random-premium">
                            <img src="{{ asset("storage/".$slide->image) }}" alt="{{ $slide->text }}" class="rev-slidebg">
                            @if(request()->user()!==null &&  request()->user()->role==1)
                                <button class="btn btn-danger delete-slide py-4 px-3" action="{{ route("deleteSlide",["id"=>$slide->id]) }}"> სლაიდის წაშლა</button>
                            @endif

                            @if(!is_null($slide->text))
                                <div class="tp-caption tp-resizeme slide-text-layer"

                                 data-frames='[{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                                 data-x="center"
                                 data-y="center"
                                 data-hoffset="0"
                                 data-voffset="0"
                                 data-width="100%"
                                 data-height="['auto']"

                            ><h1>{{ $slide->text }}</h1></div>
                            @endif
                        </li>

                    @endforeach
                </ul>

            </div>
        </div>


</section>
@includeWhen((request()->user()!==null &&  request()->user()->role==1),'main.admin_slide_form')
<!-- /Hero Area -->

<!-- Our Portfolio -->
@includeWhen((request()->user()!==null &&  request()->user()->role==1),'main.admin_markservice_form',['objects'=>$allGallery,'section'=>'gallery','title'=>'გალერიის მონიშვნა'])
@if($markedGallery->count()!=0)
<section id="portfolio" class="portfolio-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-titleV1 wow fadeInUp" data-wow-delay=".25s">
                    <span class="{{  request()->user()!==null && request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{   request()->user()!==null && request()->user()->role == 1 ? "editorId=1" : ''}}>

                        @if(!is_null($item = $data->getText(1)) && !empty(trim($item->content)))
                            {!! $item->content !!}
                        @else
                            <h3 >ფოტო გალერეა</h3>
                        @endif

                    </span>

                </div>
            </div>
        </div>
        <div class="shuffle-wrapper">
            <div class="row shuffle-box sbox_V1">
                @foreach($markedGallery as $gallery)
                    <figure class="single-shuffle col-4" data-groups='["ngo"]'>
                        <div class="aspect">
                            <div class="aspect__inner ssf-content wow zoomIn" data-wow-delay="{{ $loop->iteration*0.15 }}s">
                                <img src="{{ asset('storage/s_'.$gallery->image) }}" alt=""/>
                                <div class="ssf-hover">
                                    <a data-fancybox="group-4" class="fancyGallery" href="{{ asset('storage/'.$gallery->image) }}">
                                        <i class="fa fa-search-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </figure>
                @endforeach
                <div class="col-1 my-sizer-element"></div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- /Our Portfolio -->
<!-- Service Area -->
@includeWhen((request()->user()!==null &&  request()->user()->role==1),'main.admin_markservice_form',['objects'=>$allServices,'section'=>'service','title'=>'სერვისების მონიშვნა'])
@if($markedServices->count()!=0)
<section class="service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-titleV1 wow fadeInUp" data-wow-delay=".25s">
                        <span class="{{  request()->user()!==null && request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{   request()->user()!==null && request()->user()->role == 1 ? "editorId=2" : ''}}>

                            @if(!is_null($item = $data->getText(2)) && !empty(trim($item->content)))
                                 {!! $item->content !!}
                            @else
                                <p >ჩვენი ექსკლუზიური სერვისები</p>
                                <h3>სერვისები</h3>
                            @endif
                        </span>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($markedServices as $markedService)
                    <div class="col-md-4">
                        <div class="single-service sspV1 wow fadeInUp" data-wow-delay="{{ $loop->iteration*0.15 }}s">
                            <div class="ss-icon">
                                <i class="flaticon-001-camera"></i>
                            </div>
                            <div class="ss-text">
                                <h4>{{ mb_substr(str_replace("&nbsp;", '', strip_tags($markedService->title)),0,20) }} </h4>
                                <p>{{ mb_substr(str_replace("&nbsp;", '', strip_tags($markedService->description)),0,160) }}</p>
                                <a href="{{ route("service",['service_id'=>$markedService->id]) }}">გაიგე მეტი</a>
                            </div>
                            <div class="ssfb-img">
                                <img class="outter-service-image" src="{{ asset('storage/'.$markedService->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</section>
@endif

<!-- /Service Area -->
<!-- Testimonial Area -->
@if($feedbacks->count()!=0)
<section class="testimonial-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-titleV1 wow fadeInUp" data-wow-delay=".25s">
                    <span class="{{  request()->user()!==null && request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{   request()->user()!==null && request()->user()->role == 1 ? "editorId=3" : ''}}>

                            @if(!is_null($item = $data->getText(3)) && !empty(trim($item->content)))
                            {!! $item->content !!}
                            @else
                                <h3>რას ამბობენ ჩვენზე</h3>
                            @endif
                     </span>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-wrapper">

                    <div id="sync1" class="testimonial-carouselV1 owl-carousel owl-theme wow fadeInUp" data-wow-delay=".75s">
                        @foreach($feedbacks as $feedback)
                            <div class="item">
                                <div class="chrisSingle-testimonial">
                                    <div class="tc-text">
                                        <p>{{ $feedback->text }}</p>
                                    </div>
                                    <div class="tc-name">
                                        <h4>{{ $feedback->name }}</h4>
                                        <p>{{ $feedback->position }}</p>
                                        @if(request()->user()!==null &&  request()->user()->role==1)
                                            <button class="btn btn-danger delete-feedback" action="{{ route("deleteFeedback",["id"=>$feedback->id]) }}">წაშალე feedback-ი</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="sync2" class="tc-avatar-carousel owl-carousel owl-theme wow fadeInUp" data-wow-delay=".95s">
                        @foreach($feedbacks as $feedback)
                            <div class="item">
                                <div id="chti-{{ $loop->iteration }}" class="tc-avatar">
                                    <img src="{{asset('storage/'.$feedback->image)}}" alt="image of {{ $feedback->name }}">
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endif
@includeWhen((request()->user()!==null &&  request()->user()->role==1),'main.admin_feedback_form')
<!-- /Testimonial Area -->
<!-- Blog Area -->
@includeWhen((request()->user()!==null &&  request()->user()->role==1),'main.admin_markservice_form',['objects'=>$allBlogs,'section'=>'blog','title'=>'სიახლეების მონიშვნა'])
@if($markedBlogs->count()!=0)
<section class="blog-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-titleV1 wow fadeInUp" data-wow-delay=".25s">
                    <span class="{{  request()->user()!==null && request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{   request()->user()!==null && request()->user()->role == 1 ? "editorId=4" : ''}}>

                            @if(!is_null($item = $data->getText(4)) && !empty(trim($item->content)))
                            {!! $item->content !!}
                        @else
                            <p>ჩვენი ბლოგი</p>
                            <h3>შეიტყვე სიახლეები</h3>
                        @endif
                     </span>

                </div>
            </div>
        </div>
        <div class="row">

                @foreach($markedBlogs as $markedBlog)
                    <div class="col-md-4">
                        <div class="single-blog sb-V1 wow fadeInUp" data-wow-delay="{{ $loop->iteration*0.15 }}s">
                            <div class="sb-img">
                                <a href="{{ route('blog',['blog_id'=>$markedBlog->id]) }}"><img src="{{ asset('storage/s_'.$markedBlog->image) }}" width="350" height="270" class="marked_blog_img" alt="{{ $markedBlog->title }}"></a>

                            </div>
                            <div class="sb-meta">
                                <ul>
                                    <li><span class="date">{{ $markedBlog->created_at }}</span></li>
                                </ul>
                            </div>
                            <div class="sb-text">
                                <h4><a href="{{ route('blog',['blog_id'=>$markedBlog->id]) }}">{{ mb_substr(str_replace("&nbsp;", '', strip_tags($markedBlog->title)),0,32) }}</a></h4>
                                <p>{{ mb_substr(str_replace("&nbsp;", '', strip_tags($markedBlog->title)),0,160) }}</p>
                                <a href="{{ route('blog',['blog_id'=>$markedBlog->id]) }}" class="read-more-btn-1 py-3"><h5>გაიგე მეტი <i class="fa fa-angle-double-right" aria-hidden="true"></i></h5></a>
                            </div>
                        </div>
                    </div>
                @endforeach

        </div>
    </div>
</section>
@endif
<!-- /Blog Area -->
@endsection



<!-- Scripts -->
<!-- jQuery Plugin -->
<script src="{{ asset('assets/js/jquery-3.2.0.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<!-- Owl Carousel Plugin -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- Main Counterup Plugin-->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/countdown.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/shuffle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
<!-- Slick Nav  -->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<!-- Void Mega Menu -->
<script src="{{ asset('assets/js/vmm.menu.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="{{ asset('assets/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<!-- Main Script -->
<script src="{{ asset('assets/js/theme.js') }}"></script>

