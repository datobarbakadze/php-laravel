@extends('layouts.layout')
@section('main')
    <div class="paddinger-innerpage contact-paddinger">
        @if(request()->user()!==null && request()->user()->role == 1)
            <input type="hidden" name="page" id="page" value="member">
        @endif
    </div>
    <!-- Contact Area -->
    <section class="contact-page-wrapper section-padding">
        <div class="container ">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-md-12 ">
                    <div class="contact-info">
                        <span class="{{  request()->user()!==null &&  request()->user()->role == 1 ? "editable content-editor" : ''}}"
                                    {{  request()->user()!==null &&  request()->user()->role == 1 ? "editorId=1" : ''}}>
                        @if(!is_null($item = $data->getText(1)) && !empty(trim($item->content)))
                            {!! $item->content !!}
                        @else
                            <h4>გახდი წევრი</h4>
                        @endif
                        </span>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="cp-wrapper">
                        <form class="cf " method="post" action="{{ route("addMember") }}" id="cf">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>თქვენი სახელი:*</label>
                                        <input type="text" id="f_name" name="f_name" class="form-control" placeholder="თქვენი სახელი აქ">
                                        <div class="" >{{ $errors->first('f_name') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>თქვენი გვარი :*</label>
                                        <input type="text" id="l_name" name="l_name" class="form-control" placeholder="თქვენი გვარი აქ">
                                        <div class="" >{{ $errors->first('l_name') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> კომპანია:</label>
                                        <input type="text" id="company" name="company" class="form-control" placeholder="კომპანია აქ">
                                        <div class="" >{{ $errors->first('company') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>თქვენი ტელეფონი:*</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="თქვენი ტელეფონის ნომერი აქ">
                                        <div class="" >{{ $errors->first('phone') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>თქვენი ი-მაილი:*</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="თქვენი ი-მაილი აქ">
                                        <div class="" >{{ $errors->first('email') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>თქვენი მისამართი:*</label>
                                        <input type="text" id="address" name="address" class="form-control" placeholder="თქვენი მისამართი აქ">
                                        <div class="" >{{ $errors->first('address') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>თქვენი პოზიცია კომპანიაში:*</label>
                                        <input type="text" id="position" name="position" class="form-control" placeholder="თქვენი პოზიცია აქ">
                                        <div class="" >{{ $errors->first('position') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" id="submit" name="submit" class="cf-btn">გახდი წევრი</button>

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





