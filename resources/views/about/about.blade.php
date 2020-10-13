@extends('layouts.layout')
@section('main')

    <div class="paddinger-innerpage">
        @if(request()->user()!==null && request()->user()->role == 1)
            <input type="hidden" name="page" id="page" value="about">
        @endif
    </div>
    <section class="about-page-area bgDark section-padding-top ap3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-ap3-ttexx">
                        <span class="{{  request()->user()!==null && request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{   request()->user()!==null && request()->user()->role == 1 ? "editorId=1" : ''}}>

                            @if(!is_null($item = $data->getText(1)) && !empty(trim($item->content)))
                                {!! $item->content !!}
                            @else
                                <h4>ჩაწერე ტექსტი აქ</h4>
                            @endif

                        </span>

                        <div  class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=2" : ''}}>
                            @if(!is_null($item = $data->getText(2)) && !empty(trim($item->content)))
                                {!! $item->content !!}
                            @else
                                <p>ჩაწერე ტექსტი აქ</p>
                            @endif
{{--
                            <p>Photography is like a moment instant. You need a half-second to get the photo. So it's good to capture people when they are themselves. ed to do was shoot really high quality filmnto time-lapse photography - so that.</p>
--}}
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="single-ap3-ttexx">
                        <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=3" : ''}}>
                            @if(!is_null($item = $data->getText(3)) && !empty(trim($item->content)))
                                {!! $item->content !!}
                            @else
                                <h4>ჩაწერე ტექსტი აქ</h4>
                            @endif
                        </span>

                        <div class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=4" : ''}}>
                            @if(!is_null($item = $data->getText(4)) && !empty(trim($item->content)))
                                {!! $item->content !!}
                            @else
                                <p>ჩაწერე ტექსტი აქ</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-ap3-ttexx">
                        <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=5" : ''}}>
                            @if(!is_null($item = $data->getText(5)) && !empty(trim($item->content)))
                                {!! $item->content !!}
                            @else
                                <h4>ჩაწერე ტექსტი აქ</h4>
                            @endif
                        </span>
                        <div class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=6" : ''}}>
                            @if(!is_null($item = $data->getText(6)) && !empty(trim($item->content)))
                                {!! $item->content !!}
                            @else
                                <p>ჩაწერე ტექსტი აქ</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section-padding">

                <div class="col-md-12">
                    <div class="about-text about-p1-top">
                        <div class="section-text">
                            <div class="section-titleV2">
                                <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                                    {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=7" : ''}}>
                                    @if(!is_null($item = $data->getText(7)) && !empty(trim($item->content)))
                                        {!! $item->content !!}
                                    @else
                                        <h2>ჩაწერე ტექსტი აქ</h2>
                                    @endif
                                </span>
                            </div>
                            <div class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                                {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=8" : ''}}>
                                @if(!is_null($item = $data->getText(8)) && !empty(trim($item->content)))
                                    {!! $item->content !!}
                                @else
                                    <p>ჩაწერე ტექსტი აქ</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row section-padding" id="mission">

                <div class="col-md-12">
                    <div class="about-text about-p1-top">
                        <div class="section-text whiten_section">
                            <div class="section-titleV2">
                                <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                                    {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=9" : ''}}>
                                    @if(!is_null($item = $data->getText(9)) && !empty(trim($item->content)))
                                        {!! $item->content !!}
                                    @else
                                        <h2>ჩაწერე ტექსტი აქ</h2>
                                    @endif
                                </span>
                            </div>
                            <div class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                                {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=10" : ''}}>
                                <h1>I am the great worior</h1>
                                <h2>hi how are you doing</h2>
                                @if(!is_null($item = $data->getText(10)) && !empty(trim($item->content)))
                                    {!! $item->content !!}
                                @else
                                    <p>ჩაწერე ტექსტი აქ</p>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team-area bgDark section-padding-bot" id="team">

        <div class="container-fluid">
            @includeWhen((request()->user()!==null &&  request()->user()->role==1),'about.admin_form')
            @if($teams->count()!=0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-titleV1 ta2">
                            <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                            {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=11" : ''}} >
                                @if(!is_null($item = $data->getText(11)) && !empty(trim($item->content)))
                                    {!! $item->content !!}
                                @else
                                    <h2>ჩაწერე ტექსტი აქ</h2>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row at2-box">

                    @foreach($teams as $team)
                        <div class="col-md-3 no-pad team-member-container" id="item-{{$team->id}}">
                            <div class="delete-team btn btn-danger" data-action="{{ route("deleteTeam",['id'=>$team->id]) }}">წაშალე</div>
                            <div class="single-team">
                                <div class="st-img">
                                    <img class="team-member-image" src="{{ asset('storage/'.$team->image) }}" alt="">
                                </div>
                                <div class="st-info">
                                    <h4>{{ $team->full_name }}</h4>
                                    <p>{{ $team->position }}</p>
                                    <ul class="team-social">
                                        @if(!is_null($team->twitter))
                                        <li><a href="{{ $team->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            @endif
                                        @if(!is_null($team->googleplus))
                                            <li><a href="{{ $team->googleplus }}"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                            @endif
                                        @if(!is_null($team->facebook))
                                            <li><a href="{{ $team->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            @endif
                                        @if(!is_null($team->pinterest))
                                            <li><a href="{{ $team->pinterest }}"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                            @endif
                                        @if(!is_null($team->linkedin))
                                            <li><a href="{{ $team->linkedin }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
