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
                                <h4>წევრთა სია</h4>
                            @endif
                        </span>

                    </div>
                </div>

                @if($members->count()!=0)
                <div class="col col-sm-12">
                    <table class="table table-striped table-responsive-lg table-dark">
                        <thead>
                        <tr>
                            <td>სახელი</td>
                            <td>გვარი</td>
                            <td>კომპანია</td>
                            <td>ტელეფონი</td>
                            <td>ე-მაილი</td>
                            <td>მისამართი</td>
                            <td>პოზიცია</td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{ $member->f_name }}</td>
                                    <td>{{ $member->l_name }}</td>
                                    <td>{{ $member->company }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->address }}</td>
                                    <td>{{ $member->position }}</td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                @endif



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





