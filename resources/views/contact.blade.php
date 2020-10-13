@extends('layouts.layout')
@section('main')
<div class="paddinger-innerpage contact-paddinger">
    @if(request()->user()!==null && request()->user()->role == 1)
        <input type="hidden" name="page" id="page" value="contact">
    @endif
</div>
<!-- Contact Area -->
<section class="contact-page-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="contact-info">
                    <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                                    {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=1" : ''}}>
                        @if(!is_null($item = $data->getText(1)) && !empty(trim($item->content)))
                            {!! $item->content !!}
                        @else
                            <h4>საკონტაქტო ინფორმაცია</h4>
                        @endif
                    </span>
                    <div class="ci-single">
                        <div class="cis-icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="cis-text">
                            <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                                    {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=2" : ''}}>
                                @if(!is_null($item = $data->getText(2)) && !empty(trim($item->content)))
                                    {!! $item->content !!}
                                @else
                                    <p>+44 5858 9595 75</p>
                                    <p>+22 8484 5959 25</p>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="ci-single">
                        <div class="cis-icon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="cis-text">
                            <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                                    {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=3" : ''}}>
                                @if(!is_null($item = $data->getText(3)) && !empty(trim($item->content)))
                                    {!! $item->content !!}
                                @else
                                    <p>domain@address.com</p>
                                    <p>Address@mailbox.com</p>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="ci-single">
                        <div class="cis-icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="cis-text">
                            <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                                    {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=4" : ''}}>
                                @if(!is_null($item = $data->getText(4)) && !empty(trim($item->content)))
                                    {!! $item->content !!}
                                @else
                                    <p>ჭიათურა რუსთაველის ქუჩა #21</p>
                                @endif
                            </span>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="cp-wrapper">
                    <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                                    {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=5" : ''}}>
                        @if(!is_null($item = $data->getText(5)) && !empty(trim($item->content)))
                            {!! $item->content !!}
                        @else
                            <h4 >დატოვე შეტყობინება!</h4>
                        @endif
                    </span>
                    <form class="cf" method="post" action="{{ route("sendMail") }}" id="cf">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>თქვენი სახელი:*</label>
                                    <input type="text" id="firstName" name="firstName" class="form-control" placeholder="თქვენი სახელი აქ">
                                    <span>{{ $errors->first('firstName') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>თქვენი ი-მაილი*</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="თქვენი ი-მაილი აქ">
                                    <span>{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>შინაარსი*</label>
                                    <input type="text" class="form-control" id="subjectName" name="subjectName" placeholder="შეტყობინების შინაარსი">
                                    <span>{{ $errors->first('subjectName') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ტელეფონის ნომერი*</label>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="ტელეფონის ნომერიr">
                                    <span>{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>თქვენი შეტყობინება*</label>
                                    <textarea class="form-control" id="msg" name="msg" placeholder="დაწერეთ თქვენი შეტყობინება"></textarea>
                                    <span>{{ $errors->first('msg') }}</span>
                                </div>
                                <button type="submit" id="submit" name="submit" class="cf-btn">Send Now</button>
                                <div class="cf-msg" style="display: none;"></div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Contact Area -->
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
<!-- Main Script -->
<script src="{{ asset('assets/js/theme.js') }}"></script><a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>





