
@if(request()->user()!==null && request()->user()->role == 1)
    <div class="alert  alert-success msg-cont"> შეცდომა</div>

@endif
<header class="header-area fotolia-header header_1">
    <div class="topbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="tb-contact-info">
                        <div class="phone-mail">
                            <span class="phone-topbar"><i class="fa fa-phone" aria-hidden="true"></i>{!! __('main.topbar_phone') !!}</span> |
                            <span class="email-topbar"><i class="fa fa-envelope" aria-hidden="true"></i>{!! __('main.topbar_email') !!} </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="tb-contact-info">
                        <div class="location">
                            <span class="address-topbar"><i class="fa fa-map-marker" aria-hidden="true"></i>{!! __('main.topbar_address') !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="voidmega-header bgvm">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-10">


                    <div class="vmm-header header-transparent-on vmm-mega-menu mega-menu-fullwidth">
                        <div class="container">

                            <!-- vmm header -->
                            <div class="vmm-header-container">

                                <!--Logo-->
                                <div class="logo custom-logo" data-mobile-logo="{{ asset("assets/img/logo-1.png") }}" data-sticky-logo="{{ asset("assets/img/logo-2.png") }}">
                                    <a href="{{ route("main") }}"><img src="{{ asset("assets/img/logo-1.png") }}" alt="logo"/></a>
                                </div>

                                <!-- Burger menu -->
                                <div class="burger-menu">
                                    <div class="line-menu line-half first-line"></div>
                                    <div class="line-menu"></div>
                                    <div class="line-menu line-half last-line"></div>
                                </div>

                                <!--Navigation menu-->
                                <nav class="vmm-menu menu-caret submenu-scale">
                                    <ul>
                                        <li class="submenu-right"><a href="{{ route("main") }}">მთავარი</a><li>


                                        <li class="submenu-right"><a href="{{ route("about") }}">ჩვენს შესახებ</a>
                                            <ul>
                                                <li><a href="{{ route("about") }}#mission">მისია</a></li>
                                                <li><a href="{{ route("member") }}">გახდი წევრი</a></li>
                                                <li><a href="{{ route("about") }}#team">გუნდი</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu-right"><a href="{{ route("services",["type"=>"service"]) }}">ჩვენი სერვისები</a>
                                            <ul>
                                                <li><a href="{{ route("services",["type"=>"training"]) }}">ტრენინგები</a></li>
                                                <li><a href="{{ route("services",["type"=>"service"]) }}">სერვისები</a></li>
                                                <li><a href="{{ route("services",["type"=>"farmer"]) }}">ფერმერთა მომსახურება</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu-right"><a href="{{ route("projects",["status"=>"all"]) }}">პროექტები</a>
                                            <ul>
                                                <li><a href="{{ route("projects",["status"=>"current"]) }}">მიმდინარე</a></li>
                                                <li><a href="{{ route("projects",["status"=>"finished"]) }}">დასრულებული</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu-right"><a href="{{ route("tours",["status"=>"tour"]) }}">ტურიზმი</a>
                                            <ul>
                                                <li><a href="{{ route("tours",["status"=>"tour"]) }}">ტურები</a></li>
                                                <li><a href="{{ route("tours",["status"=>"hotel"]) }}">სასტუმროები</a></li>
                                                <li><a href="{{ route("tours",["status"=>"agro"]) }}">აგროტურისტული მეურნეობები</a></li>
                                                <li><a href="{{ route("tours",["status"=>"village"]) }}">სოფლის ტურიზმი</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu-right"><a href="#">მედიათეკა</a>
                                            <ul>
                                                <li><a href="{{ route("blogs") }}">სიახლეები</a></li>
                                                <li><a href="{{ route("publication") }}">პუბლიკაციები</a></li>
                                                <li><a href="{{ route("successes") }}">წარმატებული ისტორიები</a></li>
                                                <li><a href="{{ route("gallery") }}">ფოტოგალერეა</a></li>
                                                <li><a href="{{ route("video") }}">ვიდეო გალერეა</a></li>
                                            </ul>
                                        </li>

                                        <li class="submenu-right"><a href="{{ route("contact") }}">კონტაქტი</a></li>
                                        @if(request()->user()!==null && request()->user()->role == 1)
                                            <style>
                                                .submenu-right a{
                                                    font-family: "BPG Arial Caps", sans-serif !important;
                                                    font-size:12px !important;
                                                }
                                            </style>
                                            <li class="submenu-right"><a href="#"><i class="fa fa-user"></i></a>
                                                <ul>
                                                    <li><a href="{{ route("memberList") }}">წევრთა სია</a></li>
                                                    <li><a href="{{ route("logout") }}">გასვლა</a></li>
                                                </ul>
                                            </li>
                                            @endif
                                    </ul>
                                </nav>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="d-none col-xl-2 d-xl-block" style="margin-top: 5px">
                    <div class="search-menu-btn">
                        <div class="searchV1-btn">
                            <div class="soc-btn search-open">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="soc-btn search-close">
                                <i class="fa fa-close"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    <div class="search_V1">
        <form class="search-from" >
            <input type="text" id="logos" class="input">
            <select name="somethign" id="search-select" class="select">
                <option value="{{ route("serviceSearch") }}">სერვისები</option>
                <option value="{{ route("projectSearch") }}">პროექტები</option>
                <option value="{{ route("tourSearch") }}">ტურიზმი</option>
                <option value="{{ route("blogSearch") }}">სიახლეები</option>
                <option value="{{ route("publicationSearch") }}">პუბლიკაციები</option>
                <option value="{{ route("successSearch") }}">ისტორიები</option>
                <option value="{{ route("videoSearch") }}">ვიდეო გალერია</option>
            </select>
            <input type="submit" value="მოძებნე" class="search-btn">
        </form>
    </div>
