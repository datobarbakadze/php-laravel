@extends('layouts.layout')
@section('main')
    <div class="paddinger-innerpage">

    </div>
    <section class="blog-wrapper section-padding">
        <div class="container">
            <div class="row">
                @if(request()->user()!=null && request()->user()->role==1)
                    <form action="{{ route("updateTour",['id'=>$itemData->id]) }}" enctype="multipart/form-data" method="POST"  class="form-group col-sm-12 admin-form" >

                        @csrf
                        <input type="text" name="title" value="{{ $itemData->title }}" class="mb-3 form-control p-4 store-input">
                        <textarea name="description" id="description" class="form-control">{{ $itemData->description }}</textarea>
                        <select class="mt-3 mb-2form-control p-4 store-select"  name="status" id="store-select">
                            <option {{ $itemData->status=="tour" ? 'selected' : '' }} value="tour">ტურები</option>
                            <option {{ $itemData->status=="hotel" ? 'selected' : '' }} value="hotel">სასტუმროები</option>
                            <option {{ $itemData->status=="agro" ? 'selected' : '' }} value="agro">აგროტურისტული მეურნეობები</option>
                            <option {{ $itemData->status=="village" ? 'selected' : '' }} value="village">სოფლის ტურიზმი</option>

                        </select><br>
                        <input type="file" name="image"><br>
                        <img src="{{ asset("storage/s_".$itemData->image) }}" alt="">
                        <div class="form-group">
                            <input type="submit" value="დამატება">
                        </div>

                    </form>
                    <div class="form-group col col-sm-12">
                        <div class="alert  alert-success msg-cont"> შეცდომა</div>
                    </div>
                @endif
            </div>
        </div>
    </section>
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
