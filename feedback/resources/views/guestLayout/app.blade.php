<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="msapplication-TileColor" content="#0f75ff">
    <meta name="theme-color" content="#6f42c1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}" />

    <!-- Title -->
    <title>FEEDBACK.GE მიიღე ჯანსაღი შეფასება</title>

    <meta property='og:title' content='FEEDBACK.GE მიიღე ჯანსაღი შეფასება'>
    <meta property='og:site_name' content='FEEDBACK.GE'>
    <meta property='og:url' content='https://feedback.ge'>
    <meta property='og:description' content='მიიღე ჯანსაღი შეფასება'>
    <meta property='og:image' content='https://feedback.ge/fblogo.png'>
    <meta property='fb:app_id' content='2347098352276225'>
    <meta property='og:type' content='website'>


    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Dashboard Css -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" />

    <!-- Font-awesome  Css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!--Horizontal Menu-->
    <link href="{{ asset('assets/plugins/Horizontal2/Horizontal-menu/dropdown-effects/fade-down.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/Horizontal2/Horizontal-menu/horizontal.css') }}" rel="stylesheet" />

    <!-- Owl Theme css-->
    <link href="{{ asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

    @stack('css')

</head>

<body>

    <!--Loader-->
    <div id="global-loader">
        <img src="{{ asset('assets/images/products/products/loader.png') }}" class="loader-img floating" alt="">
    </div>



    <div class="header-main">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-sm-4 col-7">
                        <div class="top-bar-left d-flex">
                            <div class="clearfix">
                                <ul class="socials">
                                    <li>
                                        <a class="social-icon text-dark" href="https://www.facebook.com/feedback.ge/"
                                            target="blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                </ul>




                            </div>

                        </div>
                    </div>
                    @if(Auth::check())
                    <div class="col-xl-4 col-lg-4 col-sm-8 col-5">
                        <div class="top-bar-right">
                            <ul class="custom">
                                <li class="dropdown">
                                    <a id="loaderHeader" href="#" class="text-dark" data-toggle="dropdown"
                                        aria-expanded="false">
                                        @if(empty(Auth::user()->avatar))
                                        <div class="avatar cover-image avatar-sm brround"
                                            style="background-image: url('{{ asset('assets/images/faces/male/profile.png') }}'">
                                        @else
                                        <div class="avatar cover-image avatar-sm brround"
                                        style="background-image: url('{{ asset('feedback/storage/app/public/'.Auth::user()->avatar) }}'">
                                        @endif
                                        </div><span> {{ Auth::user()->fname }} {{ Auth::user()->lname }}
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"
                                        x-placement="bottom-end"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(165px, 21px, 0px);">
                                        <a href="{{ route('profile' , Auth::user()->id ) }}" class="dropdown-item">
                                            <i class="dropdown-icon icon icon-user"></i> ჩემი პროფილი
                                        </a>
                                        <a class="dropdown-item" href="{{ route('recived') }}">
                                            <i class="dropdown-icon icon icon-speech"></i> წერილები &nbsp; <span
                                                class="ml-auto badge badge-success">{{ $providerCount }}</span>
                                        </a>
                                        <a class="dropdown-item" href="{{ route('subject.add') }}">
                                            <i class="dropdown-icon icon fa fa-plus"></i> სუბიექტის დამატება
                                        </a>
                                        <a class="dropdown-item" href="{{ route('subject.index') }}">
                                            <i class="dropdown-icon icon icon-folder-alt"></i> ჩემი სუბიექტები
                                        </a>
                                        <a class="dropdown-item" href="{{ route('blog.create') }}">
                                            <i class="dropdown-icon icon fa fa-edit"></i> სტატიის დამატება
                                        </a>
                                        <a class="dropdown-item" href="{{ route('blog.index') }}">
                                            <i class="dropdown-icon icon fa fa-folder-open"></i> ჩემი სტატიები
                                        </a>
                                        <a class="dropdown-item" href="https://feedback.ge/user/myreferrals">
                                            <i class="dropdown-icon mdi mdi-account-multiple-plus"></i> ჩემი რეფერალები
                                        </a>
                                        <a class="dropdown-item" href="https://feedback.ge/user/myactivity">
                                            <i class="dropdown-icon icon fa fa-history"></i> ჩემი ქმედებები
                                        </a>
                                        <a href="{{ route('settings') }}" class="dropdown-item">
                                            <i class="dropdown-icon  icon icon-settings"></i> პარამეტრები
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}">
                                            <i class="dropdown-icon icon icon-power"></i> გასვლა
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @else
                    <div class="col-xl-4 col-lg-4 col-sm-8 col-5">
                        <div class="top-bar-right">
                            <ul class="custom">
                                <li>
                                    <a href="{{ route('register') }}" class="text-dark"><i class="fa fa-user mr-1"></i>
                                        <span>რეგისტრაცია</span></a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" id="loginbtt" data-target="#LoginModal" class="text-dark"><i
                                            class="fa fa-sign-in mr-1"></i> <span>ავტორიზაცია</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="horizontal-header clearfix ">
            <div class="container">
                <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                <span class="smllogo">
                    <span><a class="btn btn-orange" href="https://feedback.ge/registration">სუბიექტის
                            დამატება</a></span>
                </span>
                <a href="tel:+995599898810" class="callusbtn"><i class="fa fa-phone" aria-hidden="true"></i></a>
            </div>
        </div>
        <!-- /Mobile Header -->

        <div class="horizontal-main bg-dark-transparent clearfix">
            <div class="horizontal-mainwrapper container clearfix">
                <div class="desktoplogo">
                    <a href="{{ route('index') }}"><img class="logoi"
                            src="{{ asset('assets/images/feedbacklogo.png') }}" alt=""></a>
                </div>
                <div class="desktoplogo-1">
                    <!--<a href="https://feedback.ge"><img class="logoi" src="https://feedback.ge/assets/images/brand/logo.png" alt=""></a>-->
                </div>
                <!--Nav-->
                <nav class="horizontalMenu clearfix d-md-flex">
                    <ul class="horizontalMenu-list">
                        <li aria-haspopup="true"><a href="{{ route('index') }}">მთავარი</a></li>
                        <li aria-haspopup="true"><a href="{{ route('price') }}">ფასები</a></li>
                        <li aria-haspopup="true"><a href="{{ route('categories') }}">კატეგორიები</a></li>
                        <li aria-haspopup="true"><a href="{{ route('blogs') }}">ბლოგი</a></li>

                        <li aria-haspopup="true"><a href="{{ route('contact') }}"> კონტაქტი <span
                                    class="wsarrow"></span></a></li>
                        <li aria-haspopup="true">
                            <span><a class="btn btn-orange" href="{{ route('subject.add') }}">სუბიექტის
                                    დამატება</a></span>

                        </li>
                    </ul>

                </nav>
                <!--Nav-->
            </div>
        </div>
    </div>
    <!--Topbar-->


    @yield('content')




    <!-- Popup Login-->
    <div id="LoginModal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ავტორიზაცია</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="single-page customerpage ">
                        <div class="wrapper wrapper2 box-shadow-0">
                            <form method="POST" action="{{ route('login') }}" class="card-body" tabindex="500">
                                @csrf
                                <div class="mail">
                                    <input type="email" name="email">
                                    <label>ელ. ფოსტა</label>
                                </div>
                                <div class="passwd">
                                    <input type="password" name="password">
                                    <label>პაროლი</label>
                                </div>
                                <input type="hidden" name="sing_in" value="10">
                                <div class="submit">
                                    <input type="submit" class="btn btn-primary btn-block" value="ავტორიზაცია">
                                </div>
                                <p class="mb-2"><a href="#" data-toggle="modal" data-dismiss="modal"
                                        data-target="#PasswordResetModal">დაგავიწყდათ პაროლი?</a></p>
                                <p class="text-dark mb-0">არ აქვთ ანგარიში?<a href="{{ route('register') }}"
                                        class="text-primary ml-1">რეგისტრაცია</a></p>
                            </form>
                            <hr class="divider">
                            <div class="card-body">
                                <div class="text-center">
                                    <div>
                                        <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=484792894236-fu8bfvll3p18pdmpj6s5qv7h0g8mrec9.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Ffeedback.ge%2Fgoogle-callback.php&state&scope=email%20profile&approval_prompt=auto"
                                            class="btn btn-primary btn-icon" style="background: #dd4b39;width:100%"><i
                                                class="fa fa-google"></i>&nbsp; Google - ით შესვლა</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popup Login-->





    <!--Footer Section-->
    <section>
        <footer class="bg-dark-purple text-white">
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <h6>ჩვენ</h6>
                            <hr class="deep-purple  accent-2 mb-4 mt-0 d-inline-block mx-auto">
                            <p>მიიღე ჯანსაღი შეფასება მომხმარებლების მხრიდან.</p>
                            <p>FEEDBACK.GE</p>
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <h6>სერვისი</h6>
                            <hr class="deep-purple text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                            <ul class="list-unstyled mb-0">
                                <li><a href="javascript:;">რეკლამა</a></li>
                                <li><a href="javascript:;">შეფასებები</a></li>
                                <li><a href="javascript:;">ცნობადობის მომატება</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-12">
                            <h6>დაგვიკავშირდით</h6>
                            <hr class="deep-purple  text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#"><i class="fa fa-home mr-3 text-primary"></i>{{ $providerContact->address }}</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-envelope mr-3 text-primary"></i> {{ $providerContact->email }}</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-phone mr-3 text-primary"></i>+995 {{ $providerContact->tel_nomeri }}</a>
                                </li>



                            </ul>
                            <ul class="list-unstyled list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="{{ $providerContact->facebook }}" target="blank"
                                        class="btn-floating btn-sm rgba-white-slight mx-1 waves-effect waves-light">
                                        <i class="fa fa-facebook bg-facebook"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <h6>მხარდაჭერა</h6>
                            <hr class="deep-purple  text-primary accent-2 mb-4 mt-0 d-inline-block mx-auto">
                            <div class="clearfix"></div>
                            <span id="responseSubscribe"></span>
                            <div class="input-group w-70">
                                <input type="text" class="form-control br-tl-3  br-bl-3" id="subscribe"
                                    placeholder="ელ. ფოსტა">
                                <div class="input-group-append ">
                                    <button type="button" class="btn btn-primary br-tr-3  br-br-3" id="subscribeButton">
                                        გამოწერა </button>
                                </div>
                            </div>
                            <h6 class="mb-0 mt-5">გადახდა</h6>
                            <hr class="deep-purple  text-primary accent-2 mb-2 mt-3 d-inline-block mx-auto">
                            <div class="clearfix"></div>
                            <ul class="footer-payments">
                                <li class="pl-0"><a href="javascript:;"><i class="fa fa-cc-amex text-muted"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="javascript:;"><i class="fa fa-cc-visa text-muted"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="javascript:;"><i class="fa fa-credit-card-alt text-muted"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="javascript:;"><i class="fa fa-cc-mastercard text-muted"
                                            aria-hidden="true"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-dark-purple text-white p-0">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-lg-12 col-sm-12 mt-3 mb-3 text-center ">
                            ყველა წესის დაცვით © {{ Date('Y') }} <a href="https://feedback.ge" class="fs-14 text-primary">FEEDBACK.GE</a>. საავტორო უფლებები დაცულია
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
    <!--Footer Section-->


    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-rocket"></i></a>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ka_GE/sdk.js#xfbml=1&version=v11.0" nonce="ndX18m8W"></script>
    <!-- JQuery js-->
    <script src="{{ asset('assets/js/vendors/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>

    <!--JQuery Sparkline Js-->
    <script src="{{ asset('assets/js/vendors/jquery.sparkline.min.js') }}"></script>

    <!-- Circle Progress Js-->
    <script src="{{ asset('assets/js/vendors/circle-progress.min.js') }}"></script>

    <!-- Star Rating Js-->
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!--Counters -->
    <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/numeric-counter.js') }}"></script>
    <script src="{{ asset('assets/js/geokbd.js') }}"></script>

    <!--Owl Carousel js -->
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>

    <!--Horizontal Menu-->
    <script src="{{ asset('assets/plugins/Horizontal2/Horizontal-menu/horizontal.js') }}"></script>

    <!--JQuery TouchSwipe js-->
    <script src="{{ asset('assets/js/jquery.touchSwipe.min.js') }}"></script>

    <!--Select2 js -->

    <!-- sticky Js-->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- Custom scroll bar Js-->
    <script src="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!-- Swipe Js-->
    <script src="{{ asset('assets/js/swipe.js') }}"></script>

    <!-- Scripts Js-->
    <script src="{{ asset('assets/js/scripts2.js') }}"></script>

    <!-- Custom Js-->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @stack('js')

    @if (Session::has('message'))
    <script>
    $(function() {
        $('#loginbtt').click();
    });
    </script>
    @endif
</body>

</html>
